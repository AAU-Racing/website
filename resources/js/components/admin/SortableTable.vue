<template>
    <fragment>
        <table class="table">
            <thead class="thead-aau">
            <component v-bind:is="header_view" can_edit="can_edit" v-bind="$attrs"></component>
            </thead>
            <draggable v-model="local_elements"
                       tag="tbody"
                       v-bind="dragOptions">
                <component v-for="element in local_elements" :key="element.id" v-bind:is="row_view" can_edit="can_edit" :element="element" v-bind="$attrs"></component>
            </draggable>
        </table>
        <div class="float-right">
            <form method="POST" v-if="can_edit" class="d-inline mr-1">
                <input type="hidden" name="_token" :value="csrf"/>
                <input type="hidden" :name="order_field_name" :value="JSON.stringify(local_elements.map(element => element.id))"/>
                <button class="btn btn-primary">Save order</button>
            </form>
            <slot></slot>
        </div>
    </fragment>
</template>
<script>
    import draggable from 'vuedraggable';

    export default {
        components: {
            draggable,
        },
        inheritAttrs: false,
        data: function () {
            return {
                local_elements: this.elements,
                csrf: document.querySelector('meta[name="csrf-token"]').content
            }
        },
        props: ['elements', 'header_view', 'row_view', 'can_edit', 'order_field_name'],
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
<style scoped>
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
