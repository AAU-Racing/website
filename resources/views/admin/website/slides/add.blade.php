@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-3 col-xl-2">
                @component('admin.components.website_nav', ['carousel' => 'active', 'flex' => 'md'])
                @endcomponent
            </div>
            <div class="col-md-9 col-xl-8">
                <div class="page-header">
                    <h3>Add new carousel slide</h3>
                    <hr />
                </div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="label" class="col-md-2 col-form-label text-md-right">{{ __('Label') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" value="{{ old('label') }}" required autofocus>

                            @error('label')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2 col-form-label text-md-right">{{ __('Photo') }}<span class="required">*</span></div>

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

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection