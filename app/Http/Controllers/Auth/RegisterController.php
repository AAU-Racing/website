<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\HasCar;
use App\Services\UserService;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

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

    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('guest');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
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
            'date_of_birth' => ['nullable', 'date_format:d-m-Y'],
            'drivers_license' => ['nullable', 'string', 'max:255', 'unique:drivers_licenses,license_number'],
            'car' => ['required', 'string', 'max:10', new HasCar],
            'name_contact_person' => ['required', 'string', 'max:255'],
            'phone_number_contact_person' => ['required', 'integer']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['date_of_birth'] = array_key_exists('date_of_birth', $data) ?
            date('Y-m-d', strtotime($data['date_of_birth'])) :
            null;
        return $this->userService->create($data);
    }
}
