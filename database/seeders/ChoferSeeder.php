<?php

namespace Database\Seeders;

use App\Models\Chofer;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            
            [/* linea 10 */
                'ci' => '6354790',
                'password' => bcrypt('12345678'),
                'nombre' => 'Pedro',
                'apellido' => 'Soriocó',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 77214590,
                'email' => 'pedroa@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer1.png'
            ],
            [/* Linea 1 */
                'ci' => '11343562',
                'password' => bcrypt('12345678'),
                'nombre' => 'Carlos Eduardo',
                'apellido' => 'Roca Villarroel',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 75112550,
                'email' => 'carlos@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer2.png'
            ],
            [/* linea 18 */
                'ci' => '7979979',
                'password' => bcrypt('12345678'),
                'nombre' => 'Cristian',
                'apellido' => 'Poma Hinojosa',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 69508461,
                'email' => 'cristianp@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer3.png'
            ],
            [/* linea 8 */
                'ci' => '7547260',
                'password' => bcrypt('12345678'),
                'nombre' => 'Efrain',
                'apellido' => 'Clemente Quispe',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 77095110,
                'email' => 'efrain@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer4.png'
            ],
            [/* linea 16 */
                'ci' => '7210778',
                'password' => bcrypt('12345678'),
                'nombre' => 'Jose',
                'apellido' => 'Vargas Lozano',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 70105561,
                'email' => 'jose@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer5.png'
            ],
            [/* linea 5 */
                'ci' => '9058074',
                'password' => bcrypt('12345678'),
                'nombre' => 'Misael',
                'apellido' => 'Molina Herbas',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 70881451,
                'email' => 'misael@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer6.png'
            ],
            [/* linea 16 */
                'ci' => '9628204',
                'password' => bcrypt('12345678'),
                'nombre' => 'Jhonatan',
                'apellido' => 'Zambrana Duran',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 60803310,
                'email' => 'jhonatan@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer7.png'
            ],
            [/* linea 17 */
                'ci' => '12599786',
                'password' => bcrypt('12345678'),
                'nombre' => 'Julio Cesar',
                'apellido' => 'Leon Escalante',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 77354123,
                'email' => 'julio@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer8.png'
            ],
            [/* linea 11 */
                'ci' => '9034760',
                'password' => bcrypt('12345678'),
                'nombre' => 'Roberto Gabriel',
                'apellido' => 'Soria Ortiz',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 66111145,
                'email' => 'roberto@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer9.png'                
            ],
            [/* linea 9 */
                'ci' => '4693060',
                'password' => bcrypt('12345678'),
                'nombre' => 'Felix',
                'apellido' => 'Romero Soto',
                'sexo' => 'M',
                'fecha_nac' => '1990-05-04',
                'telefono' => 65913010,
                'email' => 'felix@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer10.png'
            ],
            //linea 2
            [
                'ci' => '99827832',
                'password' => bcrypt('12345678'),
                'nombre' => 'Felix',
                'apellido' => 'Panduro',
                'sexo' => 'M',
                'fecha_nac' => '1980-05-04',
                'telefono' => 65913010,
                'email' => 'felixpanduro@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer11.png'
            ],
            [/* linea 9 */
                'ci' => '13354790',
                'password' => bcrypt('12345678'),
                'nombre' => 'Juanito',
                'apellido' => 'Betancurd',
                'sexo' => 'M',
                'fecha_nac' => '1996-05-04',
                'telefono' => 67237233,
                'email' => 'juanito@gmail.com',
                'tipo' => 'C',
                'foto' => 'chofer\chofer12.png'
            ],
        ];
        foreach ($data as $d) {
            $u = User::create($d);
            Chofer::create([
                'user_id' => $u->id,
                'direccion' => 'sin direccion',
                'activo' => 1,
                'categoria_licencia' => 'C'
            ]);
        }
    }
}
