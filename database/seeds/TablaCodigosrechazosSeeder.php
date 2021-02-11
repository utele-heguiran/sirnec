<?php

use Illuminate\Database\Seeder;

class TablaCodigosrechazosSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('codigosrechazos')->truncate();

        $codigosrechazos = [
            
        	['id' => 1000, 'name' => 'No detalle -  ',     'created_at' => new DateTime   ],
        	['id' => 1001, 'name' => 'Persona encontrada en la lista negra ',     'created_at' => new DateTime   ],
            ['id' => 1002, 'name' => 'Persona encontrada en la lista de los números de preparación prohibidos ',     'created_at' => new DateTime   ],
            ['id' => 1012, 'name' => 'La solicitud no contiene ningún pulgar, índice o medio de calidad suficiente para hacer un cotejo - NO DEDO VALIDO ',     'created_at' => new DateTime   ],
            ['id' => 1015, 'name' => 'Problema tecnico, no se pudo tratar la solicitud - GRUPO SANGUINEO INCORRECTO ',     'created_at' => new DateTime   ],
            ['id' => 1016, 'name' => 'Inconsistencias en las fechas -  EXPFECHA Y PREPFECHA NO COINCIDEN ',     'created_at' => new DateTime   ],
            ['id' => 1022, 'name' => 'La solicitud tiene un foto de mala calidad - Rechazo por problema de calidad en la foto ',     'created_at' => new DateTime   ],
            ['id' => 1031, 'name' => 'La solicitud tiene un firma de mala calidad o no tiene firma y no pude ser retratada. - Rechazo por problema de calidad en la firma ',     'created_at' => new DateTime   ],
            ['id' => 1043, 'name' => 'Problema con el tipo de la solicitud. El tipo de la solicitud es incoherente con el tipo de la última solicitud. - Solicitud de Primera Vez CC por una persona con una cédula de nueva generación en el MTR',     'created_at' => new DateTime   ],
            ['id' => 1050, 'name' => 'Control con el Registro Civil - . Pais: 77500VENEZUELA ',     'created_at' => new DateTime   ],
            ['id' => 1061, 'name' => 'Datos alfanuméricos que han cambiado - DEMAPELLIDO1 DEMAPELLIDO2 SOLEXPMPIO SOLEXPFECHA son diferentes ',     'created_at' => new DateTime   ],
            ['id' => 1070, 'name' => 'Persona encontrada en la lista de vigencia definitiva. -  Codigos de rechazo de documento ',     'created_at' => new DateTime   ],
            ['id' => 2011, 'name' => 'Resultado del cotejo 1:1 no_hit por huellas y no_hit por foto ',     'created_at' => new DateTime   ],
            ['id' => 2021, 'name' => 'Otra persona encontrada en el matcher con las mismas minucias que la persona en la solicitud. Un operador de VERIF ha confirmado el hit. ',     'created_at' => new DateTime   ],
            ['id' => 2022, 'name' => 'La persona en la solicitud no tiene las mismas minucias que en el MTR. Un operador de VERIF ha confirmado el no_hit. ',     'created_at' => new DateTime   ],
            ['id' => 3000, 'name' => 'Problema tecnico, no se pudo tratar la solicitud - Operation failure for Unknown exception ',     'created_at' => new DateTime   ],
            ['id' => 4003, 'name' => 'El documento tiene problemas de calidad. El problema proviene de la solicitud. -  Codigos de rechazo de documento : 4526',     'created_at' => new DateTime   ],
        	
          ];

        DB::table('codigosrechazos')->insert($codigosrechazos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
    }
}
