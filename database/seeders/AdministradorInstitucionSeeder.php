<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorInstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id_institucion' => 1],
            ['id_institucion' => 3],
            ['id_institucion' => 2]
          ];
          DB::table('administrador_institucions')->insert($data);
    }
}
