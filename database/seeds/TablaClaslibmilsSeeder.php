<?php

use Illuminate\Database\Seeder;

class TablaClaslibmilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('claslibmils')->truncate();

        $claslibmils = [

          ['id' => 1, 'name' => 'Primera Clase','created_at' => new DateTime ],
          ['id' => 2, 'name' => 'Segunda Clase','created_at' => new DateTime ],
          ['id' => 3, 'name' => 'No Aplica','created_at' => new DateTime ],
          ['id' => 4, 'name' => 'Aplazado','created_at' => new DateTime ]

          ];

        DB::table('claslibmils')->insert($claslibmils);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
