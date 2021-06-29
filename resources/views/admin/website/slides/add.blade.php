@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-xl-2">
                @include('admin.components.website_nav', ['carousel' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-8">
                <div class="page-header">
                    <h3>{{ __('Add new carousel slide') }}</h3>
                    <hr />
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row mb-2">
                        <label for="label" class="col-md-2 col-form-label text-md-end">{{ __('Label') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" value="{{ old('label') }}" required autofocus>

                            @error('label')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-md-2 col-form-label text-md-end">{{ __('Photo') }}<span class="required">*</span></div>

                        <div class="col-md-6">
                            <file-upload invalid="{{ $errors->has('photo') }}" name="photo" placeholder="Choose photo" required>
                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </file-upload>
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
