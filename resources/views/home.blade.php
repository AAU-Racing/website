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
