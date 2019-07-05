<div class="nav flex-{{$flex}}-column justify-content-center nav-pills nav-pills-aau mb-3" id="v-pills-tab" aria-orientation="vertical">
    @can('view all profiles')<a class="nav-link @isset($profiles) active @endisset" id="v-pills-profiles-tab" href="{{ route('admin::profile::home') }}" aria-controls="v-pills-profiles" aria-selected="{{ isset($profiles) }}">Profiles</a>@endcan
    <a class="nav-link @isset($avatars) active @endisset" id="v-pills-avatars-tab" href="" aria-controls="v-pills-avatars" aria-selected="{{ isset($avatars) }}">Avatars</a>
    @can('view roles')<a class="nav-link @isset($roles) active @endisset" id="v-pills-roles-tab" href="{{ route('admin::role::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($roles) }}">Roles</a>@endcan
    <a class="nav-link @isset($departments) active @endisset" id="v-pills-avatars-tab" href="" aria-controls="v-pills-avatars" aria-selected="{{ isset($departments) }}">Departments</a>
</div>
