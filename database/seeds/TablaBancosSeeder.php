<?php

use Illuminate\Database\Seeder;

class TablaBancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('bancos')->truncate();

        $bancos = [

            ['id' => 1, 'name' => 'Bancamia','created_at' => new DateTime ],
			['id' => 2, 'name' => 'Banco Agrario De Colombia S.A.',     'created_at' => new DateTime  ],
			['id' => 3, 'name' => 'Banco Av Villas','created_at' => new DateTime  ],
			['id' => 4, 'name' => 'Banco Caja Social - Bcsc S.A.','created_at' => new DateTime  ],
			['id' => 5, 'name' => 'Banco Cooperativo Coopcentral','created_at' => new DateTime  ],
			['id' => 6, 'name' => 'Banco Corpbanca Colombia S.A.','created_at' => new DateTime  ],
			['id' => 7, 'name' => 'Banco Davivienda S.A.','created_at' => new DateTime  ],
			['id' => 8, 'name' => 'Banco De Bogotá','created_at' => new DateTime  ],
			['id' => 9, 'name' => 'Banco De Comercio Exterior De Colombia S.A. (Bancoldex)','created_at' => new DateTime  ],
			['id' => 10, 'name' => 'Banco De La República','created_at' => new DateTime  ],
			['id' => 11, 'name' => 'Banco De Occidente','created_at' => new DateTime  ],
			['id' => 12, 'name' => 'Banco Falabella S.A.','created_at' => new DateTime  ],
			['id' => 13, 'name' => 'Banco Finandina S.A.','created_at' => new DateTime  ],
			['id' => 14, 'name' => 'Banco Gnb Colombia S.A.','created_at' => new DateTime  ],
			['id' => 15, 'name' => 'Banco Gnb Sudameris Colombia','created_at' => new DateTime  ],
			['id' => 16, 'name' => 'Banco Pichincha S.A.','created_at' => new DateTime  ],
			['id' => 17, 'name' => 'Banco Popular','created_at' => new DateTime  ],
			['id' => 18, 'name' => 'Banco Procredit','created_at' => new DateTime  ],
			['id' => 19, 'name' => 'Banco Santander De Negocios Colombia S.A. - Banco Santander',     'created_at' => new DateTime  ],
			['id' => 20, 'name' => 'Banco Wwb S.A.','created_at' => new DateTime  ],
			['id' => 21, 'name' => 'Bancolombia S.A.','created_at' => new DateTime  ],
			['id' => 22, 'name' => 'Bancoomeva','created_at' => new DateTime  ],
			['id' => 23, 'name' => 'Bbva Colombia','created_at' => new DateTime  ],
			['id' => 24, 'name' => 'Citibank Colombia','created_at' => new DateTime  ],
			['id' => 25, 'name' => 'Helm Bank','created_at' => new DateTime  ],
			['id' => 26, 'name' => 'Red Multibanca Colpatria S.A.','created_at' => new DateTime  ],

          ];

        DB::table('bancos')->insert($bancos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
