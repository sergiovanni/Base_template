<?php

namespace App\Rules;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Contracts\Validation\Rule;

class Email implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $emailArray = explode("@", $value);

        if (checkdnsrr(array_pop($emailArray), "MX")) {
            return true;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Le domaine de votre adresse mail est invalide.';
    }
}
