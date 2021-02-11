<?php

use Illuminate\Database\Seeder;

class TablaArlsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('arls')->truncate();

        $arls = [

            ['id' => 1, 'name' => 'AXA COLPATRIA S.A.', 'created_at' => new DateTime ],
            ['id' => 2, 'name' => 'COLMENA SEGUROS', 'created_at' => new DateTime ],
            ['id' => 3, 'name' => 'COMPAÑÍA DE SEGUROS DE VIDA AURORA S.A.', 'created_at' => new DateTime ],
            ['id' => 4, 'name' => 'LA EQUIDAD SEGUROS DE VIDA', 'created_at' => new DateTime ],
            ['id' => 5, 'name' => 'LIBERTY SEGUROS DE VIDA S.A.', 'created_at' => new DateTime ],
            ['id' => 6, 'name' => 'MAPFRE SEGUROS', 'created_at' => new DateTime ],
            ['id' => 7, 'name' => 'POSITIVA', 'created_at' => new DateTime ],
            ['id' => 8, 'name' => 'SEGUROS BOLÍVAR S.A.', 'created_at' => new DateTime ],
            ['id' => 9, 'name' => 'SEGUROS DE VIDA ALFA S.A.', 'created_at' => new DateTime ],
            ['id' => 10, 'name' => 'SURATEP SA', 'created_at' => new DateTime ],


          ];

        DB::table('arls')->insert($arls);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
