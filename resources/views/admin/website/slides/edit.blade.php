@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-lg-3 col-xl-2">
                @include('admin.components.website_nav', ['carousel' => 'active', 'flex' => 'lg'])
            </div>
            <div class="col-lg-9 col-xl-8">
                <div class="page-header">
                    <h3>{{ __('Edit carousel slide') }}</h3>
                    <hr />
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row mb-2">
                        <label for="label" class="col-md-2 col-form-label text-md-end">{{ __('Label') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" value="{{ old('label', $slide->label) }}" required autofocus>

                            @error('label')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="current_photo" class="col-md-3 col-lg-2 col-form-label text-md-end">{{ __('Current Photo') }}</label>

                        <div class="col-md-6">
                            @if($slide->getFirstMedia('photos'))
                                <img src="{{ $slide->getFirstMedia('photos')->getUrl() }}" class="edit-slide-image" alt="{{ $slide->label }}"/>
                            @else
                                <div class="no-image">{{ __('No image') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-md-3 col-lg-2 col-form-label text-md-end">{{ __('New Photo') }}</div>

                        <div class="col-md-6">
                            <file-upload invalid="{{ $errors->has('photo') }}" name="photo" placeholder="Choose new photo">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </file-upload>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-md-9 offset-md-3 col-lg-10 offset-lg-2">
                            <button type="submit" class="btn btn-aau">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
