<div class="nav flex-{{$flex}}-column justify-content-center nav-pills nav-pills-aau mb-3" id="v-pills-tab" aria-orientation="vertical">
    <a class="nav-link @if(isset($pages)) active @endif" id="v-pills-avatars-tab" href="{{ route('admin::page::home') }}" aria-controls="v-pills-avatars" aria-selected="{{ isset($pages) }}">Pages</a>
    <a class="nav-link @if(isset($cars)) active @endif" id="v-pills-profiles-tab" href="{{ route('admin::car::home') }}" aria-controls="v-pills-profiles" aria-selected="{{ isset($cars) }}">Cars</a>
    <a class="nav-link @if(isset($competitions)) active @endif" id="v-pills-profiles-tab" href="{{ route('admin::competition::home') }}" aria-controls="v-pills-profiles" aria-selected="{{ isset($competitions) }}">Competitions</a>
    <a class="nav-link @if(isset($carousel)) active @endif" id="v-pills-roles-tab" href="{{ route('admin::carousel::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($carousel) }}">Carousel</a>
    <a class="nav-link @if(isset($sponsors)) active @endif" id="v-pills-roles-tab" href="{{ route('admin::sponsor::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($sponsors) }}">Sponsors</a>
    <a class="nav-link @if(isset($press)) active @endif" id="v-pills-roles-tab" href="{{ route('admin::press::home') }}" aria-controls="v-pills-roles" aria-selected="{{ isset($press) }}">Press</a>
</div>
