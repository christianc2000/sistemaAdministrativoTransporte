<?php

namespace Database\Seeders;

use App\Models\Lineas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineasSeeder extends Seeder
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
                'nrolinea' => 1,
                'telefono' => 3301545,
                'sede' => 'Av. Los Tajibos Calle Los Ceibos',
                'id_institucion' => 1,
                'id_admin_institucion' => 1,
                'foto' => 'lineas/linea1.png',
            ],
            [
                'nrolinea' => 2,
                'telefono' => 33514865,
                'sede' => 'Av. Mariscal Santa Cruz paralela a la Calle 3 de Mayo',
                'id_institucion' => 3,
                'id_admin_institucion' => 2,
                'foto' => 'lineas/linea2.png',
            ],
            [
                'nrolinea' => 5,
                'telefono' => 33105478,
                'sede' => 'Paralela a la Av. Radial 17 1/2 ',
                'id_institucion' => 2,
                'id_admin_institucion' => 3,
                'foto' => 'lineas/linea5.png',
            ],
            [
                'nrolinea' => 8,
                'telefono' => 74100121,
                'sede' => '8vo Anillo Av. G77',
                'id_institucion' => 3,
                'id_admin_institucion' => 2,
                'foto' => 'lineas/linea8.png',
            ],
            [
                'nrolinea' => 9,
                'telefono' => 71316500,
                'sede' => '4to Anillo sobre la Av. Busch y Calle 5',
                'id_institucion' => 3,
                'id_admin_institucion' => 2,
                'foto' => 'lineas/linea9.png',
            ],
            [
                'nrolinea' => 10,
                'telefono' => 33605654,
                'sede' => 'Paralela a la Av. Radial 10 Calle Tristan Roca',
                'id_institucion' => 2,
                'id_admin_institucion' => 3,
                'foto' => 'lineas/linea10.png',
            ],
            [
                'nrolinea' => 11,
                'telefono' => 3154510,
                'sede' => 'Plan 3000 Avenida Arroyito',
                'id_institucion' => 1,
                'id_admin_institucion' => 1,
                'foto' => 'lineas/linea11.png',
            ],
            [
                'nrolinea' => 16,
                'telefono' => 33054120,
                'sede' => '5to Anillo Av. Radial 13 Calle Ameutaunao',
                'id_institucion' => 2,
                'id_admin_institucion' => 3,
                'foto' => 'lineas/linea16.png',
            ],
            [
                'nrolinea' => 17,
                'telefono' => 3312556,
                'sede' => 'Avenida Viedma y Teniente Walter Vega',
                'id_institucion' => 2,
                'id_admin_institucion' => 3,
                'foto' => 'lineas/linea17.png',
            ],
            [
                'nrolinea' => 18,
                'telefono' => 3312556,
                'sede' => 'Avenida Viedma y Teniente Walter Vega',
                'id_institucion' => 2,
                'id_admin_institucion' => 3,
                'foto' => 'lineas/linea18.png',
            ]
        ];
        foreach ($data as $d) {
            Lineas::create($d);
        }
        //DB::table('lineas')->insert($data);
    }
}
