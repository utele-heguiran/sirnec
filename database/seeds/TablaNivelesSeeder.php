<?php

use Illuminate\Database\Seeder;

class TablaNivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('niveles')->truncate();

        $niveles = [
        	['id' =>1,  'name' =>'Directivo',     'created_at' => new DateTime ],
			['id' =>2,  'name' =>'Asesor',     'created_at' => new DateTime ],
            ['id' =>3,  'name' =>'Profesional',     'created_at' => new DateTime ],
            ['id' =>4,  'name' =>'Técnico',     'created_at' => new DateTime ],
            ['id' =>5,  'name' =>'Asistencial',     'created_at' => new DateTime ],
            ['id' =>6,  'name' =>'Desconcentrado',     'created_at' => new DateTime ],

          ];

        DB::table('niveles')->insert($niveles);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
