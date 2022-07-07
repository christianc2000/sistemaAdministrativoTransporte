<?php

namespace Database\Seeders;

use App\Models\Administrador;
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
        $this->call(AdministradorSeeder::class);
        $this->call(ChoferSeeder::class);
        $this->call(InstitucionSeeder::class);
        $this->call(AdministradorInstitucionSeeder::class);
        $this->call(LineasSeeder::class);
    }
}
