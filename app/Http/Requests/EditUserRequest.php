<?php

namespace App\Http\Requests;

use App\Rules\HasCar;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
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
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'integer'],
            'zip' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'study_number' => ['nullable', 'integer'],
            'study_card_number' => ['nullable', 'integer'],
            'education' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date_format:d-m-Y'],
            'drivers_license' => ['nullable', 'string', 'max:255', 'unique:drivers_licenses,license_number'],
            'car' => ['required', 'string', 'max:10', new HasCar],
            'primary' => ['required', 'in_array:contact_person.*.id'],
            'contact_person' => ['required', 'min:1'],
            'contact_person.*.id' => ['required'],
            'contact_person.*.name' => ['required', 'string', 'max:255'],
            'contact_person.*.phone_number' => ['required', 'integer'],
        ];
    }
}
