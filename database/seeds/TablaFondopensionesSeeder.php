<?php

use Illuminate\Database\Seeder;

class TablaFondopensionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('fondopensiones')->truncate();

        $fondopensiones = [

            ['id' => 1, 'cod' => '230201', 'nit' => '800229739-0', 'name' => 'Protección',     'created_at' => new DateTime ],
			['id' => 2, 'cod' => '230301', 'nit' => '800224808-8', 'name' => 'Porvenir',     'created_at' => new DateTime ],
			['id' => 3, 'cod' => '230901', 'nit' => '800253055-2', 'name' => 'Old Mutual Fondo de Pensiones Obligatorias',     'created_at' => new DateTime ],
			['id' => 4, 'cod' => '230904', 'nit' => '830125132-2', 'name' => 'Old Mutual Fondo Alternativo de Pensiones',     'created_at' => new DateTime ],
			['id' => 5, 'cod' => '231001', 'nit' => '800227940-6', 'name' => 'Colfondos',     'created_at' => new DateTime ],
			['id' => 6, 'cod' => '43156', 'nit' => '860007379-8', 'name' => 'Caja de Auxilios y de Prestaciones de ACDAC',     'created_at' => new DateTime ],
			['id' => 7, 'cod' => '43184', 'nit' => '899999734-7', 'name' => 'Fondo de Previsión Social del Congreso',     'created_at' => new DateTime ],
			['id' => 8, 'cod' => '43306', 'nit' => '800216278-0', 'name' => 'Pensiones de Antioquia',     'created_at' => new DateTime ],
			['id' => 9, 'cod' => '25-14', 'nit' => '900336004-7', 'name' => 'Administradora Colombiana de Pensiones Colpensiones',     'created_at' => new DateTime ],

          ];

        DB::table('fondopensiones')->insert($fondopensiones);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
