@extends('layouts.app')

@section('content')
    <div class="container page-padding">
        <div class="row">
            <div class="col-sm-9">
                {!! $page->content !!}
            </div>

            @component('layouts.sponsors')
            @endcomponent
        </div>
    </div>
@endsection
