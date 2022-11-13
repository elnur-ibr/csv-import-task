<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class Delimiter implements Rule
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
    public function passes($attribute, $csv)
    {
        $fileHandle = fopen($csv->getPathname(), 'rb');
        //SKipping BOM
        fgets($fileHandle, 3 + 1);
        $firstLine = fgets($fileHandle);

        fclose($fileHandle);

        return ((strlen(trim($firstLine, "\r\n")) == 5)
            && (stripos($firstLine, 'sep=') === 0));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Delimiter was not set.';
    }
}
