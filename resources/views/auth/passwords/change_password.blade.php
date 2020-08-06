@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white bg-aau">{{ __('Change password') }}</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="current-password"
                                       class="col-md-6 offset-md-3 control-label">{{ __('Current Password') }}<span
                                        class="required">*</span></label>

                                <div class="col-md-6 offset-md-3">
                                    <input id="current-password" type="password"
                                           class="form-control @error('current-password') is-invalid @enderror"
                                           name="current-password" required>

                                    @error('current-password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new-password"
                                       class="col-md-6 offset-md-3 control-label">{{ __('New Password') }}<span
                                        class="required">*</span></label>

                                <div class="col-md-6 offset-md-3">
                                    <input id="new-password" type="password"
                                           class="form-control @error('new-password') is-invalid @enderror"
                                           name="new-password" required>

                                    @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new-password-confirm"
                                       class="col-md-6 offset-md-3 control-label">{{ __('Confirm New Password') }}<span
                                        class="required">*</span></label>

                                <div class="col-md-6 offset-md-3">
                                    <input id="new-password-confirm" type="password" class="form-control"
                                           name="new-password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
