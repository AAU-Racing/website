@extends('layouts.app')

@section('content')
    <div class="container page-padding">
        <div class="row">
            <div class="col-sm-9">
                <div class="page-header">
                    <h1>{{ $page->title }}</h1>
                    <hr />
                </div>
                @foreach($cars as $car)
                    <div class="car">
                        <div class="car-title">
                            <h4>{{ $car->name }} ({{$car->years}})</h4>
                        </div>
                        <div class="car-body">
                            @if($car->getFirstMedia('photos'))<img src="{{ $car->getFirstMedia('photos')->getUrl() }}" class="car-image" alt="{{ $car->name }}"/>@endif
                            {!! $car->specifications !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
