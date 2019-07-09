@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-lg-3 col-xl-2">
                @component('admin.components.website_nav', ['cars' => 'active', 'flex' => 'lg'])
                @endcomponent
            </div>
            <div class="col-lg-9 col-xl-8">
                <div class="page-header">
                    <h3>Edit car</h3>
                    <hr />
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-lg-2 col-form-label text-md-right">{{ __('Name') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $car->name }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="first_year" class="col-md-3 col-lg-2 col-form-label text-md-right">{{ __('First Year') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="first_year" type="text" class="form-control @error('first_year') is-invalid @enderror" name="first_year" value="{{ old('first_year') ?? $car->first_year }}" required>

                            @error('first_year')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_year" class="col-md-3 col-lg-2 col-form-label text-md-right">{{ __('Last Year') }}</label>

                        <div class="col-md-6">
                            <input id="last_year" type="text" class="form-control @error('last_year') is-invalid @enderror" name="last_year" value="{{ old('last_year') ?? $car->last_year }}">

                            @error('last_year')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="current_photo" class="col-md-3 col-lg-2 col-form-label text-md-right">{{ __('Current Photo') }}</label>

                        <div class="col-md-6">
                            @if($car->getFirstMedia('photos'))
                                <img src="{{ $car->getFirstMedia('photos')->getUrl() }}" class="edit-car-image" alt="{{ $car->name }}"/>
                            @else
                                No image
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 col-lg-2 col-form-label text-md-right">{{ __('New Photo') }}</div>

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

                    <div class="form-group row">
                        <label for="editable" class="col-md-3 col-lg-2 col-form-label text-md-right">{{ __('Content') }}<span class="required">*</span></label>

                        <div class="col-md-9 col-lg-10">
                            <textarea id="editable" class="wysiwyg-editor" name="specifications">{{ old('specifications') ?? $car->specifications }}</textarea>

                            @error('specifications')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-9 offset-md-3 col-lg-10 offset-lg-2">
                            <button type="submit" class="btn btn-primary">Save and continue editing</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection