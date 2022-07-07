<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecorridoTarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 06:30',
            'hora_llegada' => '2022/07/07 07:45',
            'id_tarjeta' => 1],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 06:45',
            'hora_llegada' => '2022/07/07 07:55',
            'id_tarjeta' => 2],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 07:30',
            'hora_llegada' => '2022/07/07 08:45',
            'id_tarjeta' => 3],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 07:50',
            'hora_llegada' => '2022/07/07 09:15',
            'id_tarjeta' => 1],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 08:10',
            'hora_llegada' => '2022/07/07 09:50',
            'id_tarjeta' => 2],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 07:40',
            'hora_llegada' => '2022/07/07 08:55',
            'id_tarjeta' => 4],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 07:45',
            'hora_llegada' => '2022/07/07 09:05',
            'id_tarjeta' => 5],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 07:50',
            'hora_llegada' => '2022/07/07 08:45',
            'id_tarjeta' => 6],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 08:00',
            'hora_llegada' => '2022/07/07 09:35',
            'id_tarjeta' => 7],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 09:05',
            'hora_llegada' => '2022/07/07 10:30',
            'id_tarjeta' => 3],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 08:10',
            'hora_llegada' => '2022/07/07 09:45',
            'id_tarjeta' => 8],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 08:15',
            'hora_llegada' => '2022/07/07 09:35',
            'id_tarjeta' => 9],
            ['nro_recorrido' => 1,
            'hora_partida' => '2022/07/07 08:20',
            'hora_llegada' => '2022/07/07 09:55',
            'id_tarjeta' => 10],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 09:00',
            'hora_llegada' => '2022/07/07 10:30',
            'id_tarjeta' => 4],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 09:10',
            'hora_llegada' => '2022/07/07 10:50',
            'id_tarjeta' => 5],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 08:55',
            'hora_llegada' => '2022/07/07 10:15',
            'id_tarjeta' => 6],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 09:50',
            'hora_llegada' => '2022/07/07 11:00',
            'id_tarjeta' => 7],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 10:00',
            'hora_llegada' => '2022/07/07 11:25',
            'id_tarjeta' => 8],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 09:50',
            'hora_llegada' => '2022/07/07 11:00',
            'id_tarjeta' => 9],
            ['nro_recorrido' => 2,
            'hora_partida' => '2022/07/07 10:05',
            'hora_llegada' => '2022/07/07 11:40',
            'id_tarjeta' => 10]
          ];
          DB::table('recorrido_tarjetas')->insert($data);
  
    }
}
