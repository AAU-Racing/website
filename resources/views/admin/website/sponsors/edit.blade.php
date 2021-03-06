@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-xl-2">
                @include('admin.components.website_nav', ['sponsors' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-8">
                <div class="page-header">
                    <h3>{{ __('Edit sponsor') }}</h3>
                    <hr />
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="notfirst" value="1">

                    <div class="form-group row mb-2">
                        <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $sponsor->name) }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="link" class="col-md-2 col-form-label text-md-end">{{ __('Link') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link', $sponsor->link) }}" required>

                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="current_logo" class="col-md-3 col-lg-2 col-form-label text-md-end">{{ __('Current Logo') }}</label>

                        <div class="col-md-6">
                            @if($sponsor->getFirstMedia('logo'))
                                <img src="{{ $sponsor->getFirstMedia('logo')->getUrl() }}" class="edit-logo-image" alt="{{ $sponsor->name }}"/>
                            @else
                                <div class="no-image">{{ __('No image') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-md-3 col-lg-2 col-form-label text-md-end">{{ __('New Logo') }}</div>

                        <div class="col-md-6">
                            <file-upload invalid="{{ $errors->has('logo') }}" name="logo" placeholder="Choose new logo">
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </file-upload>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-md-2 col-form-label text-md-end">{{ __('Active') }}</div>

                        <div class="col-md-6">
                            <div class="custom-control custom-checkbox">
                                <!-- Check for old('notfirst') is because active is not submitted if not checked -->
                                <input type="checkbox" class="custom-control-input" id="active" name="active" @if(old('active') || (!old('notfirst') && $sponsor->active)) checked @endif>
                                <label class="custom-control-label" for="active"></label>
                            </div>

                            @error('active')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-aau">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
