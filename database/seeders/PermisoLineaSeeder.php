<?php

namespace Database\Seeders;

use App\Models\PermisoLinea;
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
      [
        'activo' => 1,
        'linea_id' => 1,
        'duenio_id' => 3
      ],
      [
        'activo' => 1,
        'linea_id' => 3,
        'duenio_id' => 6
      ],
      [
        'activo' => 1,
        'linea_id' => 4,
        'duenio_id' => 7
      ],
      [
        'activo' => 1,
        'linea_id' => 5,
        'duenio_id' => 10
      ],
      [
        'activo' => true,
        'linea_id' => 6,
        'duenio_id' => 1
      ],
      [
        'activo' => 1,
        'linea_id' => 7,
        'duenio_id' => 8
      ],
      [
        'activo' => 1,
        'linea_id' => 8,
        'duenio_id' => 9
      ],
      [
        'activo' => 1,
        'linea_id' => 8,
        'duenio_id' => 2
      ],
      [
        'activo' => 1,
        'linea_id' => 9,
        'duenio_id' => 4
      ],
      [
        'activo' => 1,
        'linea_id' => 10,
        'duenio_id' => 5
      ],
      [
        'activo' => 0,
        'linea_id' => 2,
        'duenio_id' => 11
      ],
      [
        'activo' => 1,
        'linea_id' => 11,
        'duenio_id' => 12
      ]
    ];
    foreach ($data as $d) {
      PermisoLinea::create($d);
    }
    //DB::table('permiso_lineas')->insert($data);
  }
}
