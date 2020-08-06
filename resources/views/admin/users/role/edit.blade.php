@extends('admin.layouts.app')

@section('content')
<div class="container">
    <form method="POST">
        @csrf
        <div class="row p-4">
            <div class="col-md-1 offset-md-2">
                <a class="pull-right text-aau roles-back" href="{{ route('admin::role::home') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="col-md-6">
                <div class="row role-edit-header bg-aau text-white">
                    <h4>{{ $user->name }}</h4>
                </div>
                @foreach($roles as $role)
                    <div class="form-group row">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value={{ $role->id }} class="custom-control-input"
                                id="role_checkbox_{{$role->id}}" name="roles[]" {{ $user->hasRole($role) ? 'checked' : ''}}>
                            <label class="custom-control-label" for="role_checkbox_{{$role->id}}">{{ ucfirst(str_replace('-', ' ', $role->name)) }}</label>
                        </div>
                    </div>
                @endforeach
                @error('roles')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update roles') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
