<template>
    <fragment>
        <div>
            <div v-for="(record, index) in records" v-bind:key="record.id">
                <div class="row mb-2">
                    <edit-row :record="record" :index="index" :view="view" v-bind="$attrs" v-on:delete="$emit('delete', $event)"></edit-row>
                </div>
                <hr class="narrow-hr" v-if="index < records.length - 1" />
            </div>
        </div>
        <div class="mt-3 d-flex justify-content-end">
            <button type="button" class="btn btn-aau btn-sm" @click="$emit('add')"><i class="fas fa-plus"></i></button>
        </div>
    </fragment>
</template>
<script>
    export default {
        props: ['records', 'view', 'aux_data'],
        inheritAttrs: false
    }
</script>
