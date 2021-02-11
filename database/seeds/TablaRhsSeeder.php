<?php

use Illuminate\Database\Seeder;

class TablaRhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('rhs')->truncate();

        $rhs = [
            ['id' => 1, 'name' => 'O+', 'created_at' => new DateTime ],
        	['id' => 2, 'name' => 'O-', 'created_at' => new DateTime ],
        	['id' => 3, 'name' => 'A+', 'created_at' => new DateTime ],
        	['id' => 4, 'name' => 'A-', 'created_at' => new DateTime ],
        	['id' => 5, 'name' => 'B+', 'created_at' => new DateTime ],
        	['id' => 6, 'name' => 'B-', 'created_at' => new DateTime ],
        	['id' => 7, 'name' => 'AB+', 'created_at' => new DateTime ],
            ['id' => 8, 'name' => 'AB-', 'created_at' => new DateTime ],
        ];

        DB::table('rhs')->insert($rhs);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
