@extends('admin.layouts.app')

@push('extra-head')
    @include('admin.components.tinymce')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-lg-3 col-xl-2">
                @include('admin.components.users_nav', ['departments' => 'active', 'flex' => 'lg'])
            </div>
            <div class="col-lg-9 col-xl-10">
                <div class="page-header">
                    <h3>{{ __('Assign members to departments') }}</h3>
                    <hr />
                </div>
                <form method="POST">
                    @csrf
                    <department-assignment
                        :departments="{{ $departments->toJson() }}"
                        :users="{{ $users->toJson() }}"
                        :errors="{{ json_encode($errors->get('assignment')) }}">
                    </department-assignment>
                    <button type="submit" class="btn btn-aau d-none d-md-block">Save assignment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
