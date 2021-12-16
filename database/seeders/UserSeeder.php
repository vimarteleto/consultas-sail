<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['crm' => '11111', 'name' => 'Ricardo Gomes', 'email' => 'ricardo@medico.com', 'specialty_id' => '1', 'password' => Hash::make('123456789')],
            ['crm' => '22222', 'name' => 'Maria Milani', 'email' => 'maria@medico.com', 'specialty_id' => '2', 'password' => Hash::make('123456789')],
            ['crm' => '33333', 'name' => 'João Moreira', 'email' => 'joao@medico.com', 'specialty_id' => '3', 'password' => Hash::make('123456789')],
            ['crm' => '44444', 'name' => 'Márcia Teixeira', 'email' => 'marcia@medico.com', 'specialty_id' => '4', 'password' => Hash::make('123456789')],
            ['crm' => '55555', 'name' => 'Cláudio Pires', 'email' => 'claudio@medico.com', 'specialty_id' => '5', 'password' => Hash::make('123456789')],
            ['crm' => '66666', 'name' => 'Carla Silva', 'email' => 'marcia@medico.com', 'specialty_id' => '1', 'password' => Hash::make('123456789')],
            ['crm' => '77777', 'name' => 'Prisicila Silveira', 'email' => 'marcia@medico.com', 'specialty_id' => '2', 'password' => Hash::make('123456789')],
        ]);
    }
}
