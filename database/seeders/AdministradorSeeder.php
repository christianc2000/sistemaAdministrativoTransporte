<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          // [ 'id' => 1],
          // [ 'id' => 2],
          // [ 'id' => 3]
          [],
          [],
          []
        ];
        DB::table('administradors')->insert($data);

    }
}
