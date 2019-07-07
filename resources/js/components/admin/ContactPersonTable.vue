<template>
    <fragment>
        <edit-table :view="view" :records="records" :checked="checked" v-on:add="onAdd" v-on:delete="onDelete"></edit-table>
    </fragment>
</template>
<script>
    function uuidv4() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            const r = Math.random() * 16 | 0;
            const v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    export default {
        props: ['contact_persons', 'checked'],
        data: function() {
            return {
                view: 'contact-person',
                records: JSON.parse(JSON.stringify(this.contact_persons))
            };
        },
        methods: {
            onAdd() {
                console.log("Adding");
                this.records.push({id: 'new_' + uuidv4(), name: '', phone_number: ''});
                console.log(this.records);
                // this.$forceUpdate();
            },
            onDelete(index) {
                if (this.records.length >= 2) {
                    this.records.splice(index, 1);
                }
            }
        }
    }
</script>