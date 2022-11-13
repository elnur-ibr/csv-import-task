<?php

namespace App\Rules;

use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Validation\Rule;

class Utf8 implements Rule
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
     * @param  UploadedFile  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return mb_detect_encoding($value->get()) == 'UTF-8';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'File should be encoded with UTF8';
    }
}
