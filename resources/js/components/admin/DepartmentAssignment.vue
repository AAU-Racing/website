<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-5 d-none d-md-block">
                <div class="row mb-4">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="user-search" placeholder="Search for name" aria-describedby="inputGroupPrepend" v-model="searchQuery">
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" draggable="true" @dragstart="onDrag($event, user)">
                                <td>{{ user.firstname }}</td>
                                <td>{{ user.lastname }}</td>
                                <td>{{ formatDate(user.created_at) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-5 offset-md-2" style="overflow-y: scroll; height: 75vh">
                <div v-for="department in departments" class="row mb-4">
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
                                <tr v-for="user in department.users">
                                    <td>{{ user.firstname }}</td>
                                    <td>{{ user.lastname }}</td>
                                    <td>{{ formatDate(user.created_at) }}</td>
                                    <button type="button" class="btn btn-aau btn-sm"><i class="fas fa-trash"></i></button>
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
    },
    data() {
        return {
            searchQuery: null,
        }
    },
    methods: {
        formatDate(value) {
            return moment(value).format('DD-MM-YYYY');
        },
        filteredUsers() {
            console.log(this.users)
            if (this.searchQuery) {
                const options = {
                    includeScore: false,
                    // Search in `author` and in `tags` array
                    keys: ['firstname', 'lastname']
                }

                const fuse = new Fuse(this.users, options);
                return fuse.search(this.searchQuery).map(res => res.item);
            }
            else {
                return this.users;
            }
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
