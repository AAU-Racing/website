@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4">
        <div class="col-sm-3 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-aau text-white">Pages</div>
                <div class="card-body">
                    <div class="card-text">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action" href="{{ route('admin::page::editForm', ['page' => 'front']) }}">Front</a>
                            <a class="list-group-item list-group-item-action" href="{{ route('admin::page::editForm', ['page' => 'about']) }}">About</a>
                            <a class="list-group-item list-group-item-action" href="{{ route('admin::page::editForm', ['page' => 'contact']) }}">Contact</a>
                            <a class="list-group-item list-group-item-action" href="{{ route('admin::page::editForm', ['page' => 'sponsor']) }}">Sponsor</a>
                            <a class="list-group-item list-group-item-action" href="{{ route('admin::page::editForm', ['page' => 'recruitment']) }}">Recruitment</a>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="mt-3">
                            <a href="#" class="btn btn-primary">Gem rækkefølge</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-aau text-white">Cars</div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-sm-3 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-aau text-white">Carousel</div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-sm-3 d-flex">
            <div class="card flex-fill">
                <div class="card-header bg-aau text-white">Footer links</div>
                <div class="card-body">
                    <div class="card-text">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action">Aalborg University</a>
                            <a class="list-group-item list-group-item-action">Formula Student</a>
                            <a class="list-group-item list-group-item-action">SAE International</a>
                            <a class="list-group-item list-group-item-action">Find us on Facebook!</a>
                            <a class="list-group-item list-group-item-action">Find us on Instagram!</a>
                            <a class="list-group-item list-group-item-action">AAU Racing Wiki</a>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="mt-3">
                            <a href="#" class="btn btn-primary">Gem rækkefølge</a>
                            <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
