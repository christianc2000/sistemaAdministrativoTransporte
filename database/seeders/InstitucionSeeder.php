<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        ['nombre' => 'Cooperativa de Transporte Cruceña RL',
        'direccion' => '7mo Anillo Barrio Hidalgo',
        'telefono' => 33568890,
        'id_administrador' => 1],
        ['nombre' => 'Cooperativa Internacional SRL',
        'direccion' => '3er Anillo Externo y Av. Busch',
        'telefono' => 33304110,
        'id_administrador' => 2],
        ['nombre' => '10 de noviembre',
        'direccion' => '2do Anillo Av. Cristo Redentor Nro. 720',
        'telefono' => 33356510,
        'id_administrador' => 3],
        ];
        DB::table('institucions')->insert($data);
    }
}
