<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([AdministradorSeeder::class, 
                    DuenioSeeder::class, 
                    ChoferSeeder::class, 
                    TarjetaSeeder::class,
                    InstitucionSeeder::class,
                    AdministradorInstitucionSeeder::class,
                    LineaSeeder::class,
                    DuenioLineaSeeder::class,
                    PermisoLineaSeeder::class,
                    MicroSeeder::class,
                    ChoferMicroSeeder::class,
                    PermisoTarjetaSeeder::class,
                    RecorridoTarjetaSeeder::class,
                    RequisitoSeeder::class,
                    ChoferRequisitoSeeder::class]);
    }
}
