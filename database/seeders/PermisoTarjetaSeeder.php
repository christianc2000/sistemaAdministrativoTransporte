<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PermisoTarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['fecha' => '2022/07/06',
            'nro_interno' => 18,
            'id_chofer' => 9,
            'id_tarjeta' => 1],
            ['fecha' => '2022/07/06',
            'nro_interno' => 12,
            'id_chofer' => 1,
            'id_tarjeta' => 2],
            ['fecha' => '2022/07/06',
            'nro_interno' => 11,
            'id_chofer' => 3,
            'id_tarjeta' => 3],
            ['fecha' => '2022/07/06',
            'nro_interno' => 22,
            'id_chofer' => 7,
            'id_tarjeta' => 4],
            ['fecha' => '2022/07/06',
            'nro_interno' => 30,
            'id_chofer' => 6,
            'id_tarjeta' => 5],
            ['fecha' => '2022/07/06',
            'nro_interno' => 6,
            'id_chofer' => 4,
            'id_tarjeta' => 6],
            ['fecha' => '2022/07/06',
            'nro_interno' => 10,
            'id_chofer' => 10,
            'id_tarjeta' => 7],
            ['fecha' => '2022/07/07',
            'nro_interno' => 15,
            'id_chofer' => 2,
            'id_tarjeta' => 8],
            ['fecha' => '2022/07/07',
            'nro_interno' => 9,
            'id_chofer' => 8,
            'id_tarjeta' => 9],
            ['fecha' => '2022/07/07',
            'nro_interno' => 4,
            'id_chofer' => 5,
            'id_tarjeta' => 10],
            ['fecha' => '2022/07/07',
            'nro_interno' => 12,
            'id_chofer' => 1,
            'id_tarjeta' => 11],
            ['fecha' => '2022/07/07',
            'nro_interno' => 11,
            'id_chofer' => 3,
            'id_tarjeta' => 12],
            ['fecha' => '2022/07/07',
            'nro_interno' => 30,
            'id_chofer' => 6,
            'id_tarjeta' => 13],
            ['fecha' => '2022/07/07',
            'nro_interno' => 10,
            'id_chofer' => 10,
            'id_tarjeta' => 14],
            ['fecha' => '2022/07/07',
            'nro_interno' => 18,
            'id_chofer' => 9,
            'id_tarjeta' => 15]
          ];
          DB::table('permiso_tarjetas')->insert($data);
    }
}
