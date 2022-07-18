<?php

namespace Database\Seeders;

use App\Models\Linea;
use Illuminate\Database\Seeder;

class LineaSeeder extends Seeder
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
                'institucion_id' => 1,
                'administrador_institucion_id' => 1,
                'foto' => 'lineas/linea1.png',
            ],
            [
                'nrolinea' => 2,
                'telefono' => 33514865,
                'sede' => 'Av. Mariscal Santa Cruz paralela a la Calle 3 de Mayo',
                'institucion_id' => 3,
                'administrador_institucion_id' => 2,
                'foto' => 'lineas/linea2.png',
            ],
            [
                'nrolinea' => 5,
                'telefono' => 33105478,
                'sede' => 'Paralela a la Av. Radial 17 1/2 ',
                'institucion_id' => 2,
                'administrador_institucion_id' => 3,
                'foto' => 'lineas/linea5.png',
            ],
            [
                'nrolinea' => 8,
                'telefono' => 74100121,
                'sede' => '8vo Anillo Av. G77',
                'institucion_id' => 3,
                'administrador_institucion_id' => 2,
                'foto' => 'lineas/linea8.png',
            ],
            [
                'nrolinea' => 9,
                'telefono' => 71316500,
                'sede' => '4to Anillo sobre la Av. Busch y Calle 5',
                'institucion_id' => 3,
                'administrador_institucion_id' => 2,
                'foto' => 'lineas/linea9.png',
            ],
            [
                'nrolinea' => 10,
                'telefono' => 33605654,
                'sede' => 'Paralela a la Av. Radial 10 Calle Tristan Roca',
                'institucion_id' => 2,
                'administrador_institucion_id' => 3,
                'foto' => 'lineas/linea10.png',
            ],
            [
                'nrolinea' => 11,
                'telefono' => 3154510,
                'sede' => 'Plan 3000 Avenida Arroyito',
                'institucion_id' => 1,
                'administrador_institucion_id' => 1,
                'foto' => 'lineas/linea11.png',
            ],
            [
                'nrolinea' => 16,
                'telefono' => 33054120,
                'sede' => '5to Anillo Av. Radial 13 Calle Ameutaunao',
                'institucion_id' => 2,
                'administrador_institucion_id' => 3,
                'foto' => 'lineas/linea16.png',
            ],
            [
                'nrolinea' => 17,
                'telefono' => 3312556,
                'sede' => 'Avenida Viedma y Teniente Walter Vega',
                'institucion_id' => 2,
                'administrador_institucion_id' => 3,
                'foto' => 'lineas/linea17.png',
            ],
            [
                'nrolinea' => 18,
                'telefono' => 3312556,
                'sede' => 'Avenida Viedma y Teniente Walter Vega',
                'institucion_id' => 2,
                'administrador_institucion_id' => 3,
                'foto' => 'lineas/linea18.png',
            ]
        ];
        foreach ($data as $d) {
            Linea::create($d);
        }
    }
}
