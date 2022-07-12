<?php

namespace Database\Seeders;

use App\Models\Requisitos;
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
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 1
      ],
      [
        'nombre' => 'carnet de identidad',
        'linea_id' => 1
      ],
      [
        'nombre' => 'factura luz',
        'linea_id' => 1
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 1
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 2
      ],
      [
        'nombre' => 'carnet de identidad',
        'linea_id' => 2
      ],
      [
        'nombre' => 'factura luz',
        'linea_id' => 2
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 2
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 3
      ],
      [
        'nombre' => 'factura luz o agua',
        'linea_id' => 3
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 3
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 4
      ],
      [
        'nombre' => 'factura luz o agua',
        'linea_id' => 4
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 4
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 5
      ],
      [
        'nombre' => 'factura luz o agua',
        'linea_id' => 5
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 5
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 6
      ],
      [
        'nombre' => 'carnet de identidad',
        'linea_id' => 6
      ],
      [
        'nombre' => 'factura luz',
        'linea_id' => 6
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 6
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 7
      ],
      [
        'nombre' => 'carnet de identidad',
        'linea_id' => 7
      ],
      [
        'nombre' => 'factura luz',
        'linea_id' => 7
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 7
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 8
      ],
      [
        'nombre' => 'carnet de identidad',
        'linea_id' => 8
      ],
      [
        'nombre' => 'factura luz',
        'linea_id' => 8
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 8
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 9
      ],
      [
        'nombre' => 'carnet de identidad',
        'linea_id' => 9
      ],
      [
        'nombre' => 'factura luz',
        'linea_id' => 9
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 9
      ],
      [
        'nombre' => 'licencia de conducir',
        'linea_id' => 10
      ],
      [
        'nombre' => 'carnet de identidad',
        'linea_id' => 10
      ],
      [
        'nombre' => 'factura luz',
        'linea_id' => 10
      ],
      [
        'nombre' => 'garantia',
        'linea_id' => 10
      ],
    ];
    foreach ($data as $d) {
      Requisitos::create($d);
    }
    //DB::table('requisitos')->insert($data);
  }
}
