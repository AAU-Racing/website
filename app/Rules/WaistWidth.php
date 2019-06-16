<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WaistWidth implements Rule
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
        return in_array($value, array("28", "29", "30", "31", "32", "33", "34", "36", "38", "40", "42", "44"));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute should be a valid waist width';
    }
}
