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
            ['fecha_asig' => '2022/05/01',
            'id_chofer' => 1,
            'id_micro' => 5],
            ['fecha_asig' => '2022/05/04',
            'id_chofer' => 2,
            'id_micro' => 1],
            ['fecha_asig' => '2022/05/02',
            'id_chofer' => 3,
            'id_micro' => 10],
            ['fecha_asig' => '2022/05/01',
            'id_chofer' => 4,
            'id_micro' => 3],
            ['fecha_asig' => '2022/05/03',
            'id_chofer' => 6,
            'id_micro' => 2],
            ['fecha_asig' => '2022/05/02',
            'id_chofer' => 7,
            'id_micro' => 7],
            ['fecha_asig' => '2022/05/01',
            'id_chofer' => 8,
            'id_micro' => 9],
            ['fecha_asig' => '2022/05/05',
            'id_chofer' => 5,
            'id_micro' => 8],
            ['fecha_asig' => '2022/05/06',
            'id_chofer' => 9,
            'id_micro' => 6],
            ['fecha_asig' => '2022/05/01',
            'id_chofer' => 10,
            'id_micro' => 4] 
          ];
          foreach ($data as $d) {
            ChoferMicro::create($d);
          }
         // DB::table('chofer_micros')->insert($data);
    }
}
