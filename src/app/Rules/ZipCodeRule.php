<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ZipCodeRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[0-9]{7}$/', $value);
    }

    /**
     * @return string
     */
    public function message()
    {
        return '数字7桁で入力してください';

    }
}
