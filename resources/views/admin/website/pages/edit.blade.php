@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-xl-2">
                @component('admin.components.website_nav', ['pages' => 'active', 'flex' => 'md'])
                @endcomponent
            </div>
            <div class="col-md-9 col-xl-8">
                <div class="page-header">
                    <h3>{{ __('Edit page') }}</h3>
                    <hr />
                </div>
                <form method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input readonly id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $page->name) }}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $page->title) }}" required autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="editable" class="col-md-2 col-form-label text-md-right">{{ __('Content') }}<span class="required">*</span></label>

                        <div class="col-md-10">
                            <textarea id="editable" class="wysiwyg-editor" name="content">{{ old('content', $page->content) }}</textarea>

                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
