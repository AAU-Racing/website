@extends('layouts.app')

@section('content')
<x-carousel></x-carousel>
<div class="container page-padding">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {!! $page['html'] !!}
        </div>
    </div>
</div>
@endsection

@push('extra-head')
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId            : '677139815792629',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v8.0'
            });
        };
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
@endpush
