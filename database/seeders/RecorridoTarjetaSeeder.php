<?php

namespace Database\Seeders;

use App\Models\RecorridoTarjeta;
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
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 06:30',
        'hora_llegada' => '2022/07/07 07:45',
        'tarjeta_id' => 1
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 06:45',
        'hora_llegada' => '2022/07/07 07:55',
        'tarjeta_id' => 2
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 07:30',
        'hora_llegada' => '2022/07/07 08:45',
        'tarjeta_id' => 3
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 07:50',
        'hora_llegada' => '2022/07/07 09:15',
        'tarjeta_id' => 1
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 08:10',
        'hora_llegada' => '2022/07/07 09:50',
        'tarjeta_id' => 2
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 07:40',
        'hora_llegada' => '2022/07/07 08:55',
        'tarjeta_id' => 4
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 07:45',
        'hora_llegada' => '2022/07/07 09:05',
        'tarjeta_id' => 5
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 07:50',
        'hora_llegada' => '2022/07/07 08:45',
        'tarjeta_id' => 6
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 08:00',
        'hora_llegada' => '2022/07/07 09:35',
        'tarjeta_id' => 7
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:05',
        'hora_llegada' => '2022/07/07 10:30',
        'tarjeta_id' => 3
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 08:10',
        'hora_llegada' => '2022/07/07 09:45',
        'tarjeta_id' => 8
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 08:15',
        'hora_llegada' => '2022/07/07 09:35',
        'tarjeta_id' => 9
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 08:20',
        'hora_llegada' => '2022/07/07 09:55',
        'tarjeta_id' => 10
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:00',
        'hora_llegada' => '2022/07/07 10:30',
        'tarjeta_id' => 4
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:10',
        'hora_llegada' => '2022/07/07 10:50',
        'tarjeta_id' => 5
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 08:55',
        'hora_llegada' => '2022/07/07 10:15',
        'tarjeta_id' => 6
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:50',
        'hora_llegada' => '2022/07/07 11:00',
        'tarjeta_id' => 7
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 10:00',
        'hora_llegada' => '2022/07/07 11:25',
        'tarjeta_id' => 8
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:50',
        'hora_llegada' => '2022/07/07 11:00',
        'tarjeta_id' => 9
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 10:05',
        'hora_llegada' => '2022/07/07 11:40',
        'tarjeta_id' => 10
      ]
    ];
    foreach ($data as $d) {
      RecorridoTarjeta::create($d);
    }
    //DB::table('recorrido_tarjetas')->insert($data);

  }
}
