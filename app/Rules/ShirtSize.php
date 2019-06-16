<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ShirtSize implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, array("XS", "S", "M", "L", "XL", "XXL", "XXL"));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute should be a valid shirt size';
    }
}
