<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\HasCar;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'integer'],
            'zip' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'study_number' => ['nullable', 'integer'],
            'study_card_number' => ['nullable', 'integer'],
            'education' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'drivers_license' => ['nullable', 'string', 'max:255', 'unique:drivers_licenses,license_number'],
            'car' => ['required', 'string', 'max:10', new HasCar],
            'name_contact_person' => ['required', 'string', 'max:255'],
            'phone_number_contact_person' => ['required', 'integer']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = $this->userService->create($data);

        return $user;
    }
}
