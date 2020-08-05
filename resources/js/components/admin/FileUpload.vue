<template>
    <div class="custom-file">
        <input type="file" :class="'custom-file-input' +  (invalid ? ' is-invalid' : '')" :id="name" :name="name" @change="onFileChange" v-bind="$attrs">
        <label class="custom-file-label" :for="name">
            {{ filename ? filename : placeholder }}
        </label>
        <slot></slot>
    </div>
</template>
<script>
    export default {
        props: ['name', 'invalid', 'placeholder'],
        inheritAttrs: false,
        data: () => {
            return {
                filename: '',
            }
        },
        methods: {
            onFileChange($event){
                const files = $event.target.files || $event.dataTransfer.files;
                if (files) {
                    if (files.length > 0) {
                        this.filename = [...files].map(file => file.name).join(', ');
                    } else {
                        this.filename = null;
                    }
                } else {
                    this.filename = $event.target.value.split('\\').pop();
                }
            }
        }
    }
</script>
