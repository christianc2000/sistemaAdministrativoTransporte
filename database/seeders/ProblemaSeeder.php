<?php

namespace Database\Seeders;

use App\Models\Problema;
use Illuminate\Database\Seeder;

class ProblemaSeeder extends Seeder
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
                'descripcion' => 'Fallo en el motor',
                'chofer_micro_id' => 1
            ],
            [
                'descripcion' => 'Fallo en la llanata, se pinchó',
                'chofer_micro_id' => 2
            ],
            [
                'descripcion' => 'Choque en la parte frontal, necesito ayuda para trasladar a los pasajeros',
                'chofer_micro_id' => 3
            ]
        ];
        foreach ($data as $d) {
            Problema::create($d);
        }
    }
}
