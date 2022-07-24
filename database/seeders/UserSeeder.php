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
        //ADMINISTRADORES
        $u = User::create(
            [
                'ci' => '9821212',
                'password' => bcrypt('12345678'),
                'nombre' => 'Christian',
                'apellido' => 'Mamani',
                'sexo' => 'M',
                'fecha_nac' => '2000-01-04',
                'telefono' => 77376902,
                'email' => 'chess@gmail.com',
                'tipo' => 'A',
            ]
        )->assignRole('AdminGlobal');
        Administrador::create([
            'user_id' => $u->id
        ]);
        $u = User::create(
            [
                'ci' => '32219232',
                'password' => bcrypt('12345678'),
                'nombre' => 'Cristian',
                'apellido' => 'Nina',
                'sexo' => 'M',
                'fecha_nac' => '1999-02-23',
                'telefono' => 74376902,
                'email' => 'cris@gmail.com',
                'tipo' => 'A',
            ]
        );
        Administrador::create([
            'user_id' => $u->id
        ]);
        $u = User::create(
            [
                'ci' => '2389542',
                'password' => bcrypt('12345678'),
                'nombre' => 'Junior',
                'apellido' => 'Llanos',
                'sexo' => 'M',
                'fecha_nac' => '1998-11-24',
                'telefono' => 76239823,
                'email' => 'junior@gmail.com',
                'tipo' => 'A',
            ]
        );
        Administrador::create([
            'user_id' => $u->id
        ]);
        $u = User::create(
            [
                'ci' => '4239542',
                'password' => bcrypt('12345678'),
                'nombre' => 'Rister',
                'apellido' => 'rister',
                'sexo' => 'M',
                'fecha_nac' => '1999-09-03',
                'telefono' => 76239832,
                'email' => 'rister@gmail.com',
                'tipo' => 'A',
            ]
        );
        Administrador::create([
            'user_id' => $u->id
        ]);
        //ADMINISTRADORES DE INSTITUCIÓN
        $u = User::create([
            'ci' => '87872333',
            'password' => bcrypt('12345678'),
            'nombre' => 'Madeleine',
            'apellido' => 'Vasquez',
            'sexo' => 'F',
            'fecha_nac' => '2004-01-27',
            'telefono' => 77232232,
            'email' => 'made@gmail.com',
            'tipo' => 'I',
        ]);
        
        $u = User::create([
            'ci' => '81222333',
            'password' => bcrypt('12345678'),
            'nombre' => 'Karen',
            'apellido' => 'Miranda',
            'sexo' => 'F',
            'fecha_nac' => '2000-01-12',
            'telefono' => 72323242,
            'email' => 'karen@gmail.com',
            'tipo' => 'I',
        ]);

        $u = User::create([
            'ci' => '1211233',
            'password' => bcrypt('12345678'),
            'nombre' => 'Cesar',
            'apellido' => 'Ortuño',
            'sexo' => 'M',
            'fecha_nac' => '1999-01-27',
            'telefono' => 77223332,
            'email' => 'cesar@gmail.com',
            'tipo' => 'I',
        ]);
        

        $u = User::create([
            'ci' => '81111233',
            'password' => bcrypt('12345678'),
            'nombre' => 'Ruben',
            'apellido' => 'Suarez',
            'sexo' => 'M',
            'fecha_nac' => '1993-01-27',
            'telefono' => 77362232,
            'email' => 'ruben@gmail.com',
            'tipo' => 'I',
        ]);
        
    }
}
