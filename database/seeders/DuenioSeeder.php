<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuenioSeeder extends Seeder
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
            'sexo' => 'M',
            'fecha_nac' => '1990/10/30',
            'email' => 'pedro90@gmail.com',
            'telefono' => 77214590],
            ['ci' => '11325796',
            'nombre' => 'Luis Fernando',
            'apellido' => 'Barrero Alvarez',
            'sexo' => 'M',
            'fecha_nac' => '1982/07/06',
            'email' => 'barrero_luis@gmail.com',
            'telefono' => 71035681],
            ['ci' => '6476758',
            'nombre' => 'Ivan',
            'apellido' => 'Encinas Guzman',
            'sexo' => 'M',
            'fecha_nac' => '1988/02/15',
            'email' => 'ivan@outlook.com',
            'telefono' => 65049210],
            ['ci' => '7547260',
            'nombre' => 'Efrain',
            'apellido' => 'Clemente Quispe',
            'sexo' => 'M',
            'fecha_nac' => '1970/06/08',
            'email' => 'efrain@gmail.com',
            'telefono' => 77095110],
            ['ci' => '8921080',
            'nombre' => 'Rafael',
            'apellido' => 'Iriarte Veizaga',
            'sexo' => 'M',
            'fecha_nac' => '1975/05/10',
            'email' => 'rafa_iriarte@gmail.com',
            'telefono' => 60882221],
            ['ci' => '12599786',
            'nombre' => 'Julio Cesar',
            'apellido' => 'Leon Escalante',
            'sexo' => 'M',
            'fecha_nac' => '1986/07/30',
            'email' => 'julioleon@gmail.com',
            'telefono' => 77354123],
            ['ci' => '6209787',
            'nombre' => 'Luis Fernando',
            'apellido' => 'Quispe Mamani',
            'sexo' => 'M',
            'fecha_nac' => '1972/09/11',
            'email' => 'luis_quispe@gmail.com',
            'telefono' => 60105880],
            ['ci' => '9058074',
            'nombre' => 'Misael',
            'apellido' => 'Molina Herbas',
            'sexo' => 'M',
            'fecha_nac' => '1984/12/15',
            'email' => 'misael84@gmail.com',
            'telefono' => 70881451],
            ['ci' => '9011915',
            'nombre' => 'Cristian',
            'apellido' => 'Poma Martinez',
            'sexo' => 'M',
            'fecha_nac' => '1972/01/20',
            'email' => 'cris_poma@gmail.com',
            'telefono' => 70991511],
            ['ci' => '4693060',
            'nombre' => 'Felix',
            'apellido' => 'Romero Soto',
            'sexo' => 'M',
            'fecha_nac' => '1985/04/16',
            'email' => 'romerofelix@hotmail.com',
            'telefono' => 65913010]
        ];
        DB::table('duenios')->insert($data);
    }
}
