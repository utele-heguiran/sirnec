<?php

use Illuminate\Database\Seeder;

class TablaCargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('cargos')->truncate();

        $cargos = [

            ['id'=>1,'nivel_id'=>1,'name'=>'Registrador Nacional del Estado Civil','codigo'=>'0010','grado'=>'','descripcion'=>'Registrador Nacional del Estado Civil 0010-00' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>2,'nivel_id'=>1,'name'=>'Registrador Delegado','codigo'=>'0011','grado'=>'07','descripcion'=>'Registrador Delegado 0011-07' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>3,'nivel_id'=>1,'name'=>'Secretario General','codigo'=>'0017','grado'=>'08','descripcion'=>'Secretario General 0017-08' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>4,'nivel_id'=>1,'name'=>'Delegado Departamental','codigo'=>'0020','grado'=>'04','descripcion'=>'Delegado Departamental 0020-04' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>5,'nivel_id'=>1,'name'=>'Registrador Distrital','codigo'=>'0025','grado'=>'07','descripcion'=>'Registrador Distrital 0025-07' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>6,'nivel_id'=>1,'name'=>'Secretario Privado','codigo'=>'0035','grado'=>'07','descripcion'=>'Secretario Privado 0035-07' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>7,'nivel_id'=>1,'name'=>'Gerente Administrativo y Financiero','codigo'=>'0050','grado'=>'07','descripcion'=>'Gerente Administrativo y Financiero 0050-07' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>8,'nivel_id'=>1,'name'=>'Registrador Especial','codigo'=>'0065','grado'=>'01','descripcion'=>'Registrador Especial 0065-01' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>9,'nivel_id'=>1,'name'=>'Registrador Especial','codigo'=>'0065','grado'=>'02','descripcion'=>'Registrador Especial 0065-02' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>10,'nivel_id'=>1,'name'=>'Registrador Especial','codigo'=>'0065','grado'=>'03','descripcion'=>'Registrador Especial 0065-03' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>11,'nivel_id'=>1,'name'=>'Director General','codigo'=>'0110','grado'=>'06','descripcion'=>'Director General 0110-06' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>12,'nivel_id'=>1,'name'=>'Jefe de Oficina','codigo'=>'0120','grado'=>'05','descripcion'=>'Jefe de Oficina 0120-05' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>13,'nivel_id'=>2,'name'=>'Asesor','codigo'=>'1020','grado'=>'01','descripcion'=>'Asesor 1020-01' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>14,'nivel_id'=>2,'name'=>'Asesor','codigo'=>'1020','grado'=>'03','descripcion'=>'Asesor 1020-03' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>15,'nivel_id'=>2,'name'=>'Asesor','codigo'=>'1020','grado'=>'04','descripcion'=>'Asesor 1020-04' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>16,'nivel_id'=>3,'name'=>'Profesional Especializado','codigo'=>'3010','grado'=>'05','descripcion'=>'Profesional Especializado 3010-05' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>17,'nivel_id'=>3,'name'=>'Profesional Especializado','codigo'=>'3010','grado'=>'06','descripcion'=>'Profesional Especializado 3010-06' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>18,'nivel_id'=>3,'name'=>'Profesional Especializado','codigo'=>'3010','grado'=>'07','descripcion'=>'Profesional Especializado 3010-07' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>19,'nivel_id'=>3,'name'=>'Profesional Especializado','codigo'=>'3010','grado'=>'08','descripcion'=>'Profesional Especializado 3010-08' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>20,'nivel_id'=>6,'name'=>'Registrador Auxiliar','codigo'=>'3015','grado'=>'04','descripcion'=>'Registrador Auxiliar 3015-04' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>21,'nivel_id'=>3,'name'=>'Profesional Universitario','codigo'=>'3020','grado'=>'01','descripcion'=>'Profesional Universitario 3020-01' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>22,'nivel_id'=>3,'name'=>'Profesional Universitario','codigo'=>'3020','grado'=>'02','descripcion'=>'Profesional Universitario 3020-02' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>23,'nivel_id'=>3,'name'=>'Profesional Universitario','codigo'=>'3020','grado'=>'03','descripcion'=>'Profesional Universitario 3020-03' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>24,'nivel_id'=>4,'name'=>'Analista de Sistemas','codigo'=>'4005','grado'=>'05','descripcion'=>'Analista de Sistemas 4005-05' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>25,'nivel_id'=>4,'name'=>'Registrador Municipal','codigo'=>'4035','grado'=>'05','descripcion'=>'Registrador Municipal 4035-05' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>26,'nivel_id'=>4,'name'=>'Registrador Municipal','codigo'=>'4035','grado'=>'06','descripcion'=>'Registrador Municipal 4035-06' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>27,'nivel_id'=>4,'name'=>'Registrador Municipal','codigo'=>'4035','grado'=>'07','descripcion'=>'Registrador Municipal 4035-07' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>28,'nivel_id'=>4,'name'=>'Técnico Administrativo','codigo'=>'4065','grado'=>'02','descripcion'=>'Técnico Administrativo 4065-02' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>29,'nivel_id'=>4,'name'=>'Técnico Administrativo','codigo'=>'4065','grado'=>'03','descripcion'=>'Técnico Administrativo 4065-03' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>30,'nivel_id'=>4,'name'=>'Técnico Administrativo','codigo'=>'4065','grado'=>'04','descripcion'=>'Técnico Administrativo 4065-04' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>31,'nivel_id'=>4,'name'=>'Técnico Administrativo','codigo'=>'4065','grado'=>'05','descripcion'=>'Técnico Administrativo 4065-05' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>32,'nivel_id'=>4,'name'=>'Técnico','codigo'=>'4080','grado'=>'01','descripcion'=>'Técnico 4080-01' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>33,'nivel_id'=>4,'name'=>'Técnico Operativo','codigo'=>'4080','grado'=>'02','descripcion'=>'Técnico Operativo 4080-02 ' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>34,'nivel_id'=>4,'name'=>'Técnico Operativo','codigo'=>'4080','grado'=>'03','descripcion'=>'Técnico Operativo 4080-03' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>35,'nivel_id'=>4,'name'=>'Técnico Operativo','codigo'=>'4080','grado'=>'04','descripcion'=>'Técnico Operativo 4080-04' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>36,'nivel_id'=>5,'name'=>'Secretario Ejecutivo','codigo'=>'5040','grado'=>'08','descripcion'=>'Secretario Ejecutivo 5040-08' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>37,'nivel_id'=>5,'name'=>'Secretario Ejecutivo','codigo'=>'5040','grado'=>'09','descripcion'=>'Secretario Ejecutivo 5040-09' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>38,'nivel_id'=>5,'name'=>'Auxiliar Administrativo','codigo'=>'5120','grado'=>'04','descripcion'=>'Auxiliar Administrativo 5120-04' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>39,'nivel_id'=>5,'name'=>'Auxiliar Administrativo','codigo'=>'5120','grado'=>'05','descripcion'=>'Auxiliar Administrativo 5120-05' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>40,'nivel_id'=>5,'name'=>'Auxiliar Administrativo','codigo'=>'5120','grado'=>'07','descripcion'=>'Auxiliar Administrativo 5120-07' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>41,'nivel_id'=>5,'name'=>'Secretario','codigo'=>'5140','grado'=>'06','descripcion'=>'Secretario 5140-06' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>42,'nivel_id'=>5,'name'=>'Operario Calificado','codigo'=>'5300','grado'=>'03','descripcion'=>'Operario Calificado 5300-03 ' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>43,'nivel_id'=>5,'name'=>'Conductor Mecánico','codigo'=>'5310','grado'=>'05','descripcion'=>'Conductor Mecánico 5310-05' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>44,'nivel_id'=>5,'name'=>'Conductor Mecánico','codigo'=>'5310','grado'=>'06','descripcion'=>'Conductor Mecánico 5310-06' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
            ['id'=>45,'nivel_id'=>5,'name'=>'Auxiliar de Servicios Generales','codigo'=>'5335','grado'=>'01','descripcion'=>'Auxiliar de Servicios Generales 5335-01' ,'sueldo'=>1000000,'cantidad'=>10,'created_at'=>new DateTime],
        ];

        DB::table('cargos')->insert($cargos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
