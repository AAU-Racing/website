@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white bg-aau">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="firstname"
                                       class="col-md-5 col-form-label text-md-right">{{ __('First Name') }}<span
                                            class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text"
                                           class="form-control @error('firstname') is-invalid @enderror"
                                           name="firstname" value="{{ old('firstname') }}" required
                                           autocomplete="given-name" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Last Name') }}<span
                                            class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                           class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                           value="{{ old('lastname') }}" required autocomplete="family-name">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_of_birth"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="text" data-provide="datepicker"
                                           placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy"
                                           class="form-control @error('date_of_birth') is-invalid @enderror"
                                           name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="bday">

                                    @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-5 col-form-label text-md-right">{{ __('University E-Mail Address') }}
                                    <span class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Phone Number') }}<span
                                            class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           name="phone_number" value="{{ old('phone_number') }}" required
                                           pattern="\d{8}" autocomplete="tel-national">

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <h5 class="col-md-5 text-muted text-md-right">Address</h5>
                            </div>
                            <div class="form-group row">
                                <label for="zip" class="col-md-5 col-form-label text-md-right">{{ __('Zip Code') }}<span
                                            class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror"
                                           name="zip" value="{{ old('zip') }}" required autocomplete="postal-code">

                                    @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-5 col-form-label text-md-right">{{ __('City') }}<span
                                            class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                           class="form-control @error('city') is-invalid @enderror" name="city"
                                           value="{{ old('city') }}" required autocomplete="locality">

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-5 col-form-label text-md-right">{{ __('Address') }}
                                    <span class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control @error('address') is-invalid @enderror" name="address"
                                           value="{{ old('address') }}" required autocomplete="street-address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <h5 class="col-md-5 text-muted text-md-right">Education</h5>
                            </div>
                            <div class="form-group row">
                                <label for="education"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Education') }}</label>

                                <div class="col-md-6">
                                    <input id="education" type="text"
                                           class="form-control @error('education') is-invalid @enderror"
                                           name="education" value="{{ old('education') }}">

                                    @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="study_number"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Study Number') }}</label>

                                <div class="col-md-6">
                                    <input id="study_number" type="text"
                                           class="form-control @error('study_number') is-invalid @enderror"
                                           name="study_number" value="{{ old('study_number') }}">

                                    @error('study_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="study_card_number"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Study Card Number') }}</label>

                                <div class="col-md-6">
                                    <input id="study_card_number" type="text"
                                           class="form-control @error('study_card_number') is-invalid @enderror"
                                           name="study_card_number" value="{{ old('study_card_number') }}">

                                    @error('study_card_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <h5 class="col-md-5 text-muted text-md-right">Car</h5>
                            </div>
                            <div class="form-group row">
                                <label for="drivers_license"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Driver\'s License') }}</label>

                                <div class="col-md-6">
                                    <input id="drivers_license" type="text"
                                           class="form-control @error('drivers_license') is-invalid @enderror"
                                           name="drivers_license" value="{{ old('drivers_license') }}">

                                    @error('drivers_license')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car" class="col-md-5 col-form-label text-md-right">{{ __('Available Car') }}
                                    <span class="required">*</span></label>

                                <div class="col-md-6">
                                    <select id="car" class="form-control @error('car') is-invalid @enderror" name="car">
                                        <option>Not specified</option>
                                        <option value="no" {{ (old('car') == 'no' ? 'selected': '') }}>No</option>
                                        <option value="yes" {{ (old('car') == 'yes' ? 'selected': '') }}>Yes</option>
                                        <option value="towbar" {{ (old('car') == 'towbar' ? 'selected': '') }}>Yes, with
                                            towbar
                                        </option>
                                    </select>

                                    @error('car')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <h5 class="col-md-5 text-muted text-md-right">Contact Person</h5>
                            </div>
                            <div class="form-group row">
                                <label for="name_contact_person"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Name') }}<span
                                            class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="name_contact_person" type="text"
                                           class="form-control @error('name_contact_person') is-invalid @enderror"
                                           name="name_contact_person" value="{{ old('name_contact_person') }}" required>

                                    @error('name_contact_person')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number_contact_person"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Phone Number') }}<span
                                            class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="phone_number_contact_person" type="text"
                                           class="form-control @error('phone_number_contact_person') is-invalid @enderror"
                                           name="phone_number_contact_person"
                                           value="{{ old('phone_number_contact_person') }}" required pattern="\d{8}">

                                    @error('phone_number_contact_person')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <h5 class="col-md-5 text-muted text-md-right">Credentials</h5>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}
                                    <span class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-5 col-form-label text-md-right">{{ __('Confirm Password') }}<span
                                            class="required">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
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
