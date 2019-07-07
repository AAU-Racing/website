<div class="nav flex-{{$flex}}-column justify-content-center nav-pills nav-pills-aau mb-3" id="v-pills-tab" aria-orientation="vertical">
    <a class="nav-link @isset($pages)) active @endisset" id="v-pills-avatars-tab" href="{{ route('admin::page::home') }}" aria-controls="v-pills-avatars" aria-selected="{{ isset($pages) }}">Pages</a>
    <a class="nav-link @isset($cars)) active @endisset" id="v-pills-profiles-tab" href="{{ route('admin::car::home') }}" aria-controls="v-pills-profiles" aria-selected="{{ isset($cars) }}">Cars</a>
{{--    <a class="nav-link @isset($competitions)) active @endisset" id="v-pills-profiles-tab" href="{{ route('admin::competition::home') }}" aria-controls="v-pills-profiles" aria-selected="{{ isset($competitions) }}">Competitions</a>--}}
    <a class="nav-link @isset($carousel)) active @endisset" id="v-pills-roles-tab" href="{{ route('admin::carousel::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($carousel) }}">Carousel</a>
    <a class="nav-link @isset($sponsors)) active @endisset" id="v-pills-roles-tab" href="{{ route('admin::sponsor::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($sponsors) }}">Sponsors</a>
    <a class="nav-link @isset($press)) active @endisset" id="v-pills-roles-tab" href="{{ route('admin::press::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($press) }}">Press</a>
    <a class="nav-link @isset($footer_links)) active @endisset" id="v-pills-roles-tab" href="{{ route('admin::footer_link::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($footer_links) }}">Footer links</a>
</div>
