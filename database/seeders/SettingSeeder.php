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
                'user_id'       => ['rules' => 'required|integer|min:1', 'order' => 1],
                'firstname'     => ['rules' => 'required|string', 'order' => 2],
                'lastname'      => ['rules' => 'required|string', 'order' => 3],
                'email'         => ['rules' => 'required|email', 'order' => 4],
                'date_of_birth' => ['rules' => 'required|date', 'order' => 5],
                'birthplace'    => ['rules' => 'required|string', 'order' => 6],
            ]
        ]);
    }
}
