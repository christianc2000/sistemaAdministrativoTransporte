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
            'id_chofer' => 1,
            'id_requisito' => 18],
            ['presenta' => 1,
            'id_chofer' => 1,
            'id_requisito' => 19],
            ['presenta' => 1,
            'id_chofer' => 1,
            'id_requisito' => 20],
            ['presenta' => 1,
            'id_chofer' => 1,
            'id_requisito' => 21],
            ['presenta' => 1,
            'id_chofer' => 2,
            'id_requisito' => 1],
            ['presenta' => 1,
            'id_chofer' => 2,
            'id_requisito' => 2],
            ['presenta' => 1,
            'id_chofer' => 2,
            'id_requisito' => 3],
            ['presenta' => 1,
            'id_chofer' => 2,
            'id_requisito' => 4],
            ['presenta' => 1,
            'id_chofer' => 6,
            'id_requisito' => 9],
            ['presenta' => 1,
            'id_chofer' => 6,
            'id_requisito' => 10],
            ['presenta' => 1,
            'id_chofer' => 6,
            'id_requisito' => 11],
            ['presenta' => 1,
            'id_chofer' => 4,
            'id_requisito' => 12],
            ['presenta' => 1,
            'id_chofer' => 4,
            'id_requisito' => 13],
            ['presenta' => 1,
            'id_chofer' => 4,
            'id_requisito' => 14],
            ['presenta' => 1,
            'id_chofer' => 10,
            'id_requisito' => 15],
            ['presenta' => 1,
            'id_chofer' => 10,
            'id_requisito' => 16],
            ['presenta' => 1,
            'id_chofer' => 10,
            'id_requisito' => 17],
            ['presenta' => 1,
            'id_chofer' => 9,
            'id_requisito' => 22],
            ['presenta' => 1,
            'id_chofer' => 9,
            'id_requisito' => 23],
            ['presenta' => 1,
            'id_chofer' => 9,
            'id_requisito' => 24],
            ['presenta' => 0,
            'id_chofer' => 9,
            'id_requisito' => 25],
            ['presenta' => 1,
            'id_chofer' => 5,
            'id_requisito' => 26],
            ['presenta' => 1,
            'id_chofer' => 5,
            'id_requisito' => 27],
            ['presenta' => 1,
            'id_chofer' => 5,
            'id_requisito' => 28],
            ['presenta' => 1,
            'id_chofer' => 5,
            'id_requisito' => 29],
            ['presenta' => 1,
            'id_chofer' => 8,
            'id_requisito' => 30],
            ['presenta' => 1,
            'id_chofer' => 8,
            'id_requisito' => 31],
            ['presenta' => 1,
            'id_chofer' => 8,
            'id_requisito' => 32],
            ['presenta' => 0,
            'id_chofer' => 8,
            'id_requisito' => 33],
            ['presenta' => 1,
            'id_chofer' => 3,
            'id_requisito' => 34],
            ['presenta' => 1,
            'id_chofer' => 3,
            'id_requisito' => 35],
            ['presenta' => 1,
            'id_chofer' => 3,
            'id_requisito' => 36],
            ['presenta' => 1,
            'id_chofer' => 3,
            'id_requisito' => 37]
          ];
          foreach ($data as $d) {
              ChoferRequisitos::create($d);
          }
          //DB::table('chofer_requisitos')->insert($data);
    }
}
