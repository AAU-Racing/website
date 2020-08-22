<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body class="admin-body">
    @include('layouts.google_scripts')
    <div id="app" class="container-fluid home">
        @include('admin.layouts.header')

        <main class="content">
            @yield('content')
        </main>

        @include('admin.layouts.footer')
    </div>
</body>
</html>
