<?php

use Illuminate\Database\Seeder;


class TablaCompensacioncajasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('compensacioncajas')->truncate();

        $compensacioncajas = [

            ['id' => 1,  'cod' => 'Cafamaz', 'name' => 'Caja de Compensación Familiar del Amazonas', 'departamento_id'=>60,'created_at' => new DateTime ],
            ['id' => 2,  'cod' => 'Comfama', 'name' => 'Caja de Compensacion Familiar de Antioquia', 'departamento_id'=>1,'created_at' => new DateTime ],
            ['id' => 3,  'cod' => 'Comfenalco Antioquia', 'name' => 'Caja de Compensación Familiar Comfenalco Antioquia', 'departamento_id'=>1,'created_at' => new DateTime ],
            ['id' => 4,  'cod' => 'Comfiar', 'name' => 'Caja de Compensación Familiar de Arauca', 'departamento_id'=>40,'created_at' => new DateTime ],
            ['id' => 5,  'cod' => 'Cajacopi', 'name' => 'Caja de Compensación Famililar Cajacopi Atlántico', 'departamento_id'=>3,'created_at' => new DateTime ],
            ['id' => 6,  'cod' => 'Combarranquilla', 'name' => 'Caja de Compensacion Familiar de Barranquilla', 'departamento_id'=>3,'created_at' => new DateTime ],
            ['id' => 7,  'cod' => 'Comfamiliar Atlántico', 'name' => 'Caja de Compensación Familiar del Atlántico', 'departamento_id'=>3,'created_at' => new DateTime ],
            ['id' => 8,  'cod' => 'Cafam', 'name' => 'Caja de Compensación Familiar Cafam', 'departamento_id'=>16,'created_at' => new DateTime ],
            ['id' => 9,  'cod' => 'Colsubsidio', 'name' => 'Caja de Compensación Familiar Colsubsidio', 'departamento_id'=>16,'created_at' => new DateTime ],
            ['id' => 10, 'cod' => 'Compensar', 'name' => 'Caja de Compensación Familiar Compensar', 'departamento_id'=>16,'created_at' => new DateTime ],
            ['id' => 11, 'cod' => 'Comfamiliar Cartagena', 'name' => 'Caja de Compensación Familiar de Cartagena y Bolívar', 'departamento_id'=>5,'created_at' => new DateTime ],
            ['id' => 12, 'cod' => 'Comfenalco Cartagena', 'name' => 'Caja de Compensacion Familiar de Fenalco - Andi Cartagena', 'departamento_id'=>5,'created_at' => new DateTime ],
            ['id' => 13, 'cod' => 'Comfaboy', 'name' => 'Caja de Compensacion Familiar de Boyacá', 'departamento_id'=>7,'created_at' => new DateTime ],
            ['id' => 14, 'cod' => 'Confamiliares', 'name' => 'Caja de Compensación Familiar de Caldas', 'departamento_id'=>9,'created_at' => new DateTime ],
            ['id' => 15, 'cod' => 'Comfaca', 'name' => 'Caja de Compensacion Familiar del Caquetá', 'departamento_id'=>44,'created_at' => new DateTime ],
            ['id' => 16, 'cod' => 'Comfacasanare', 'name' => 'Caja de Compensación Familiar del Casanare', 'departamento_id'=>46,'created_at' => new DateTime ],
            ['id' => 17, 'cod' => 'Comfacauca', 'name' => 'Caja de Compensación Familiar del Cauca', 'departamento_id'=>11,'created_at' => new DateTime ],
            ['id' => 18, 'cod' => 'Comfacesar', 'name' => 'Caja de Compensación Familiar del Cesar', 'departamento_id'=>12,'created_at' => new DateTime ],
            ['id' => 19, 'cod' => 'Comfachocó', 'name' => 'Caja de Compensación Familiar del Choco', 'departamento_id'=>17,'created_at' => new DateTime ],
            ['id' => 20, 'cod' => 'Comfacor', 'name' => 'Caja de Compensación Familiar de Córdoba', 'departamento_id'=>13,'created_at' => new DateTime ],
            ['id' => 21, 'cod' => 'Comfacundi', 'name' => 'Caja de Compensación Familiar de Cundinamarca', 'departamento_id'=>15,'created_at' => new DateTime ],
            ['id' => 22, 'cod' => 'Comfaguajira', 'name' => 'Caja de Compensacion Familiar de la Guajira', 'departamento_id'=>48,'created_at' => new DateTime ],
            ['id' => 23, 'cod' => 'Comfamilair Huila', 'name' => 'Caja de Compensación Familiar del Huila', 'departamento_id'=>19,'created_at' => new DateTime ],
            ['id' => 24, 'cod' => 'Cajamag', 'name' => 'Caja de Compensación Familiar del Magdalena', 'departamento_id'=>21,'created_at' => new DateTime ],
            ['id' => 25, 'cod' => 'Cofrem', 'name' => 'Caja de Compensación Familiar Cofrem', 'departamento_id'=>52,'created_at' => new DateTime ],
            ['id' => 26, 'cod' => 'Comfaoriente', 'name' => 'Caja de Compensación Familiar del Oriente Colombiano', 'departamento_id'=>25,'created_at' => new DateTime ],
            ['id' => 27, 'cod' => 'Comfanorte', 'name' => 'Caja de Compensación Familiar del Norte de Santander', 'departamento_id'=>25,'created_at' => new DateTime ],
            ['id' => 28, 'cod' => 'Comfamiliar Putumayo', 'name' => 'Caja de Compensación Familiar del Putumayo', 'departamento_id'=>64,'created_at' => new DateTime ],
            ['id' => 29, 'cod' => 'ComfenalcoQuindio', 'name' => 'Caja de Compensación Familiar de Fenalco Quindio', 'departamento_id'=>26,'created_at' => new DateTime ],
            ['id' => 30, 'cod' => 'Cajasai', 'name' => 'Caja de Compensación Familiar de San Andrés y Providencia Islas', 'departamento_id'=>56,'created_at' => new DateTime ],
            ['id' => 31, 'cod' => 'Cafaba', 'name' => 'Caja de Compensación Familiar de Barrancabermeja', 'departamento_id'=>27,'created_at' => new DateTime ],
            ['id' => 32, 'cod' => 'Cajasan', 'name' => 'Caja Santandereana de Subsidio Familiar', 'departamento_id'=>27,'created_at' => new DateTime ],
            ['id' => 33, 'cod' => 'Comfenalco Santander', 'name' => 'Caja de Compensación Familiar de Fenalco Santander', 'departamento_id'=>27,'created_at' => new DateTime ],
            ['id' => 34, 'cod' => 'Comfasucre', 'name' => 'Caja de Compensación Familiar de Sucre', 'departamento_id'=>28,'created_at' => new DateTime ],
            ['id' => 35, 'cod' => 'Comfatolima', 'name' => 'Caja de Compensación Familiar del Tolima', 'departamento_id'=>29,'created_at' => new DateTime ],
            ['id' => 36, 'cod' => 'Cafasur', 'name' => 'Caja de Compensación Familiar del Sur del Tolima', 'departamento_id'=>29,'created_at' => new DateTime ],
            ['id' => 37, 'cod' => 'Comfandi', 'name' => 'Caja de Compensación Familiar del Valle del Cauca Comfamiliar ANDI', 'departamento_id'=>31,'created_at' => new DateTime ],
            ['id' => 38, 'cod' => 'Comfenalco Valle Delagente', 'name' => 'Caja de Compensación Familiar del Valle del Cauca', 'departamento_id'=>31,'created_at' => new DateTime ],
            ['id' => 39, 'cod' => 'Cafam', 'name' => 'Caja de Compensación Familiar Cafam', 'departamento_id'=>15,'created_at' => new DateTime ],
            ['id' => 40, 'cod' => 'Colsubsidio', 'name' => 'Caja de Compensación Familiar Colsubsidio', 'departamento_id'=>15,'created_at' => new DateTime ],
            ['id' => 41, 'cod' => 'Compensar', 'name' => 'Caja de Compensación Familiar Compensar', 'departamento_id'=>15,'created_at' => new DateTime ]

          ];

        DB::table('compensacioncajas')->insert($compensacioncajas);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
