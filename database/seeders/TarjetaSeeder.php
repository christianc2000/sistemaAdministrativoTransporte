<?php

namespace Database\Seeders;

use App\Models\Tarjeta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
            [],
          ];
         foreach ($data as $d) {
            Tarjeta::create($d);
         }
    }
}
