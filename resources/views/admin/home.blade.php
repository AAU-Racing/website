@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4">
        <div class="col-lg-3 col-md-4">
            @component('admin.components.profile')
            @endcomponent
        </div>
    </div>
</div>
@endsection
