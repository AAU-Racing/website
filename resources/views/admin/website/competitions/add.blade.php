@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-xl-2">
                @include('admin.components.website_nav', ['competitions' => 'active', 'flex' => 'md'])
            </div>
            <div class="col-md-9 col-xl-8">
                <div class="page-header">
                    <h3>{{ __('Add competition') }}</h3>
                    <hr />
                </div>
                <form method="POST">
                    @csrf

                    <div class="form-group row mb-2">
                        <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="country" class="col-md-2 col-form-label text-md-end">{{ __('Country') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required>

                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="year" class="col-md-2 col-form-label text-md-end">{{ __('Year') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="year" type="number" min="2000" max="2200" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required>

                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="link" class="col-md-2 col-form-label text-md-end">{{ __('Link') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" required>

                            @error('link')
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
