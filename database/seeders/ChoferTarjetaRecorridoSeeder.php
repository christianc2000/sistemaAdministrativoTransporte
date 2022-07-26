<?php

namespace Database\Seeders;

use App\Models\ChoferTarjetaRecorrido;
use Illuminate\Database\Seeder;

class ChoferTarjetaRecorridoSeeder extends Seeder
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
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 1,
                'recorrido_tarjeta_id' => 1, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 1,
                'recorrido_tarjeta_id' => 4, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 2,
                'recorrido_tarjeta_id' => 2, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 2,
                'recorrido_tarjeta_id' => 5, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 3,
                'recorrido_tarjeta_id' => 3, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 3,
                'recorrido_tarjeta_id' => 10, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 4,
                'recorrido_tarjeta_id' => 6, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 4,
                'recorrido_tarjeta_id' => 14, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 5,
                'recorrido_tarjeta_id' => 7, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 5,
                'recorrido_tarjeta_id' => 15, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 6,
                'recorrido_tarjeta_id' => 8, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 6,
                'recorrido_tarjeta_id' => 16, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 7,
                'recorrido_tarjeta_id' => 9, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 7,
                'recorrido_tarjeta_id' => 17, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 8,
                'recorrido_tarjeta_id' => 2, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 8,
                'recorrido_tarjeta_id' => 5, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 9,
                'recorrido_tarjeta_id' => 12, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 9,
                'recorrido_tarjeta_id' => 19, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 10,
                'recorrido_tarjeta_id' => 13, 
            ],
            [
                'hora_finalizado' => '00:45:00',
                'chofer_tarjeta_id' => 10,
                'recorrido_tarjeta_id' => 19, 
            ],
        ];
        foreach ($data as $d) {
            ChoferTarjetaRecorrido::create($d);
        }
    }
}
