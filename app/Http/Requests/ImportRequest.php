<?php

namespace App\Http\Requests;

use App\Rules\Utf8;
use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'setting' => 'required|exists:settings,id',
            'csv'     => ['required','file','mimes:csv', new Utf8]
        ];
    }
}
