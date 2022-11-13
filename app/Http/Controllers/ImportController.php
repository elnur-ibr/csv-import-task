<?php

namespace App\Http\Controllers;

use App\Exceptions\WrongColumnsException;
use App\Http\Requests\ImportRequest;
use App\Imports\Import;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    /**
     * @var Setting
     */
    public Setting $setting;

    /**
     * @param ImportRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(ImportRequest $request)
    {
        $this->setting = Setting::find($request->safe()->setting);

        config(['excel.imports.csv.delimiter' => $request->safe()->delimiter]);

        $data = Excel::toCollection(new Import, $request->safe()->csv);
        //We need only one sheet
        $data = $data->first();

        $this->validateHeadings($data->first()->keys()->toArray());

        $this->importRows($data);

        return redirect(route('home'))->with(['status' => 'Success']);
    }

    /**
     * @param Collection $rows
     */
    public function importRows(Collection $rows)
    {
        foreach ($rows as $row) {
            $validator = Validator::make($row->toArray(), $this->setting->rules);

            if ($validator->fails()) {
                Log::channel('invalid-rows')
                    ->info('Not valid row: ', ['row' => $row->toArray(), 'errors' => $validator->errors()->messages()]);
            } else {
                DB::connection($this->setting->database_name)
                    ->table($this->setting->table_name)
                    ->insert($row->toArray());
            }
        }

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
