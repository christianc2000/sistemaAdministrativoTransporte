<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $perfil = 'public/perfil';//para direccionar la carpeta
        Storage::deleteDirectory($perfil);//para eliminar la carpeta
        Storage::makeDirectory($perfil);//para crear la carpeta
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class); //user y administrador
        $this->call(InstitucionSeeder::class);
        $this->call(AdministradorInstitucionSeeder::class);
        $this->call(ChoferSeeder::class);
        $this->call(LineaSeeder::class);
        $this->call(RequisitoSeeder::class);
        $this->call(DuenioSeeder::class);

        $this->call(DuenioLineaSeeder::class);
        $this->call(PermisoLineaSeeder::class);
        $this->call(MicroSeeder::class);
        $this->call(ChoferRequisitoSeeder::class);
        $this->call(ChoferMicroSeeder::class);
        $this->call(TarjetaSeeder::class);
        //$this->call(PermisoTarjetaSeeder::class);
        $this->call(ChoferTarjetaSeeder::class);
        $this->call(RecorridoTarjetaSeeder::class);
        $this->call(ProblemaSeeder::class);
        /*   $this->call([AdministradorSeeder::class, 
                    DuenioSeeder::class, x
                    ChoferSeeder::class, x
                    TarjetaSeeder::class, x
                    InstitucionSeeder::class, x
                    AdministradorInstitucionSeeder::class, x
                    LineaSeeder::class, x
                    DuenioLineaSeeder::class, x
                    PermisoLineaSeeder::class, x
                    MicroSeeder::class, x
                    ChoferMicroSeeder::class, x
                    PermisoTarjetaSeeder::class, x
                    RecorridoTarjetaSeeder::class,
                    RequisitoSeeder::class, x
                    ChoferRequisitoSeeder::class]); x*/
    }
}
