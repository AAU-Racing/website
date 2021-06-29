<template>
    <fragment>
        <div class="form-group row mb-2">
            <label for="zip" class="col-md-5 col-form-label text-md-end" v-once>{{ zip_code_name }}<span
                class="required">*</span></label>

            <div class="col-md-6">
                <input id="zip" type="text" class="form-control" v-bind:class="{ 'is-invalid': zip_code_error_.length > 0 }"
                       name="zip" v-model="zip_code_value" required autocomplete="postal-code" @blur="updateCity">

                <span v-if="zip_code_error_.length > 0" class="invalid-feedback" role="alert">
                    <strong>{{ zip_code_error_.join(', ') }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <label for="city" class="col-md-5 col-form-label text-md-end" v-once>{{ city_name }}<span
                class="required">*</span></label>

            <div class="col-md-6">
                <input id="city" type="text" class="form-control" v-bind:class="{ 'is-invalid': city_error.length > 0 }"
                       name="city" v-model="city_value" required autocomplete="locality">

                <span v-if="city_error.length > 0" class="invalid-feedback" role="alert">
                    <strong>{{ city_error.join(', ') }}</strong>
                </span>
            </div>
        </div>
    </fragment>
</template>

<script>
    export default {
        props: ['zip_code_name', 'zip_code_old', 'zip_code_error', 'city_name', 'city_old', 'city_error'],
        data() {
          return {
              zip_code_value: '',
              zip_code_error_: [],
              city_value: '',
              zip_code_prev: null
          }
        },
        created() {
            this.zip_code_value = this.zip_code_old;
            this.zip_code_error_ = this.zip_code_error;
            this.city_value = this.city_old;
        },
        methods: {
            updateCity(event) {
                const zip_code = event.target.value;

                if (this.zip_code_prev === zip_code) {
                    return;
                }

                this.zip_code_prev = zip_code;

                axios
                    .get('http://dawa.aws.dk/postnumre/' + zip_code)
                    .then(response => {
                        this.city_value = response.data.navn;
                        this.zip_code_error_ = [];
                    })
                    .catch(_ => this.zip_code_error_ = ['Zip code not found']);
            }
        }
    }
</script>

<style scoped>

</style>
