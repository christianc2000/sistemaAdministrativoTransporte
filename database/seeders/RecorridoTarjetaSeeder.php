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
      //TARJETA 1
      //tipo recorrido => false:si es de ida, true: si es de vuelta
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => "05:00:00",
        'hora_llegada' => "06:15:00",
        'tarjeta_id' => 1,
        'tipo_recorrido' => false
      ],

      [
        'nro_recorrido' => 3,
        'hora_partida' => '08:15:00',
        'hora_llegada' => '09:30:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => false,
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '11:30:00',
        'hora_llegada' => '12:45:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => false,
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '14:45:00',
        'hora_llegada' => '16:00:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '18:00:00',
        'hora_llegada' => '19:15:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '06:25:00',
        'hora_llegada' => '07:45:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '09:40:00',
        'hora_llegada' => '11:00:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '12:55:00',
        'hora_llegada' => '14:15:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '16:10:00',
        'hora_llegada' => '17:30:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '19:25:00',
        'hora_llegada' => '20:45:00',
        'tarjeta_id' => 1,
        'tipo_recorrido' => true
      ],
      //TARJETA 2
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '05:05:00',
        'hora_llegada' => '06:20:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '08:20:00',
        'hora_llegada' => '09:35:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '11:35:00',
        'hora_llegada' => '12:50:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '14:50:00',
        'hora_llegada' => '16:05:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '18:05:00',
        'hora_llegada' => '19:20:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '06:30:00',
        'hora_llegada' => '07:50:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '09:45:00',
        'hora_llegada' => '11:05:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '13:00:00',
        'hora_llegada' => '14:20:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '16:15:00',
        'hora_llegada' => '17:35:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '19:30:00',
        'hora_llegada' => '20:50:00',
        'tarjeta_id' => 2,
        'tipo_recorrido' => true
      ],
      //TARJETA 3
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '05:15:00',
        'hora_llegada' => '06:30:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '08:30:00',
        'hora_llegada' => '09:45:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '11:45:00',
        'hora_llegada' => '13:00:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '15:00:00',
        'hora_llegada' => '16:15:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '18:15:00',
        'hora_llegada' => '19:30:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '06:40:00',
        'hora_llegada' => '08:00:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '09:55:00',
        'hora_llegada' => '11:15:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '13:10:00',
        'hora_llegada' => '14:30:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '16:25:00',
        'hora_llegada' => '17:45:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '19:40:00',
        'hora_llegada' => '21:00:00',
        'tarjeta_id' => 3,
        'tipo_recorrido' => true
      ],
      //TARJETA 4
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '05:25:00',
        'hora_llegada' => '06:40:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '08:40:00',
        'hora_llegada' => '09:55:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '11:55:00',
        'hora_llegada' => '13:10:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '15:10:00',
        'hora_llegada' => '16:25:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '18:25:00',
        'hora_llegada' => '19:40:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '06:50:00',
        'hora_llegada' => '08:10:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '10:05:00',
        'hora_llegada' => '11:25:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '13:20:00',
        'hora_llegada' => '14:40:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '16:35:00',
        'hora_llegada' => '17:55:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '19:50:00',
        'hora_llegada' => '21:10:00',
        'tarjeta_id' => 4,
        'tipo_recorrido' => true
      ],
      //TARJETA 5
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '05:35:00',
        'hora_llegada' => '06:50:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '08:50:00',
        'hora_llegada' => '10:05:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '12:05:00',
        'hora_llegada' => '13:20:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '15:20:00',
        'hora_llegada' => '16:35:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '18:35:00',
        'hora_llegada' => '19:50:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '07:00:00',
        'hora_llegada' => '08:20:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '10:15:00',
        'hora_llegada' => '11:35:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '13:30:00',
        'hora_llegada' => '14:50:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '16:45:00',
        'hora_llegada' => '18:05:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '20:00:00',
        'hora_llegada' => '21:20:00',
        'tarjeta_id' => 5,
        'tipo_recorrido' => true
      ],
      //TARJETA 6
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '05:45:00',
        'hora_llegada' => '07:00:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '09:00:00',
        'hora_llegada' => '10:15:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '12:15:00',
        'hora_llegada' => '13:30:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '15:30:00',
        'hora_llegada' => '16:45:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '18:45:00',
        'hora_llegada' => '20:00:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '07:10:00',
        'hora_llegada' => '08:30:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '10:25:00',
        'hora_llegada' => '11:45:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '13:40:00',
        'hora_llegada' => '15:00:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '16:55:00',
        'hora_llegada' => '18:15:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '20:10:00',
        'hora_llegada' => '21:30:00',
        'tarjeta_id' => 6,
        'tipo_recorrido' => true
      ],
      //TARJETA 7
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '05:55:00',
        'hora_llegada' => '07:10:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '09:10:00',
        'hora_llegada' => '10:25:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '12:25:00',
        'hora_llegada' => '13:40:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '15:40:00',
        'hora_llegada' => '16:55:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '18:55:00',
        'hora_llegada' => '20:10:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '07:20:00',
        'hora_llegada' => '08:40:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '10:35:00',
        'hora_llegada' => '11:55:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '13:50:00',
        'hora_llegada' => '15:10:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '17:05:00',
        'hora_llegada' => '18:25:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '20:20:00',
        'hora_llegada' => '21:40:00',
        'tarjeta_id' => 7,
        'tipo_recorrido' => true
      ],
      //TARJETA 8
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '06:05:00',
        'hora_llegada' => '07:20:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '09:20:00',
        'hora_llegada' => '10:35:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '12:35:00',
        'hora_llegada' => '13:50:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '15:50:00',
        'hora_llegada' => '17:05:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '19:05:00',
        'hora_llegada' => '20:20:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '07:30:00',
        'hora_llegada' => '08:50:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '10:45:00',
        'hora_llegada' => '12:05:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '14:00:00',
        'hora_llegada' => '15:20:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '17:15:00',
        'hora_llegada' => '18:35:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '20:30:00',
        'hora_llegada' => '21:50:00',
        'tarjeta_id' => 8,
        'tipo_recorrido' => true
      ],
      //TARJETA 9
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '06:15:00',
        'hora_llegada' => '07:30:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '09:30:00',
        'hora_llegada' => '10:45:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '12:45:00',
        'hora_llegada' => '14:00:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '16:00:00',
        'hora_llegada' => '17:15:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '19:15:00',
        'hora_llegada' => '20:30:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '07:40:00',
        'hora_llegada' => '09:00:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '10:55:00',
        'hora_llegada' => '12:15:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '14:10:00',
        'hora_llegada' => '15:30:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '17:25:00',
        'hora_llegada' => '18:45:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '20:40:00',
        'hora_llegada' => '22:00:00',
        'tarjeta_id' => 9,
        'tipo_recorrido' => true
      ],
      //TARJETA 10
      //ida
      [
        'nro_recorrido' => 1,
        'hora_partida' => '06:25:00',
        'hora_llegada' => '07:40:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 3,
        'hora_partida' => '09:40:00',
        'hora_llegada' => '10:55:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 5,
        'hora_partida' => '12:55:00',
        'hora_llegada' => '14:10:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 7,
        'hora_partida' => '16:10:00',
        'hora_llegada' => '17:25:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => false
      ],
      [
        'nro_recorrido' => 9,
        'hora_partida' => '19:25:00',
        'hora_llegada' => '20:40:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => false
      ],
      //vuelta
      [
        'nro_recorrido' => 2,
        'hora_partida' => '07:50:00',
        'hora_llegada' => '09:10:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 4,
        'hora_partida' => '11:05:00',
        'hora_llegada' => '12:25:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 6,
        'hora_partida' => '14:20:00',
        'hora_llegada' => '15:40:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 8,
        'hora_partida' => '17:35:00',
        'hora_llegada' => '18:55:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => true
      ],
      [
        'nro_recorrido' => 10,
        'hora_partida' => '20:40:00',
        'hora_llegada' => '22:10:00',
        'tarjeta_id' => 10,
        'tipo_recorrido' => true
      ],
    ];
    /*  [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 06:30',
        'hora_llegada' => '2022/07/07 07:45',
        'tarjeta_id' => 1,
        'tipo_recorrido'=>false, //false=ida, true=vuelta
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 06:45',
        'hora_llegada' => '2022/07/07 07:55',
        'tarjeta_id' => 2,
        'tipo_recorrido'=>false,
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 07:30',
        'hora_llegada' => '2022/07/07 08:45',
        'tarjeta_id' => 3,
        'tipo_recorrido'=>false,
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 07:50',
        'hora_llegada' => '2022/07/07 09:15',
        'tarjeta_id' => 1,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 08:10',
        'hora_llegada' => '2022/07/07 09:50',
        'tarjeta_id' => 2,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 07:40',
        'hora_llegada' => '2022/07/07 08:55',
        'tarjeta_id' => 4,
        'tipo_recorrido'=>false
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 07:45',
        'hora_llegada' => '2022/07/07 09:05',
        'tarjeta_id' => 5,
        'tipo_recorrido'=>false
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 07:50',
        'hora_llegada' => '2022/07/07 08:45',
        'tarjeta_id' => 6,
        'tipo_recorrido'=>false
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 08:00',
        'hora_llegada' => '2022/07/07 09:35',
        'tarjeta_id' => 7,
        'tipo_recorrido'=>false
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:05',
        'hora_llegada' => '2022/07/07 10:30',
        'tarjeta_id' => 3,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 08:10',
        'hora_llegada' => '2022/07/07 09:45',
        'tarjeta_id' => 8,
        'tipo_recorrido'=>false
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 08:15',
        'hora_llegada' => '2022/07/07 09:35',
        'tarjeta_id' => 9,
        'tipo_recorrido'=>false
      ],
      [
        'nro_recorrido' => 1,
        'hora_partida' => '2022/07/07 08:20',
        'hora_llegada' => '2022/07/07 09:55',
        'tarjeta_id' => 10,
        'tipo_recorrido'=>false
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:00',
        'hora_llegada' => '2022/07/07 10:30',
        'tarjeta_id' => 4,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:10',
        'hora_llegada' => '2022/07/07 10:50',
        'tarjeta_id' => 5,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 08:55',
        'hora_llegada' => '2022/07/07 10:15',
        'tarjeta_id' => 6,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:50',
        'hora_llegada' => '2022/07/07 11:00',
        'tarjeta_id' => 7,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 10:00',
        'hora_llegada' => '2022/07/07 11:25',
        'tarjeta_id' => 8,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 09:50',
        'hora_llegada' => '2022/07/07 11:00',
        'tarjeta_id' => 9,
        'tipo_recorrido'=>true
      ],
      [
        'nro_recorrido' => 2,
        'hora_partida' => '2022/07/07 10:05',
        'hora_llegada' => '2022/07/07 11:40',
        'tarjeta_id' => 10,
        'tipo_recorrido'=>true
      ]
    ];*/
    foreach ($data as $d) {
      RecorridoTarjeta::create($d);
    }
    //DB::table('recorrido_tarjetas')->insert($data);

  }
}
