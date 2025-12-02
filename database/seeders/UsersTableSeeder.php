<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nombre_completo' => 'David Santiago',
                'email' => 'Santiago@gmail.com',
                'departamento' => 'Software',
                'telefono' => '3107764463',
                'fecha_registro' => now(),
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_completo' => 'Edisson Lopez',
                'email' => 'Edisson@gmail.com',
                'departamento' => 'Lider en Desarrollo',
                'telefono' => '123124512',
                'fecha_registro' => now(),
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
