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
            'table_name'    => 'csv_import',
            'columns'       => [
                'firstname',
                'lastname',
                'email',
                'email',
                'date_of_birth',
                'birthplace',
                ]
        ]);
    }
}
