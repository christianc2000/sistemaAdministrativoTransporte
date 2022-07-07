<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\AdministradorInstitucion;
use App\Models\Chofer;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u=User::create(
            [
                'ci' => '9821212',
                'password' => bcrypt('12345678'),
                'nombre' => 'christian',
                'apellido' => 'mamani',
                'sexo' => 'M',
                'fecha_nac' => '2000-01-04',
                'telefono' => 77376902,
                'email' => 'chess@gmail.com',
                'tipo' => 'A',
            ]
        );
        Administrador::create([
            'user_id'=>$u->id
        ]);
        $u=User::create([
            'ci' => '11123213',
            'password' => bcrypt('12345678'),
            'nombre' => 'Madeleine',
            'apellido' => 'Vasquez',
            'sexo' => 'F',
            'fecha_nac' => '2002-01-27',
            'telefono' => 77232232,
            'email' => 'made@gmail.com',
            'tipo' => 'I',
        ]);
        AdministradorInstitucion::create($u->id);
        $u=User::create([
            'ci' => '3223232',
            'password' => bcrypt('12345678'),
            'nombre' => 'Juan',
            'apellido' => 'Ortiz',
            'sexo' => 'M',
            'fecha_nac' => '1990-05-04',
            'telefono' => 74334223,
            'email' => 'juan@gmail.com',
            'tipo' => 'C',
        ]);
        Chofer::create($u->id);
    }
}
