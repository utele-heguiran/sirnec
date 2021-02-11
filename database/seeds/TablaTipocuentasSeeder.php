<?php

use Illuminate\Database\Seeder;

class TablaTipocuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('tipocuentas')->truncate();

        $tipocuentas = [
            ['id' => 1, 'name' => 'Ahorros',     'created_at' => new DateTime ],
       		['id' => 2, 'name' => 'Corriente',   'created_at' => new DateTime ],
          ];

        DB::table('tipocuentas')->insert($tipocuentas);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
