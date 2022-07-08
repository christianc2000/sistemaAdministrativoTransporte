<?php

namespace Database\Seeders;

use App\Models\DuenioLinea;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuenioLineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['aporte' => 1530,
            'fecha' => '2022/05/03',
            'id_duenio' => 1,
            'id_linea' => 6],
            ['aporte' => 1650,
            'fecha' => '2022/06/05',
            'id_duenio' => 1,
            'id_linea' => 6],
            ['aporte' => 1180,
            'fecha' => '2022/06/30',
            'id_duenio' => 3,
            'id_linea' => 1],
            ['aporte' => 1830,
            'fecha' => '2022/05/05',
            'id_duenio' => 4,
            'id_linea' => 9],
            ['aporte' => 1700,
            'fecha' => '2022/05/04',
            'id_duenio' => 5,
            'id_linea' => 10],
            ['aporte' => 1780,
            'fecha' => '2022/06/03',
            'id_duenio' => 4,
            'id_linea' => 9],
            ['aporte' => 1500,
            'fecha' => '2022/06/07',
            'id_duenio' => 2,
            'id_linea' => 8],
            ['aporte' => 1620,
            'fecha' => '2022/06/06',
            'id_duenio' => 9,
            'id_linea' => 8],
            ['aporte' => 1550,
            'fecha' => '2022/07/03',
            'id_duenio' => 2,
            'id_linea' => 8],
            ['aporte' => 1475,
            'fecha' => '2022/06/15',
            'id_duenio' => 7,
            'id_linea' => 4],
            ['aporte' => 1300,
            'fecha' => '2022/06/01',
            'id_duenio' => 6,
            'id_linea' => 3],
            ['aporte' => 1330,
            'fecha' => '2022/06/07',
            'id_duenio' => 8,
            'id_linea' => 7],
            ['aporte' => 1200,
            'fecha' => '2022/07/02',
            'id_duenio' => 3,
            'id_linea' => 1],
            ['aporte' => 1365,
            'fecha' => '2022/07/05',
            'id_duenio' => 1,
            'id_linea' => 6],
            ['aporte' => 1770,
            'fecha' => '2022/06/02',
            'id_duenio' => 5,
            'id_linea' => 10],
            ['aporte' => 1700,
            'fecha' => '2022/07/06',
            'id_duenio' => 5,
            'id_linea' => 10],
            ['aporte' => 1570,
            'fecha' => '2022/07/07',
            'id_duenio' => 10,
            'id_linea' => 5]
          ];
          foreach ($data as $d) {
            DuenioLinea::create($d);
          }
          //DB::table('duenio_lineas')->insert($data);
    }
}
