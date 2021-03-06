@extends('admin.layouts.app')

@section('content')
<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-aau">{{ __('Edit profile') }}</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="firstname" class="col-md-5 col-form-label text-md-end">{{ __('First Name') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $user->firstname) }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="lastname" class="col-md-5 col-form-label text-md-end">{{ __('Last Name') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $user->lastname) }}" required autocomplete="lastname">

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="date_of_birth" class="col-md-5 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="text" data-provide="datepicker" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth', $user->formatted_date_of_birth) }}">

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-5 col-form-label text-md-end">{{ __('University E-Mail Address') }}</span></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label for="phone_number" class="col-md-5 col-form-label text-md-end">{{ __('Phone Number') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required>

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <h5 class="col-md-5 text-muted text-md-end">Address</h5>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="address" class="col-md-5 col-form-label text-md-end">{{ __('Address') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address->address) }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <danish-zip-code :zip_code_name="'{{ __('Zip Code') }}'" :zip_code_old="'{{ old('zip', $user->address->zip) }}'" :zip_code_error="{{ json_encode($errors->get('zip')) }}"
                                         :city_name="'{{ __('City') }}'" :city_old="'{{ old('city', $user->address->city) }}'" :city_error="{{ json_encode($errors->get('city')) }}">
                        </danish-zip-code>

                        <div class="row mt-5">
                            <h5 class="col-md-5 text-muted text-md-end">Education</h5>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="education" class="col-md-5 col-form-label text-md-end">{{ __('Education') }}</label>

                            <div class="col-md-6">
                                <input id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education', $user->education) }}">

                                @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="study_number" class="col-md-5 col-form-label text-md-end">{{ __('Study Number') }}</label>

                            <div class="col-md-6">
                                <input id="study_number" type="text" class="form-control @error('study_number') is-invalid @enderror" name="study_number" value="{{ old('study_number', $user->study_number) }}">

                                @error('study_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label for="study_card_number" class="col-md-5 col-form-label text-md-end">{{ __('Study Card Number') }}</label>

                            <div class="col-md-6">
                                <input id="study_card_number" type="text" class="form-control @error('study_card_number') is-invalid @enderror" name="study_card_number" value="{{ old('study_card_number', $user->study_card_number) }}">

                                @error('study_card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <h5 class="col-md-5 text-muted text-md-end">Car</h5>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="drivers_license" class="col-md-5 col-form-label text-md-end">{{ __('Driver\'s License') }}</label>

                            <div class="col-md-6">
                                <input id="drivers_license" type="text" class="form-control @error('drivers_license') is-invalid @enderror" name="drivers_license" value="{{ old('drivers_license', optional($user->driversLicense)->license_number) }}">

                                @error('drivers_license')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label for="car" class="col-md-5 col-form-label text-md-end">{{ __('Available Car') }}<span class="required">*</span></label>

                            <div class="col-md-6">
                                <select id="car" class="form-control @error('car') is-invalid @enderror" name="car">
                                    <option value="no" {{ old('car', $user->car ? ($user->car->towbar ? 'towbar' : 'yes') : 'no') == 'no' ? 'selected': '' }}>No</option>
                                    <option value="yes" {{ old('car', $user->car ? ($user->car->towbar ? 'towbar' : 'yes') : 'no') == 'yes' ? 'selected': '' }}>Yes</option>
                                    <option value="towbar" {{ old('car', $user->car ? ($user->car->towbar ? 'towbar' : 'yes') : 'no') == 'towbar' ? 'selected': '' }}>Yes, with towbar</option>
                                </select>

                                @error('car')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5 ms-1 mb-2">
                            <h5 class="text-muted">Contact persons</h5>
                            <hr class="narrow-hr" />
                        </div>
                        <contact-person-table :contact_persons="{{ json_encode(old('contact_person', $contactPersons)) }}" :checked="{{ old('primary', $primary) }}"></contact-person-table>

                        <div class="form-group row mb-0 mt-5 justify-content-center">
                            <button type="submit" class="btn btn-aau">
                                {{ __('Update Profile') }}
                            </button>

                            <a class="btn btn-link" href="{{ route('auth::change_password') }}">
                                {{ __('Change password') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
