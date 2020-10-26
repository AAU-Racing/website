<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="row mb-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-search"></i></span>
                        </div>
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
                            <tr v-for="user in filteredUsers" :id="user.id">
                                <td>{{ user.firstname }}</td>
                                <td>{{ user.lastname }}</td>
                                <td>{{ formatDate(user.created_at) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 pl-4">
                <div v-for="department in departments" class="row" :id="department.id">
                    <h4>{{ department.name }}</h4>
                    <div class="row">
                        <div v-for="user in department.users" class="col-3">
                            {{ user }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'
import Fuse from 'fuse.js'

export default {
    name: "DepartmentAssignment",
    props: ['users', 'departments', 'errors'],
    data() {
        return {
            searchQuery: null
        }
    },
    methods: {
        formatDate(value) {
            return moment(value).format('DD-MM-YYYY');
        },
        similar(user, query) {
            const name = (user.firstname + ' ' + user.lastname).toLowerCase();
            query = query.toLowerCase();

            return name.includes(query);
        }
    },
    computed: {
        unassignedUsers() {
            const assignedIds = this.departments.flatMap(department => department.users.map(user => user.user_id));

            return this.users.filter(user => !assignedIds.includes(user.id));
        },
        filteredUsers() {
            if (this.searchQuery) {
                const options = {
                    includeScore: false,
                    // Search in `author` and in `tags` array
                    keys: ['firstname', 'lastname']
                }

                const fuse = new Fuse(this.unassignedUsers, options);

                // return this.unassignedUsers.filter(user => this.similar(user, this.searchQuery));
                return fuse.search(this.searchQuery).map(res => res.item);
            }
            else {
                return this.unassignedUsers;
            }
        }
    }
}
</script>

<style scoped>

</style>
