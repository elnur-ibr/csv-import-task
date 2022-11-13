<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class WrongColumnsException extends ValidationException
{
    /**
     * @param string|array $expected
     * @param string|array $actual
     * @return WrongColumnsException
     */
    public static function make($expected, $actual)
    {
        if(is_array($expected)) {
            $expected = implode(', ', $expected);
            $actual = implode(', ', $actual);
        }

        $messages = [
            'csv' => 'Expected columns is/are: '
            . $expected
            . 'Receved Columns: '
            . $actual
        ];

        return parent::withMessages($messages);
    }
}
