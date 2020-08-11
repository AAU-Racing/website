@extends('layouts.app')

@section('content')
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

            <x-sponsors></x-sponsors>
        </div>
    </div>
@endsection
