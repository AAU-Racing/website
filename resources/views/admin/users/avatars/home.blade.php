@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4">
        <div class="col-lg-2">
            @include('admin.components.users_nav', ['avatars' => 'active', 'flex' => 'lg'])
        </div>
        <div class="col-lg-10 container-fluid">
            <div class="row">
                @foreach($avatars as $avatar)
                    <div class="col-sm-2 col-12">
                        <div class="card h-100 d-flex flex-column justify-content-between">
                            @if($avatar->getFirstMedia('avatar'))
                                <img class="card-img-top" src="{{ $avatar->getFirstMedia('avatar')->getUrl() }}" alt="{{ $avatar->name }}"/>
                            @else
                                <div class="text-center no-avatar flex-grow-1 d-flex flex-column justify-content-center">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column align-items-center flex-grow-0">
                                <h5 class="card-title">{{ $avatar->name }}</h5>
                                <a href="{{ route('admin::avatar::edit', ['id' => $avatar->id]) }}" class="btn btn-primary">
                                    {{ __('Change Avatar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
