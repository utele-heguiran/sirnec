<?php

use Illuminate\Database\Seeder;

class TablaOrigenrechazosSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('origenrechazos')->truncate();

        $origenrechazos = [
            
        	['id' => 1, 'name' => 'Centro de Acopio',     'created_at' => new DateTime   ],
        	['id' => 3, 'name' => 'Consulta WEB',     'created_at' => new DateTime   ],
            ['id' => 6, 'name' => 'MorphoTop',     'created_at' => new DateTime   ],
            ['id' => 8, 'name' => 'Estacion de Enrolamiento EIS',     'created_at' => new DateTime   ],
            ['id' => 10, 'name' => 'Estación de Enrolamiento',     'created_at' => new DateTime   ]
        	
          ];

        DB::table('origenrechazos')->insert($origenrechazos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
    }
}
