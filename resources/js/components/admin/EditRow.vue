<template>
    <fragment>
        <component v-bind:is="view" :index=index :record="record" v-bind="$attrs"></component>
        <div class="col-1 d-flex flex-column justify-content-center">
            <a href="" @click.prevent="$emit('delete', index)"><i class="fas fa-trash"></i></a>
        </div>
    </fragment>
</template>
<script>
    export default {
        props: ['record', 'index', 'view', 'aux_data'],
        inheritAttrs: false
    }
</script>
