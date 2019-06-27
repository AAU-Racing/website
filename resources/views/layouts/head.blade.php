<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="AAU Racing" />
<meta property="og:description" content="AAU Racing is the FSAE Team at Aalborg University, Denmark." />
<meta property="og:image" content="http://aauracing.dk/img/faauracinglogo.png" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="{{ asset('js/tinymce.js') }}" type="text/javascript"></script>
<script>
    tinymce.init({
        selector: 'textarea#editable'
    });
</script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
