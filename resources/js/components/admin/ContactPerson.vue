<template>
    <fragment>
        <input type="hidden" :name="id_input_name" :value="id_input_value">
        <div class="col-md-6">
            <input :id="name_input_id" placeholder="Name" type="text" class="form-control"
                   :name="name_input_name" :value="name_input_value" required>
        </div>
        <div class="col-md-3 col-6">
            <input :id="phone_input_id" placeholder="Phone Number" type="text" class="form-control"
                   :name="phone_input_name" :value="phone_input_value" required pattern="\d{8}">

            <span class="invalid-feedback" role="alert">
                <strong>Error message</strong>
            </span>
        </div>
        <div class="col-md-2 col-5 d-flex flex-column justify-content-center">
            <div class="custom-control custom-radio">
                <input type="radio" :id="primary_input_id" name="primary" class="custom-control-input"
                       :value="primary_input_value" :checked="primary_input_checked" required>
                <label class="custom-control-label" :for="primary_input_id">Primary</label>
            </div>
        </div>
    </fragment>
</template>
<script>
    export default {
        props: ['index', 'record', 'checked'],
        computed: {
            id_input_value() {
                return this.record.id;
            },
            id_input_name() {
                return 'contact_person[' + this.index + '][id]';
            },
            name_input_id() {
                return 'contact_person_name_' + this.record.id;
            },
            name_input_value() {
                return this.record.name;
            },
            name_input_name() {
                return 'contact_person[' + this.index + '][name]';
            },
            phone_input_id() {
                return 'contact_person_phone_number_' + this.record.id;
            },
            phone_input_value() {
                return this.record.phone_number;
            },
            phone_input_name() {
                return 'contact_person[' + this.index + '][phone_number]';
            },
            primary_input_id() {
                return 'contact_person_primary_' + this.record.id;
            },
            primary_input_value() {
                return this.record.id;
            },
            primary_input_checked() {
                return ('' + this.record.id) === ('' + this.checked);
            }
        }
    }
</script>