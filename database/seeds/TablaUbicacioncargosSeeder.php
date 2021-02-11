<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaUbicacioncargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('ubicacioncargos')->truncate();

        $ubicacioncargos = [

            ['id' =>1,  'oficina_id' =>116, 'cargo_id' =>45, 'especificacioncargos_id' =>448, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>2,  'oficina_id' =>116, 'cargo_id' =>38, 'especificacioncargos_id' =>320, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>3,  'oficina_id' =>116, 'cargo_id' =>33, 'especificacioncargos_id' =>208, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>4,  'oficina_id' =>116, 'cargo_id' =>21, 'especificacioncargos_id' =>112, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>5,  'oficina_id' =>116, 'cargo_id' =>24, 'especificacioncargos_id' =>448, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>6,  'oficina_id' =>116, 'cargo_id' =>28, 'especificacioncargos_id' =>320, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>7,  'oficina_id' =>116, 'cargo_id' =>36, 'especificacioncargos_id' =>208, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>8,  'oficina_id' =>116, 'cargo_id' =>44, 'especificacioncargos_id' =>112, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>9,  'oficina_id' =>118, 'cargo_id' =>45, 'especificacioncargos_id' =>448, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>10,  'oficina_id' =>118, 'cargo_id' =>38, 'especificacioncargos_id' =>320, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>11,  'oficina_id' =>118, 'cargo_id' =>33, 'especificacioncargos_id' =>208, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>12,  'oficina_id' =>118, 'cargo_id' =>21, 'especificacioncargos_id' =>112, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>13,  'oficina_id' =>118, 'cargo_id' =>24, 'especificacioncargos_id' =>448, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>14,  'oficina_id' =>118, 'cargo_id' =>28, 'especificacioncargos_id' =>320, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>15,  'oficina_id' =>118, 'cargo_id' =>36, 'especificacioncargos_id' =>208, 'estado_id' =>1,   'created_at' => new DateTime ],
            ['id' =>16,  'oficina_id' =>118, 'cargo_id' =>44, 'especificacioncargos_id' =>112, 'estado_id' =>1,   'created_at' => new DateTime ],

          ];

        DB::table('ubicacioncargos')->insert($ubicacioncargos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
