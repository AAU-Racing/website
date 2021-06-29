<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body class="user-body">
    @include('layouts.google_scripts')
    <div id="app" class="container home">
        <x-header></x-header>

        <main class="content">
            @yield('content')
        </main>

        <x-footer></x-footer>
    </div>
    @include('cookie-consent::index')
</body>
</html>
