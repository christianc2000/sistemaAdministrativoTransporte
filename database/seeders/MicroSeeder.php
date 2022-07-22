<?php

namespace Database\Seeders;

use App\Models\Micro;
use App\Models\Micros;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MicroSeeder extends Seeder
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
                'nro_interno' => 15,
                'placa' => 'QWS125',
                'modelo' => 'Toyota 2018',
                'cant_asiento' => 20,
                'fecha_asignacion' => '2022/05/01',
                'permiso_linea_id' => 1
            ],
            [
                'nro_interno' => 30,
                'placa' => '123QZX',
                'modelo' => 'Coaster',
                'cant_asiento' => 22,
                'fecha_asignacion' => '2022/05/04',
                'permiso_linea_id' => 2
            ],
            [
                'nro_interno' => 06,
                'placa' => 'WXS456',
                'modelo' => 'Toyota 2016',
                'cant_asiento' => 20,
                'fecha_asignacion' => '2022/05/02',
                'permiso_linea_id' => 3
            ],
            [
                'nro_interno' => 10,
                'placa' => 'GFS154',
                'modelo' => 'Toyota 2018',
                'cant_asiento' => 20,
                'fecha_asignacion' => '2022/04/01',
                'fecha_baja' => '2022/05/01',
                'permiso_linea_id' => 3
            ],
            [
                'nro_interno' => 12,
                'placa' => 'TRS450',
                'modelo' => 'Toyota 2020',
                'cant_asiento' => 25,
                'fecha_asignacion' => '2022/03/03',
                'fecha_baja' => '2022/05/02',
                'permiso_linea_id' => 4
            ],
            [
                'nro_interno' => 18,
                'placa' => '664GHT',
                'modelo' => 'Toyota',
                'cant_asiento' => 22,
                'fecha_asignacion' => '2022/05/02',
                'permiso_linea_id' => 4
            ],
           /* [
                'nro_interno' => 22,
                'placa' => '632-QWS',
                'modelo' => 'Toyota 2018',
                'cant_asiento' => 20,
                'fecha_asignacion' => '2022/05/01',
                'permiso_linea_id' => 7
            ],
            [
                'nro_interno' => 4,
                'placa' => 'LSN216',
                'modelo' => 'Toyota',
                'cant_asiento' => 20,
                'fecha_asignacion' => '2022/05/05',
                'permiso_linea_id' => 8
            ],
            [
                'nro_interno' => 9,
                'placa' => '5613hj',
                'modelo' => 'Toyota Coaster',
                'cant_asiento' => 18,
                'fecha_asignacion' => '2022/05/06',
                'permiso_linea_id' => 9
            ],
            [
                'nro_interno' => 11,
                'placa' => 'dsg513',
                'modelo' => 'Toyota Coaster',
                'cant_asiento' => 20,
                'fecha_asignacion' => '2022/05/01',
                'permiso_linea_id' => 10
            ]*/
        ];
        foreach ($data as $d) {
            Micro::create($d);
        }
        // DB::table('micros')->insert($data);

    }
}
