@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-lg-3 col-xl-2">
            @include('admin.components.users_nav', ['avatars' => 'active', 'flex' => 'lg'])
        </div>
        <div class="col-lg-9 col-xl-6 offset-xl-1">
            <div class="card">
                <div class="card-header text-white bg-aau">{{ __('users.edit_avatar', ['name' => $avatar->name]) }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="current_photo" class="col-md-4 col-form-label text-md-right">{{ __('Current Avatar') }}</label>

                            <div class="col-md-6">
                                @if($avatar->getFirstMedia('avatar'))
                                    <img src="{{ $avatar->getFirstMedia('avatar')->getUrl() }}" class="edit-avatar-image" alt="{{ $avatar->name }}"/>
                                @else
                                    <div class="no-image">{{ __('No image') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">{{ __('New Avatar') }}</div>

                            <div class="col-md-6">
                                <file-upload invalid="{{ $errors->has('avatar') }}" name="avatar" placeholder="Choose new avatar">
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </file-upload>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-5 justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Avatar') }}
                            </button>

                            {{-- _method: delete is magic that makes laravel interpret the POST as a DELETE --}}
                            <button type="submit" class="btn btn-link" name="_method" value="delete">
                                {{ __('Delete Avatar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
