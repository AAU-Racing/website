<div class="nav flex-{{$flex}}-column justify-content-center nav-pills mb-3" id="v-pills-tab" aria-orientation="vertical">
    <a class="nav-link @if(isset($avatars)) active @endif" id="v-pills-avatars-tab" href="" aria-controls="v-pills-avatars" aria-selected="{{ isset($avatars) }}">Avatars</a>
    @can('view all profiles')<a class="nav-link @if(isset($profiles)) active @endif" id="v-pills-profiles-tab" href="{{ route('admin::profile::home') }}" aria-controls="v-pills-profiles" aria-selected="{{ isset($profiles) }}">Profiles</a>@endcan
    @can('view roles')<a class="nav-link @if(isset($roles)) active @endif" id="v-pills-roles-tab" href="{{ route('admin::role::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($roles) }}">Roles</a>@endcan
    <a class="nav-link @if(isset($departments)) active @endif" id="v-pills-avatars-tab" href="" aria-controls="v-pills-avatars" aria-selected="{{ isset($departments) }}">Departments</a>
</div>
