<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialties')->insert([
            ['name' => 'Neurologia'],
            ['name' => 'Cardiologia'],
            ['name' => 'Infectologia'],
            ['name' => 'Dermatologia'],
            ['name' => 'Ortopedia'],
            ['name' => 'Pediatria']
        ]);
    }
}
