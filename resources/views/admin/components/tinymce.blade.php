<script src="{{ asset('js/tinymce.min.js') }}" type="text/javascript"></script>
<script>
    tinymce.init({
        selector: 'textarea#editable',
        plugins: "lists autolink emoticons hr textcolor visualchars paste link image imagetools",
        toolbar: 'undo redo | styleselect | bold italic forecolor backcolor | ' +
            'alignleft aligncenter alignright alignjustify visualchars | ' +
            'outdent indent | numlist bullist link image | paste pastetext | emoticons hr',
        images_upload_handler: function (blobInfo, success, failure) {
            const formData = new FormData();
            formData.append('image', blobInfo.blob(), blobInfo.filename());

            axios.post('/admin/image', formData, {
                headers: {
                    'X-CRSF-Token': '{{ csrf_token() }}'
                }
            })
            .then(function (response) {
                //handle success
                success(response.data.location);
            })
            .catch(function (error) {
                //handle error
                failure('Error: ' + error.message);
            });
        }
    });
</script>
