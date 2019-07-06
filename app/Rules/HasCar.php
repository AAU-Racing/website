<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class HasCar implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, array("no", "yes", "towbar"));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Specifying if you have a car is required.';
    }
}
