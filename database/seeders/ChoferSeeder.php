<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['ci' => '6354790',
            'nombre' => 'Pedro',
            'apellido' => 'Aban Palma',
            'telefono' => 77214590,
            'activo' => 1],
            ['ci' => '11343562',
            'nombre' => 'Carlos Eduardo',
            'apellido' => 'Roca Villarroel',
            'telefono' => 75112550,
            'activo' => 1],
            ['ci' => '7979979',
            'nombre' => 'Cristian',
            'apellido' => 'Poma Hinojosa',
            'telefono' => 69508461,
            'activo' => 1],
            ['ci' => '7547260',
            'nombre' => 'Efrain',
            'apellido' => 'Clemente Quispe',
            'telefono' => 77095110,
            'activo' => 1],
            ['ci' => '7210778',
            'nombre' => 'Jose',
            'apellido' => 'Vargas Lozano',
            'telefono' => 70105561,
            'activo' => 1],
            ['ci' => '9058074',
            'nombre' => 'Misael',
            'apellido' => 'Molina Herbas',
            'telefono' => 70881451,
            'activo' => 1],
            ['ci' => '9628204',
            'nombre' => 'Jhonatan',
            'apellido' => 'Zambrana Duran',
            'telefono' => 60803310,
            'activo' => 1],
            ['ci' => '12599786',
            'nombre' => 'Julio Cesar',
            'apellido' => 'Leon Escalante',
            'telefono' => 77354123,
            'activo' => 1],
            ['ci' => '9034760',
            'nombre' => 'Roberto Gabriel',
            'apellido' => 'Soria Ortiz',
            'telefono' => 66111145,
            'activo' => 1],
            ['ci' => '4693060',
            'nombre' => 'Felix',
            'apellido' => 'Romero Soto',
            'telefono' => 65913010,
            'activo' => 1]
        ];
        DB::table('chofers')->insert($data);
    }
}
