<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img alt="Logo of AAU Racing" src="{{ asset('images/Logo_AAU_Racing.svg') }}">
            <span class="logo-text">
                AAU <span class="logo-subtext">Racing</span>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin::home') }}">Home</a>
                </li>
                @if(Auth::user()->hasRole('website-admin') || Auth::user()->hasRole('moderator'))
                    <li class="nav-item {{ Request::is('admin/profile*') || Request::is('admin/role*') || Request::is('admin/avatar*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin::profile::home') }}">Users</a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/page*', 'admin/car*', 'admin/footerlink*', 'admin/sponsor*', 'admin/press*', 'admin/competition*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin::page::home') }}">Website</a>
                    </li>
                @endif

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end mb-2" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('auth::change_password') }}">Change password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
