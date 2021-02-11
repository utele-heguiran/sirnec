<?php

use Illuminate\Database\Seeder;

class TablaDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('departamentos')->truncate();

        $departamentos = [

            ['id' =>1,  'name' =>'ANTIOQUIA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>3,  'name' =>'ATLANTICO',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>5,  'name' =>'BOLIVAR',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>7,  'name' =>'BOYACA', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>9,  'name' =>'CALDAS', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>11, 'name' =>'CAUCA', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>12, 'name' =>'CESAR', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>13, 'name' =>'CORDOBA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>15, 'name' =>'CUNDINAMARCA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>16, 'name' =>'BOGOTA D.C.', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>17, 'name' =>'CHOCO', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>19, 'name' =>'HUILA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>21, 'name' =>'MAGDALENA', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>23, 'name' =>'NARIÑO',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>24, 'name' =>'RISARALDA', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>25, 'name' =>'NORTE DE SANTANDER', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>26, 'name' =>'QUINDIO', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>27, 'name' =>'SANTANDER','pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>28, 'name' =>'SUCRE',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>29, 'name' =>'TOLIMA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>31, 'name' =>'VALLE', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>40, 'name' =>'ARAUCA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>44, 'name' =>'CAQUETA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>46, 'name' =>'CASANARE', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>48, 'name' =>'LA GUAJIRA', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>50, 'name' =>'GUAINIA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>52, 'name' =>'META',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>54, 'name' =>'GUAVIARE',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>56, 'name' =>'SAN ANDRES', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>60, 'name' =>'AMAZONAS',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>64, 'name' =>'PUTUMAYO', 'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>68, 'name' =>'VAUPES',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>72, 'name' =>'VICHADA',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>88, 'name' =>'CONSULADOS',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],
			['id' =>100, 'name' =>'OTROS PAISES',  'pais_id' => 42, 'path' => '' ,   'created_at' => new DateTime ],

          ];

        DB::table('departamentos')->insert($departamentos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
