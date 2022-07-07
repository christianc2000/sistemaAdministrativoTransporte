<?php

namespace Database\Seeders;

use App\Models\Institucion;
use Illuminate\Database\Seeder;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institucion::create(
            [
                'nombre' => 'Cooperativa la cruceñita',
                'direccion' => 'Avenida Virgen de Lujan',
                'telefono' => 33320232,
                'id_administrador' => 1
            ]
        );
        Institucion::create(
            [
                'nombre' => 'Cooperativa Santa tereza',
                'direccion' => 'Avenida Piraí',
                'telefono' => 33299293,
                'id_administrador' => 1
            ]
        );
    }
}
