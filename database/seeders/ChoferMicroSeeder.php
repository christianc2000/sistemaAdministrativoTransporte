<?php

namespace Database\Seeders;

use App\Models\ChoferMicro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoferMicroSeeder extends Seeder
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
        'fecha_asig' => '2022/05/01',
        //'fecha_baja' => '2022/06/10',
        'chofer_id' => 1,
        'micro_id' => 1
      ],
      [
        'fecha_asig' => '2022/07/01',
        'chofer_id' => 2,
        'micro_id' => 2
      ],
      [
        'fecha_asig' => '2022/05/04',
        'chofer_id' => 3,
        'micro_id' => 3
      ],
      [
        'fecha_asig' => '2022/03/02',
        'fecha_baja' => '2022/05/02',
        'chofer_id' => 4,
        'micro_id' => 4
      ],
      [
        'fecha_asig' => '2022/05/03',
        'chofer_id' => 4,
        'micro_id' => 5
      ],
      [
        'fecha_asig' => '2022/03/03',
        'fecha_baja' => '2022/05/02',
        'chofer_id' => 3,
        'micro_id' => 6
      ],
      /*[
        'fecha_asig' => '2022/05/02',
        'chofer_id' => 7,
        'micro_id' => 7
      ],
      [
        'fecha_asig' => '2022/05/01',
        'chofer_id' => 8,
        'micro_id' => 9
      ],
      [
        'fecha_asig' => '2022/05/05',
        'chofer_id' => 5,
        'micro_id' => 8
      ],
      [
        'fecha_asig' => '2022/05/06',
        'chofer_id' => 9,
        'micro_id' => 6
      ],
      [
        'fecha_asig' => '2022/05/01',
        'chofer_id' => 10,
        'micro_id' => 4
      ]*/
    ];
    foreach ($data as $d) {
      ChoferMicro::create($d);
    }
    // DB::table('chofer_micros')->insert($data);
  }
}
