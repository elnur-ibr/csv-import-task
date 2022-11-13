<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'database_name' => 'csv_import',
            'table_name'    => 'users',
            'columns'       => [
                'firstname'     => 'required|string',
                'lastname'      => 'required|string',
                'email'         => 'required|email',
                'date_of_birth' => 'required|date',
                'birthplace'    => 'required|string',
            ]
        ]);
    }
}
