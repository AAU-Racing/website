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
        @foreach($press_posts as $press_post)
            <div class="row">
                <div class="press-post-title col-12">
                    <h4>{{ $press_post->title }}</h4>
                </div>
                <div class="press-post-body col-12">
                    {!! $press_post->content !!}
                </div>
            </div>

            @if(!$loop->last)
                <hr />
            @endif
        @endforeach
    </div>
@endsection
