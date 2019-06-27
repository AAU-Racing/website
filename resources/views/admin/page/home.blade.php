@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4">
        <a href="{{ route('admin::page::editForm', ['page' => 'front']) }}">Front</a>
        <a href="{{ route('admin::page::editForm', ['page' => 'about']) }}">About</a>
        <a href="{{ route('admin::page::editForm', ['page' => 'contact']) }}">Contact</a>
        <a href="{{ route('admin::page::editForm', ['page' => 'sponsor']) }}">Sponsor</a>
        <a href="{{ route('admin::page::editForm', ['page' => 'recruitment']) }}">Recruitment</a>
    </div>
</div>
@endsection
