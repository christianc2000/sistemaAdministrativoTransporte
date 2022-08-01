<?php

namespace Database\Seeders;

use App\Models\ChoferTarjeta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoferTarjetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'fecha' => '2022/07/06',
                'activo' => true,
                'chofer_id' => 9,
                'tarjeta_id' => 1
            ],
            [
                'fecha' => '2022/07/06',
                'activo' => true,
                'chofer_id' => 1,
                'tarjeta_id' => 2
            ],
            [
                'fecha' => '2022/07/06',
                'activo' => true,
                'chofer_id' => 3,
                'tarjeta_id' => 3
            ],
            [
                'fecha' => '2022/07/06',
                'activo' => true, 
                'chofer_id' => 7,
                'tarjeta_id' => 4
            ],
            [
                'fecha' => '2022/07/06',
                'activo' => true, 
                'chofer_id' => 2,
                'tarjeta_id' => 5
            ],
            [
                'fecha' => '2022/07/06',
                'activo' => true, 
                'chofer_id' => 4,
                'tarjeta_id' => 6
            ],
            [
                'fecha' => '2022/07/06',
                'activo' => true, 
                'chofer_id' => 10,
                'tarjeta_id' => 7
            ],
            [
                'fecha' => '2022/07/07',
                'activo' => true, 
                'chofer_id' => 5,
                'tarjeta_id' => 8
            ],
            [
                'fecha' => '2022/07/07',
                'activo' => true, 
                'chofer_id' => 8,
                'tarjeta_id' => 9
            ],
            [
                'fecha' => '2022/07/07',
                'activo' => true, 
                'chofer_id' => 6,
                'tarjeta_id' => 10
            ],
           
        ];
        foreach ($data as $d) {
            ChoferTarjeta::create($d);
        }
        //DB::table('chofer_tarjetas')->insert($data);
    }
}
