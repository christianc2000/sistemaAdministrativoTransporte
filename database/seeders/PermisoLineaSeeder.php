<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisoLineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['activo' => 1,
            'id_linea' => 1,
            'id_duenio' => 3],
            ['activo' => 1,
            'id_linea' => 3,
            'id_duenio' => 6],
            ['activo' => 1,
            'id_linea' => 4,
            'id_duenio' => 7],
            ['activo' => 1,
            'id_linea' => 5,
            'id_duenio' => 10],
            ['activo' => 1,
            'id_linea' => 6,
            'id_duenio' => 1],
            ['activo' => 1,
            'id_linea' => 7,
            'id_duenio' => 8],
            ['activo' => 1,
            'id_linea' => 8,
            'id_duenio' => 9],
            ['activo' => 1,
            'id_linea' => 8,
            'id_duenio' => 2],
            ['activo' => 1,
            'id_linea' => 9,
            'id_duenio' => 4],
            ['activo' => 1,
            'id_linea' => 10,
            'id_duenio' => 5]
          ];
          DB::table('permiso_lineas')->insert($data);
    }
}
