<?php

use Illuminate\Database\Seeder;

class TablaClascontratosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('clascontratos')->truncate();

        $clascontratos = [

            ['id' => 1, 'name' => 'Provisionalidad',     'created_at' => new DateTime  ],
       		['id' => 2, 'name' => 'Carrera Administrativa',   'created_at' => new DateTime ],
            ['id' => 3, 'name' => 'Supernumerario',     'created_at' => new DateTime ]

          ];

        DB::table('clascontratos')->insert($clascontratos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
