<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            ['user_id' => '1', 'patient_id' => '1', 'date_time' => '2021-12-20 15:00:00'],
            ['user_id' => '1', 'patient_id' => '2', 'date_time' => '2022-01-10 08:30:00'],
            ['user_id' => '1', 'patient_id' => '3', 'date_time' => '2022-02-05 10:30:00'],
            ['user_id' => '1', 'patient_id' => '5', 'date_time' => '2022-03-13 16:45:00'],
            ['user_id' => '1', 'patient_id' => '6', 'date_time' => '2022-01-14 08:15:00'],

            ['user_id' => '2', 'patient_id' => '8', 'date_time' => '2021-12-21 14:30:00'],
            ['user_id' => '2', 'patient_id' => '9', 'date_time' => '2022-01-22 13:15:00'],
            ['user_id' => '2', 'patient_id' => '5', 'date_time' => '2022-02-13 15:30:00'],
            ['user_id' => '2', 'patient_id' => '2', 'date_time' => '2022-02-05 10:45:00'],
            ['user_id' => '2', 'patient_id' => '1', 'date_time' => '2022-01-08 09:00:00'],

            ['user_id' => '3', 'patient_id' => '4', 'date_time' => '2022-02-07 13:00:00'],
            ['user_id' => '3', 'patient_id' => '2', 'date_time' => '2021-01-18 14:30:00'],
            ['user_id' => '3', 'patient_id' => '1', 'date_time' => '2022-02-16 08:45:00'],
            ['user_id' => '3', 'patient_id' => '9', 'date_time' => '2022-01-20 12:15:00'],

        ]);
    }
}
