<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <meta property="og:url" <?php echo 'content="http://'.$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'].'"'; ?> />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="AAU Racing" />
    <meta property="og:description" content="AAU Racing is the FSAE Team at Aalborg University, Denmark." />
    <meta property="og:image" content="http://aauracing.dk/img/faauracinglogo.png" />
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @component('/layouts/google_scripts')
    @endcomponent
    <div id="app">
        @component('/layouts/header')
        @endcomponent

        <main class="py-4 content">
            @yield('content')
        </main>

        @component('/layouts/footer')
        @endcomponent
    </div>
</body>
</html>
