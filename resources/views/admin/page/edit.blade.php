@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4 justify-content-center">
        <div class="col-lg-6">
            <form action="POST">
                <div class="form-group">
                    <textarea id="editable" class="wysiwyg-editor"></textarea>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-primary">Gem</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
