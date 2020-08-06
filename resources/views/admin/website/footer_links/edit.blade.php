@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-lg-3 col-xl-2">
                @component('admin.components.website_nav', ['footer_links' => 'active', 'flex' => 'lg'])
                @endcomponent
            </div>
            <div class="col-lg-9 col-xl-8">
                <div class="page-header">
                    <h3>{{ __('Edit footer link') }}</h3>
                    <hr />
                </div>
                <form method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $footer_link->name }}" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="path" class="col-md-2 col-form-label text-md-right">{{ __('Path') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <input id="path" type="text" class="form-control @error('path') is-invalid @enderror" name="path" value="{{ old('path') ?? $footer_link->path }}" required>

                            @error('path')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="target" class="col-md-2 col-form-label text-md-right">{{ __('Target') }}<span class="required">*</span></label>

                        <div class="col-md-6">
                            <select id="target" class="form-control @error('target') is-invalid @enderror" name="target" required>
                                <option value="_blank" {{ (old('target') ?? $footer_link->target) == '_blank' ? 'selected' : '' }}>New tab</option>
                                <option value="_self" {{ (old('target') ?? $footer_link->target) == '_self' ? 'selected' : '' }}>Current tab</option>
                            </select>

                            @error('target')
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
                                <input type="checkbox" class="custom-control-input" id="active" name="active" @if(old('active') || (!old('name') and $footer_link->active)) checked @endif>
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
                        <div class="col-md-9 offset-md-3 col-lg-10 offset-lg-2">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
