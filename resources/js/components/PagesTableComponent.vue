<template>
    <div class="table-responsive">
        <table class="table roles-table">
            <thead class="thead-aau">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col" v-if="can_edit_pages"></th>
                </tr>
            </thead>
            <draggable v-model="local_pages" tag="tbody" v-if="can_edit_pages">
                <tr v-for="page in local_pages" :key="page.id">
                    <td scope="row">{{ page.name }}</td>
                    <td>{{ page.title }}</td>
                    <td>
                        <a :href="page.edit_url" v-if="page.editable"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            </draggable>
            <tbody v-if="!can_edit_pages">
                <tr v-for="page in local_pages" :key="page.id">
                    <td scope="row">{{ page.name }}</td>
                    <td>{{ page.title }}</td>
                    <td>
                        <a :href="page.edit_url" v-if="page.editable"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <form method="POST" v-if="can_edit_pages">
            <input type="hidden" name="_token" :value="csrf" />
            <input type="hidden" name="page_order" :value="JSON.stringify(local_pages.map(page => page.id))" />
            <button class="btn btn-primary float-right" slot="footer">Save order</button>
        </form>
    </div>
</template>
<script>
    import draggable from 'vuedraggable';
    export default {
        components: {
            draggable,
        },
        data: function () {
            return {
                local_pages: this.pages,
                csrf: document.querySelector('meta[name="csrf-token"]').content
            }
        },
        props: ['can_edit_pages', 'pages']
    }
</script>