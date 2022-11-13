<?php

namespace App\Http\Controllers;

use App\Exceptions\WrongColumnsException;
use App\Http\Requests\ImportRequest;
use App\Imports\UsersImport;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /**
     * @var Setting
     */
    public Setting $setting;

    public function __invoke(ImportRequest $request)
    {
        $this->setting = Setting::find($request->safe()->setting);

        $data = Excel::toCollection('', $request->safe()->csv);

        //We need only one sheet
        $data = $data->first();

        $this->validateHeadings($data->first()->toArray());

        dd($data);
    }

    /**
     * @param $headings
     * @throws WrongColumnsException
     */
    public function validateHeadings($headings): void
    {
        $expected = implode(', ', $this->setting->expected_columns);
        $actual = implode(', ', $headings);

        if ($expected != $actual) {
            throw WrongColumnsException::make($expected, $actual);
        }
    }
}
