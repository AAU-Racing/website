<script src="{{ asset('js/tinymce.min.js') }}" type="text/javascript"></script>
<script>
    tinymce.init({
        selector: 'textarea#editable',
        plugins: "lists autolink emoticons hr textcolor visualchars paste link",
        toolbar: 'undo redo | styleselect | bold italic forecolor backcolor | ' +
            'alignleft aligncenter alignright alignjustify visualchars | ' +
            'outdent indent | numlist bullist link | paste pastetext | emoticons hr',
    });
</script>
