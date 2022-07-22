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
        'activo' => true,
        'linea_id' => 1,
        'duenio_id' => 1
      ],
      [
        'activo' => true,
        'linea_id' => 1,
        'duenio_id' => 1
      ],
      [
        'activo' => true,
        'linea_id' => 1,
        'duenio_id' => 2
      ],
      [
        'activo' => 1,
        'linea_id' => 1,
        'duenio_id' => 2
      ],
     /* [
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
      ]*/
    ];
    foreach ($data as $d) {
      PermisoLinea::create($d);
    }
    //DB::table('permiso_lineas')->insert($data);
  }
}
