<?php

namespace Database\Seeders;

use App\Models\Lineas;
use Illuminate\Database\Seeder;

class LineasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lineas::create([
            'nrolinea'=>11,
            'telefono'=>64342392,
            'sede'=>'Avenida Radial 10, frente a pollos Sakura',
            'id_institucion'=>1,
            'id_admin_institucion'=>1,
        ]);
        Lineas::create([
            'nrolinea'=>10,
            'telefono'=>64342392,
            'sede'=>'Mercado Guapuru, plan 3000',
            'id_institucion'=>1,
            'id_admin_institucion'=>1,
        ]);
        Lineas::create([
            'nrolinea'=>9,
            'telefono'=>64388832,
            'sede'=>'Mercado la campana, al frente de farmacorp',
            'id_institucion'=>2,
            'id_admin_institucion'=>2,
        ]);
    }
}
