<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @component('layouts.head')
    @endcomponent()
</head>
<body class="admin-body">
    @component('layouts.google_scripts')
    @endcomponent
    <div id="app" class="container-fluid home">
        @component('admin.layouts.header')
        @endcomponent

        <main class="content">
            @yield('content')
        </main>

        @component('admin.layouts.footer')
        @endcomponent
    </div>
</body>
</html>
