@extends('layouts.app')

@section('content')
<x-carousel></x-carousel>
<div class="container page-padding">
    <div class="row justify-content-center">
        <div class="col-md-8">
           {!! $page->content !!}
        </div>
    </div>
</div>
@endsection

@push('extra-head')
    <script async="" src="//platform.instagram.com/en_US/embeds.js"></script>
@endpush
