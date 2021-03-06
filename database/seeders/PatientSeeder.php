<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            ['cpf' => '11111111111', 'name' => 'José Silva', 'birthday' => '1980-04-21'],
            ['cpf' => '22222222222', 'name' => 'Regina Marques', 'birthday' => '1972-07-27'],
            ['cpf' => '33333333333', 'name' => 'Jaime Silveira', 'birthday' => '1968-07-04'],
            ['cpf' => '44444444444', 'name' => 'Helena Florêncio', 'birthday' => '2015-01-15'],
            ['cpf' => '55555555555', 'name' => 'Vinícius Marteleto', 'birthday' => '1993-04-21'],
            ['cpf' => '66666666666', 'name' => 'Pedro Silveira', 'birthday' => '1999-11-25'],
            ['cpf' => '77777777777', 'name' => 'Michele Abreu', 'birthday' => '1997-10-15'],
            ['cpf' => '88888888888', 'name' => 'Vanessa Cintra', 'birthday' => '1985-05-08'],
            ['cpf' => '99999999999', 'name' => 'André Oliveira', 'birthday' => '2010-08-21'],
            ['cpf' => '00000000000', 'name' => 'Eliana Pires', 'birthday' => '1996-01-13'],
        ]);
    }
}
