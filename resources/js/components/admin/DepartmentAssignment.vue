<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-5 d-none d-md-block" style="height: 75vh">
                <div class="row mb-4">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="user-search" placeholder="Search for name" aria-describedby="inputGroupPrepend" v-model="searchQuery" @keyup.enter.prevent @keydown.enter.prevent>
                    </div>
                </div>

                <div class="row">
                    <table class="table">
                        <thead class="thead-aau">
                            <tr>
                                <th scope="col">
                                    Firstname
                                </th>
                                <th scope="col">
                                    Lastname
                                </th>
                                <th scope="col">
                                    Join date
                                </th>
                                <th scope="col">
                                </th>
                            </tr>
                        </thead>
                        <tbody style="overflow-y: scroll">
                            <tr v-for="user in filteredUsers" draggable="true" @dragstart="onDrag($event, user)">
                                <td>{{ user.firstname }}</td>
                                <td>{{ user.lastname }}</td>
                                <td>{{ formatDate(user.created_at) }}</td>
                                <td><i class="fas fa-align-justify text-secondary" style="cursor: pointer"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-2 d-none d-md-block"></div>
            <div class="col-5" style="overflow-y: scroll; height: 75vh">
                <div v-for="department in localDepartments" class="row mb-4" :key="department.id">
                    <h4>{{ department.name }}</h4>
                    <div class="row">
                        <table class="table" @drop="onDrop($event, department)" @dragenter.prevent @dragover.prevent>
                            <thead class="thead-aau">
                                <tr>
                                    <th scope="col">
                                        Firstname
                                    </th>
                                    <th scope="col">
                                        Lastname
                                    </th>
                                    <th scope="col">
                                        Join date
                                    </th>
                                    <th scope="col">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(user, index) in department.users">
                                    <td>{{ user.firstname }}</td>
                                    <td>{{ user.lastname }}</td>
                                    <td>{{ formatDate(user.created_at) }}</td>
                                    <td><button type="button" class="btn btn-aau btn-sm"><i class="fas fa-trash" @click="department.users.splice(index, 1)"></i></button></td>
                                </tr>
                                <tr v-if="department.users.length === 0">
                                    <td colspan="4" class="text-center text-muted">Drop a user here</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none">
            <div v-for="(department, didx) in localDepartments">
                <input type="hidden" :name="'department_assignment[' + didx + '][id]'" :value="department.id">
                <input type="hidden" v-for="(user, uidx) in department.users" :name="'department_assignment[' + didx + '][users][' + uidx + ']'" :value="user.id">
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';
import moment from 'moment'
import Fuse from 'fuse.js'

export default {
    name: "DepartmentAssignment",
    props: ['users', 'departments', 'errors'],
    components: {
        draggable
    },
    created() {
        this.users.sort((a, b) => b.created_at - a.created_at);

        const options = {
            includeScore: false,
            // Search in `author` and in `tags` array
            keys: ['firstname', 'lastname']
        }

        this.fuse = new Fuse(this.users, options);
        this.filteredUsers = this.users;
    },
    data() {
        return {
            searchQuery: '',
            fuse: null,
            filteredUsers: [],
            localDepartments: JSON.parse(JSON.stringify(this.departments))
        }
    },
    watch: {
        searchQuery() {
            if (this.searchQuery.trim() === '') {
                this.filteredUsers = this.users;
            }
            else {
                this.filteredUsers = this.fuse.search(this.searchQuery).map(res => res.item);
            }

        }
    },
    methods: {
        formatDate(value) {
            return moment(value).format('DD-MM-YYYY');
        },
        onDrag(event, user) {
            event.dataTransfer.dropEffect = 'move';
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('userId', user.id);
        },
        onDrop(event, department) {
            const userId = parseInt(event.dataTransfer.getData('userId'));
            const user = this.users.find(x => x.id === userId);

            const idx = department.users.findIndex(x => x.id === userId);

            if (idx === -1) {
                department.users.push(user);
            }
        }
    },
}
</script>

<style scoped>

</style>
