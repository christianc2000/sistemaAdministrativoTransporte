<?php

namespace Database\Seeders;

use App\Models\AdministradorInstitucion;
use App\Models\Institucion;
use App\Models\User;
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
        $users=User::all()->where('tipo','I');
        $i=1;
        foreach ($users as $u) {
            AdministradorInstitucion::create(
                [
                    'user_id' => $u->id,
                    'id_institucion' => $i
                ]
            );
            $i++;
        }
    }
}