<template>
    <div class="table-responsive">
        <table class="table roles-table" v-if="!can_edit_pages">
            <thead class="thead-aau">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                </tr>
            </thead>
            <tbody v-if="!can_edit_pages">
                <tr v-for="page in local_pages" :key="page.id">
                    <td scope="row">{{ page.name }}</td>
                    <td>{{ page.title }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table roles-table"
               v-if="can_edit_pages">
            <thead slot="header">
                <tr class="thead-aau">
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="fit"></th>
                    <th scope="col" class="fit"></th>
                    <th scope="col" class="fit"></th>
                </tr>
            </thead>
            <draggable v-model="local_pages"
                       tag="tbody"
                       v-bind="dragOptions">
                    <tr v-for="page in local_pages" :key="page.id">
                        <td scope="row">{{ page.name }}</td>
                        <td>{{ page.title }}</td>
                        <td class="fit">
                            <a :href="page.edit_url" v-if="page.editable"><i class="fas fa-edit"></i></a>
                        </td>
                        <td class="fit">
                            <form method="POST" v-if="!page.special" :action="page.delete_url" >
                                <input type="hidden" name="_method" value="delete" />
                                <input type="hidden" name="_token" :value="csrf">
                                <button type="submit" class="btn btn-link no-border no-padding"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td class="fit">
                            <i class="fa fa-align-justify handle"></i>
                        </td>
                    </tr>
            </draggable>
        </table>
        <div class="float-right">
            <form method="POST" v-if="can_edit_pages" class="d-inline mr-1">
                <input type="hidden" name="_token" :value="csrf"/>
                <input type="hidden" name="page_order" :value="JSON.stringify(local_pages.map(page => page.id))"/>
                <button class="btn btn-primary">Save order</button>
            </form>
            <slot></slot>
        </div>
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
        props: ['can_edit_pages', 'pages'],
        computed: {
            dragOptions() {
                return {
                    animation: 50,
                    group: "description",
                    disabled: false,
                    ghostClass: "ghost",
                    dragClass: "drag",
                    handle: ".handle",
                };
            }
        }
    }
</script>
<style>
    .flip-list {
        transition: transform 0.5s;
    }

    .ghost {
        background: #e8e8e8;
    }

    .drag {
        opacity: 0;
    }
</style>
