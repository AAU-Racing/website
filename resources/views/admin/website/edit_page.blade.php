@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row p-4 justify-content-center">
        <div class="col-lg-6">

            <form method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Page title" value="{{ old('title') ?? $page->title}}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea id="editable" class="wysiwyg-editor" name="content">{{ old('content') ?? $page->content }}</textarea>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-primary">Gem</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
