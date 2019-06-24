<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @component('layouts.head')
    @endcomponent()
</head>
<body class="user-body">
    @component('layouts.google_scripts')
    @endcomponent
    <div id="app" class="container home">
        @component('layouts.header')
        @endcomponent

        <main class="content">
            @yield('content')
        </main>

        @component('layouts.footer')
        @endcomponent
    </div>
</body>
</html>
