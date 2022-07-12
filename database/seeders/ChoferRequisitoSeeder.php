<?php

namespace Database\Seeders;

use App\Models\ChoferRequisitos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoferRequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['presenta' => 1,
            'chofer_id' => 1,
            'requisito_id' => 18],
            
            ['presenta' => 1,
            'chofer_id' => 1,
            'requisito_id' => 19],

            ['presenta' => 1,
            'chofer_id' => 1,
            'requisito_id' => 20],

            ['presenta' => 1,
            'chofer_id' => 1,
            'requisito_id' => 21],

            ['presenta' => 1,
            'chofer_id' => 2,
            'requisito_id' => 1],

            ['presenta' => 1,
            'chofer_id' => 2,
            'requisito_id' => 2],

            ['presenta' => 1,
            'chofer_id' => 2,
            'requisito_id' => 3],

            ['presenta' => 1,
            'chofer_id' => 2,
            'requisito_id' => 4],

            ['presenta' => 1,
            'chofer_id' => 6,
            'requisito_id' => 9],

            ['presenta' => 1,
            'chofer_id' => 6,
            'requisito_id' => 10],

            ['presenta' => 1,
            'chofer_id' => 6,
            'requisito_id' => 11],

            ['presenta' => 1,
            'chofer_id' => 4,
            'requisito_id' => 12],

            ['presenta' => 1,
            'chofer_id' => 4,
            'requisito_id' => 13],

            ['presenta' => 1,
            'chofer_id' => 4,
            'requisito_id' => 14],

            ['presenta' => 1,
            'chofer_id' => 10,
            'requisito_id' => 15],

            ['presenta' => 1,
            'chofer_id' => 10,
            'requisito_id' => 16],

            ['presenta' => 1,
            'chofer_id' => 10,
            'requisito_id' => 17],

            ['presenta' => 1,
            'chofer_id' => 9,
            'requisito_id' => 22],

            ['presenta' => 1,
            'chofer_id' => 9,
            'requisito_id' => 23],

            ['presenta' => 1,
            'chofer_id' => 9,
            'requisito_id' => 24],


            ['presenta' => 0,
            'chofer_id' => 9,
            'requisito_id' => 25],

            ['presenta' => 1,
            'chofer_id' => 5,
            'requisito_id' => 26],

            ['presenta' => 1,
            'chofer_id' => 5,
            'requisito_id' => 27],

            ['presenta' => 1,
            'chofer_id' => 5,
            'requisito_id' => 28],

            ['presenta' => 1,
            'chofer_id' => 5,
            'requisito_id' => 29],

            ['presenta' => 1,
            'chofer_id' => 8,
            'requisito_id' => 30],

            ['presenta' => 1,
            'chofer_id' => 8,
            'requisito_id' => 31],

            ['presenta' => 1,
            'chofer_id' => 8,
            'requisito_id' => 32],

            ['presenta' => 0,
            'chofer_id' => 8,
            'requisito_id' => 33],

            ['presenta' => 1,
            'chofer_id' => 3,
            'requisito_id' => 34],

            ['presenta' => 1,
            'chofer_id' => 3,
            'requisito_id' => 35],

            ['presenta' => 1,
            'chofer_id' => 3,
            'requisito_id' => 36],

            ['presenta' => 1,
            'chofer_id' => 3,
            'requisito_id' => 37]
          ];
          foreach ($data as $d) {
              ChoferRequisitos::create($d);
          }
          //DB::table('chofer_requisitos')->insert($data);
    }
}
