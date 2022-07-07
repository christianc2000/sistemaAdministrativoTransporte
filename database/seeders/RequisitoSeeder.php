<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'licencia de conducir',
            'id_linea' => 1],
            ['nombre' => 'carnet de identidad',
            'id_linea' => 1],
            ['nombre' => 'factura luz',
            'id_linea' => 1],
            ['nombre' => 'garantia',
            'id_linea' => 1],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 2],
            ['nombre' => 'carnet de identidad',
            'id_linea' => 2],
            ['nombre' => 'factura luz',
            'id_linea' => 2],
            ['nombre' => 'garantia',
            'id_linea' => 2],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 3],
            ['nombre' => 'factura luz o agua',
            'id_linea' => 3],
            ['nombre' => 'garantia',
            'id_linea' => 3],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 4],
            ['nombre' => 'factura luz o agua',
            'id_linea' => 4],
            ['nombre' => 'garantia',
            'id_linea' => 4],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 5],
            ['nombre' => 'factura luz o agua',
            'id_linea' => 5],
            ['nombre' => 'garantia',
            'id_linea' => 5],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 6],
            ['nombre' => 'carnet de identidad',
            'id_linea' => 6],
            ['nombre' => 'factura luz',
            'id_linea' => 6],
            ['nombre' => 'garantia',
            'id_linea' => 6],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 7],
            ['nombre' => 'carnet de identidad',
            'id_linea' => 7],
            ['nombre' => 'factura luz',
            'id_linea' => 7],
            ['nombre' => 'garantia',
            'id_linea' => 7],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 8],
            ['nombre' => 'carnet de identidad',
            'id_linea' => 8],
            ['nombre' => 'factura luz',
            'id_linea' => 8],
            ['nombre' => 'garantia',
            'id_linea' => 8],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 9],
            ['nombre' => 'carnet de identidad',
            'id_linea' => 9],
            ['nombre' => 'factura luz',
            'id_linea' => 9],
            ['nombre' => 'garantia',
            'id_linea' => 9],
            ['nombre' => 'licencia de conducir',
            'id_linea' => 10],
            ['nombre' => 'carnet de identidad',
            'id_linea' => 10],
            ['nombre' => 'factura luz',
            'id_linea' => 10],
            ['nombre' => 'garantia',
            'id_linea' => 10],

            
          ];
          DB::table('requisitos')->insert($data);
    }
}
