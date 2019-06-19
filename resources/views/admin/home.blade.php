@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4">
        <div class="col-md-3">
            @component('admin.components.profile')
            @endcomponent
        </div>
    </div>
</div>
@endsection
