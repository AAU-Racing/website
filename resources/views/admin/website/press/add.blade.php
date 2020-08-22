@extends('admin.layouts.app')

@push('extra-head')
    @include('admin.components.tinymce')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-xl-2">
                @include('admin.components.website_nav', ['press' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-8">
                <div class="page-header">
                    <h3>{{ __('Add new press post') }}</h3>
                    <hr />
                </div>
                <form method="POST">
                    @csrf
                    <input type="hidden" name="notfirst" value="1">

                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

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
                            <textarea id="editable" class="wysiwyg-editor" name="content">{{ old('content') }}</textarea>

                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2 col-form-label text-md-right">{{ __('Active') }}</div>

                        <div class="col-md-6">
                            <div class="custom-control custom-checkbox">
                                <!-- Check for old name is because active is not submitted if not checked -->
                                <input type="checkbox" class="custom-control-input" id="active" name="active" @if(old('active') || !old('notfirst')) checked @endif>
                                <label class="custom-control-label" for="active"></label>
                            </div>

                            @error('active')
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
