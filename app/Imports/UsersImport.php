<?php

namespace App\Imports;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        dd($row);
        return new User([

        ]);
    }

    public function rules(): array
    {
        return Setting::first()->columns;
    }

    public function toArray()
    {
        dd();
    }
}
