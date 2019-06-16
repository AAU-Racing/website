@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip code') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="zip" type="zip" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required>

                                @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="study_number" class="col-md-4 col-form-label text-md-right">{{ __('Study number') }}</label>

                            <div class="col-md-6">
                                <input id="study_number" type="text" class="form-control @error('study_number') is-invalid @enderror" name="study_number" value="{{ old('study_number') }}">

                                @error('study_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="education" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

                            <div class="col-md-6">
                                <input id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}">

                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="drivers_license" class="col-md-4 col-form-label text-md-right">{{ __('Driver\'s license') }}</label>

                            <div class="col-md-6">
                                <input id="drivers_license" type="text" class="form-control @error('drivers_license') is-invalid @enderror" name="drivers_license" value="{{ old('drivers_license') }}">

                                @error('drivers_license')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="waist_width" class="col-md-4 col-form-label text-md-right">{{ __('Waist width') }}</label>

                            <div class="col-md-6">
                                <select id="waist_width" class="form-control @error('waist_width') is-invalid @enderror" name="waist_width">
                                    <option value="" {{ (old('waist_width') == '' ? 'selected': '') }}>Do not specify</option>
                                    <option {{ (old('waist_width') == '28' ? 'selected': '') }}>28</option>
                                    <option {{ (old('waist_width') == '29' ? 'selected': '') }}>29</option>
                                    <option {{ (old('waist_width') == '30' ? 'selected': '') }}>30</option>
                                    <option {{ (old('waist_width') == '31' ? 'selected': '') }}>31</option>
                                    <option {{ (old('waist_width') == '32' ? 'selected': '') }}>32</option>
                                    <option {{ (old('waist_width') == '33' ? 'selected': '') }}>33</option>
                                    <option {{ (old('waist_width') == '34' ? 'selected': '') }}>34</option>
                                    <option {{ (old('waist_width') == '36' ? 'selected': '') }}>36</option>
                                    <option {{ (old('waist_width') == '38' ? 'selected': '') }}>38</option>
                                    <option {{ (old('waist_width') == '40' ? 'selected': '') }}>40</option>
                                    <option {{ (old('waist_width') == '42' ? 'selected': '') }}>42</option>
                                    <option {{ (old('waist_width') == '44' ? 'selected': '') }}>44</option>
                                </select>

                                @error('waist_width')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shirt_size" class="col-md-4 col-form-label text-md-right">{{ __('Shirt size') }}</label>

                            <div class="col-md-6">
                                <select id="shirt_size" class="form-control @error('shirt_size') is-invalid @enderror" name="shirt_size">
                                    <option value="" {{ (old('shirt_size') == '' ? 'selected': '') }}>Do not specify</option>
                                    <option {{ (old('shirt_size') == 'XS' ? 'selected': '') }}>XS</option>
                                    <option {{ (old('shirt_size') == 'S' ? 'selected': '') }}>S</option>
                                    <option {{ (old('shirt_size') == 'M' ? 'selected': '') }}>M</option>
                                    <option {{ (old('shirt_size') == 'L' ? 'selected': '') }}>L</option>
                                    <option {{ (old('shirt_size') == 'XL' ? 'selected': '') }}>XL</option>
                                    <option {{ (old('shirt_size') == 'XXL' ? 'selected': '') }}>XXL</option>
                                    <option {{ (old('shirt_size') == 'XXXL' ? 'selected': '') }}>XXXL</option>
                                </select>

                                @error('shirt_size')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}">

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
