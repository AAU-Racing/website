<template>
    <fragment>
        <div>
            <div v-for="(record, index) in records" v-bind:key="record.id">
                <div class="row">
                    <edit-row :record="record" :index="index" :view="view" :aux_data="aux_data" v-on:delete="$emit('delete', $event)"></edit-row>
                </div>
                <hr class="narrow-hr" v-if="index < records.length - 1" />
            </div>
        </div>
        <div class="mt-4 d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-sm" @click="$emit('add')"><i class="fas fa-plus"></i></button>
        </div>
    </fragment>
</template>
<script>
    export default {
        props: ['records', 'view', 'aux_data'],
    }
</script>