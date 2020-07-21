<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCarouselSlideRequest extends FormRequest
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
            'label' => ['required', 'string', 'max:200'],
            'photo' => ['nullable', 'sometimes', 'image', 'max:'. 32 * 1024]
        ];
    }

    public function messages()
    {
        return [
            'photo.image' => 'The file must be an image.',
        ];
    }
}