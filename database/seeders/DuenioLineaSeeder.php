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
      [
        'aporte' => 1530,
        'fecha' => '2022/05/03',
        'aporte_pagado'=>1530,
        'duenio_id' => 1,
        'linea_id' => 6
      ],
      [
        'aporte' => 1650,
        'fecha' => '2022/06/05',
        'aporte_pagado' => 1650,
        'duenio_id' => 1,
        'linea_id' => 6
      ],
      [
        'aporte' => 1180,
        'fecha' => '2022/06/30',
        'aporte_pagado' => 1180,
        'duenio_id' => 3,
        'linea_id' => 1
      ],
      [
        'aporte' => 1830,
        'fecha' => '2022/05/05',
        'aporte_pagado' => 1830,
        'duenio_id' => 4,
        'linea_id' => 9
      ],
      [
        'aporte' => 1700,
        'fecha' => '2022/05/04',
        'aporte_pagado' => 1700,
        'duenio_id' => 5,
        'linea_id' => 10
      ],
      [
        'aporte' => 1780,
        'fecha' => '2022/06/03',
        'aporte_pagado' => 1780,
        'duenio_id' => 4,
        'linea_id' => 9
      ],
      [
        'aporte' => 1500,
        'fecha' => '2022/06/07',
        'aporte_pagado' => 1500,
        'duenio_id' => 2,
        'linea_id' => 8
      ],
      [
        'aporte' => 1620,
        'fecha' => '2022/06/06',
        'aporte_pagado' => 1620,
        'duenio_id' => 9,
        'linea_id' => 8
      ],
      [
        'aporte' => 1550,
        'fecha' => '2022/07/03',
        'aporte_pagado' => 1550,
        'duenio_id' => 2,
        'linea_id' => 8
      ],
      [
        'aporte' => 1475,
        'fecha' => '2022/06/15',
        'aporte_pagado' => 1475,
        'duenio_id' => 7,
        'linea_id' => 4
      ],
      [
        'aporte' => 1300,
        'fecha' => '2022/06/01',
        'aporte_pagado' => 1300,
        'duenio_id' => 6,
        'linea_id' => 3
      ],
      [
        'aporte' => 1330,
        'fecha' => '2022/06/07',
        'aporte_pagado' => 1330,
        'duenio_id' => 8,
        'linea_id' => 7
      ],
      [
        'aporte' => 1200,
        'fecha' => '2022/07/02',
        'aporte_pagado' => 1200,
        'duenio_id' => 3,
        'linea_id' => 1
      ],
      [
        'aporte' => 1365,
        'fecha' => '2022/07/05',
        'aporte_pagado' => 1365,
        'duenio_id' => 1,
        'linea_id' => 6
      ],
      [
        'aporte' => 1770,
        'fecha' => '2022/06/02',
        'aporte_pagado' => 1770,
        'duenio_id' => 5,
        'linea_id' => 10
      ],
      [
        'aporte' => 1700,
        'fecha' => '2022/07/06',
        'aporte_pagado' => 1700,
        'duenio_id' => 5,
        'linea_id' => 10
      ],
      [
        'aporte' => 1570,
        'fecha' => '2022/07/07',
        'aporte_pagado' => 1570,
        'duenio_id' => 10,
        'linea_id' => 5
      ]
    ];
    foreach ($data as $d) {
      DuenioLinea::create($d);
    }
    //DB::table('duenio_lineas')->insert($data);
  }
}
