@extends('layouts.app')

@section('content')
<x-carousel></x-carousel>
<div class="container page-padding">
    <div class="row">
        <div class="col-sm-9">
            <div class="page-header">
                <h1>{{ $page->title }}</h1>
                <hr />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9">
            {!! $page->content !!}
        </div>
    </div>
</div>
@endsection

@push('extra-head')
    <script async="" src="//platform.instagram.com/en_US/embeds.js"></script>
@endpush
