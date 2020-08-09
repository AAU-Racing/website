<?php

namespace App\Http\Requests;

use App\Rules\HasCar;
use App\Services\UserService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
{
    private $service;

    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);

        $this->service = new UserService();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->service->findById($this->route('id'));

        $driversLicenseRule = Rule::unique('drivers_licenses', 'license_number');
        if ($user->driversLicense) {
            $driversLicenseRule = $driversLicenseRule->ignore($user->driversLicense->id);
        }

        $emailRule = Rule::unique('users', 'email');
        if ($user->email) {
            $emailRule = $emailRule->ignore($user->email);
        }

        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $emailRule],
            'phone_number' => ['required', 'integer'],
            'zip' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'study_number' => ['nullable', 'integer'],
            'study_card_number' => ['nullable', 'integer'],
            'education' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date_format:d-m-Y'],
            'drivers_license' => ['nullable', 'string', 'max:255', $driversLicenseRule],
            'car' => ['required', 'string', 'max:10', new HasCar],
            'primary' => ['required', 'in_array:contact_person.*.id'],
            'contact_person' => ['required', 'min:1'],
            'contact_person.*.id' => ['required'],
            'contact_person.*.name' => ['required', 'string', 'max:255'],
            'contact_person.*.phone_number' => ['required', 'integer'],
        ];
    }
}
