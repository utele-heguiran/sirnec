<?php

use Illuminate\Database\Seeder;

class TablaEpssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('epss')->truncate();

        $epss = [

            ['id' => 1, 'cod' => 'EPS001', 'nit' => '830113831-0', 'name' => 'Aliansalud EPS',     'created_at' => new DateTime ],
			['id' => 2, 'cod' => 'EPSIC1', 'nit' => '824001398', 'name' => 'Asociación de Cabildos Indígenas del Cesar “Dusakawi”',     'created_at' => new DateTime ],
			['id' => 3, 'cod' => 'EPSIC2', 'nit' => '812002376', 'name' => 'Asociación de Cabildos Indígenas del Resguardo Indígena Zenú de San Andrés de Sotavento Córdoba - Sucre "Manexka"',     'created_at' => new DateTime ],
			['id' => 4, 'cod' => 'EPSIC3', 'nit' => '817001773', 'name' => 'Asociación Indígena del Cauca - A.I.C.',     'created_at' => new DateTime ],
			['id' => 5, 'cod' => 'ESSC76', 'nit' => '818000140', 'name' => 'Asociación Mutual Barrios Unidos de Quibdó E.S.S. AMBUQ',     'created_at' => new DateTime ],
			['id' => 6, 'cod' => 'ESSC18', 'nit' => '814000337', 'name' => 'Asociación Mutual Empresa Solidaria de Salud de Nariño E.S.S. Emssanar E.S.S.',     'created_at' => new DateTime ],
			['id' => 7, 'cod' => 'ESSC62', 'nit' => '817000248', 'name' => 'Asociación Mutual La Esperanza Asmet Salud',     'created_at' => new DateTime ],
			['id' => 8, 'cod' => 'ESSC07', 'nit' => '806008394', 'name' => 'Asociación Mutual Ser Empresa Solidaría de Salud ESS',     'created_at' => new DateTime ],
			['id' => 9, 'cod' => 'EPSC03', 'nit' => '8001409496', 'name' => 'Cafesalud Entidad  Promotora de Salud S.A',     'created_at' => new DateTime ],
			['id' => 10, 'cod' => 'EPS003', 'nit' => '800140949-6', 'name' => 'Cafesalud EPS',     'created_at' => new DateTime ],
			['id' => 11, 'cod' => 'EPS 040', 'nit' => '900604350', 'name' => 'Caja de Compensación Familiar de Antioquía - Comfama - Hoy Savia Salud EPS',     'created_at' => new DateTime ],
			['id' => 12, 'cod' => 'CCFC23', 'nit' => '892115006', 'name' => 'Caja de Compensación Familiar de La Guajira',     'created_at' => new DateTime ],
			['id' => 13, 'cod' => 'CCFC55', 'nit' => '890102044', 'name' => 'Cajacopi Atlántico  - CCF',     'created_at' => new DateTime ],
			['id' => 14, 'cod' => 'EPSC34', 'nit' => '900298372', 'name' => 'Capital Salud EPSS S.A.S.',     'created_at' => new DateTime ],
			['id' => 15, 'cod' => 'EPSC25', 'nit' => '891856000', 'name' => 'Capresoca EPS',     'created_at' => new DateTime ],
			['id' => 16, 'cod' => 'CCFC09', 'nit' => '891800213', 'name' => 'Comfaboy EPS-CCF de Boyacá',     'created_at' => new DateTime ],
			['id' => 17, 'cod' => 'CCFC20', 'nit' => '891600091', 'name' => 'Comfachoco – CCF del Chocó',     'created_at' => new DateTime ],
			['id' => 18, 'cod' => 'CCFC15', 'nit' => '891080005', 'name' => 'Comfacor EPS – CCF de Córdoba',     'created_at' => new DateTime ],
			['id' => 19, 'cod' => 'CCFC53', 'nit' => '860045904', 'name' => 'Comfacundi - CCF de Cundinamarca',     'created_at' => new DateTime ],
			['id' => 20, 'cod' => 'CCFC27', 'nit' => '891280008', 'name' => 'Comfamiliar de Nariño EPS – CCF',     'created_at' => new DateTime ],
			['id' => 21, 'cod' => 'CCFC24', 'nit' => '891180008', 'name' => 'Comfamiliar Huila EPS – CCF',     'created_at' => new DateTime ],
			['id' => 22, 'cod' => 'CCFC33', 'nit' => '892200015', 'name' => 'Comfasucre EPS-CCF de Sucre',     'created_at' => new DateTime ],
			['id' => 23, 'cod' => 'EPS012', 'nit' => '890303093-5', 'name' => 'Comfenalco Valle EPS',     'created_at' => new DateTime ],
			['id' => 24, 'cod' => 'EPS008', 'nit' => '860066942-7', 'name' => 'Compensar Entidad Promotora de Salud',     'created_at' => new DateTime ],
			['id' => 25, 'cod' => 'EPS016', 'nit' => '805000427-1', 'name' => 'Coomeva EPS',     'created_at' => new DateTime ],
			['id' => 26, 'cod' => 'ESSC33', 'nit' => '804002105', 'name' => 'Cooperativa de Salud Comunitaria "Comparta"',     'created_at' => new DateTime ],
			['id' => 27, 'cod' => 'ESSC24', 'nit' => '800249241', 'name' => 'Cooperativa de Salud y Desarrollo Integral de la Zona Sur Oriental de Cartagena  b aLtda.  Coosalud E.S.S.',     'created_at' => new DateTime ],
			['id' => 28, 'cod' => 'EPS023', 'nit' => '830009783-0', 'name' => 'Cruz Blanca S.A',     'created_at' => new DateTime ],
			['id' => 29, 'cod' => 'EPS005', 'nit' => '800251440-6', 'name' => 'E.P.S Sanitas',     'created_at' => new DateTime ],
			['id' => 30, 'cod' => 'ESSC02', 'nit' => '811004055', 'name' => 'Empresa Mutual para el desarrollo integral de la salud E.S.S. Emdisalud ESS',     'created_at' => new DateTime ],
			['id' => 31, 'cod' => 'EAS016', 'nit' => '890904996-1', 'name' => 'Empresas Públicas de Medellín Departamento Médico',     'created_at' => new DateTime ],
			['id' => 32, 'cod' => 'EPSC22', 'nit' => '899999107', 'name' => 'Entidad Administradora de Régimen Subsidiado Convida',     'created_at' => new DateTime ],
			['id' => 33, 'cod' => 'ESSC91', 'nit' => '832000760', 'name' => 'Entidad Cooperativa Solidaria de Salud Ecoopsos',     'created_at' => new DateTime ],
			['id' => 34, 'cod' => 'EPSIC4', 'nit' => '839000495', 'name' => 'Entidad Promotora de Salud Anas Wayuu EPSI',     'created_at' => new DateTime ],
			['id' => 35, 'cod' => 'EPSIC5', 'nit' => '837000084', 'name' => 'Entidad Promotora de Salud Mallamas EPSI',     'created_at' => new DateTime ],
			['id' => 36, 'cod' => 'EPSIC6', 'nit' => '809008362', 'name' => 'Entidad Promotora de Salud Pijaosalud EPSI',     'created_at' => new DateTime ],
			['id' => 37, 'cod' => 'EPS010', 'nit' => '800088702-2', 'name' => 'EPS Sura',     'created_at' => new DateTime ],
			['id' => 38, 'cod' => 'EPS017', 'nit' => '830003564-7', 'name' => 'Famisanar',     'created_at' => new DateTime ],
			['id' => 39, 'cod' => 'EAS027', 'nit' => '800112806-2', 'name' => 'Fondo de Pasivo Social de Ferrocarriles',     'created_at' => new DateTime ],
			['id' => 40, 'cod' => 'MIN001', 'nit' => '900462447-5', 'name' => 'Fondo de Solidaridad y Garantía Fosyga',     'created_at' => new DateTime ],
			['id' => 41, 'cod' => 'MIN002', 'nit' => '900462447-5', 'name' => 'Fondo de Solidaridad y Garantía Fosyga',     'created_at' => new DateTime ],
			['id' => 42, 'cod' => 'MIN003', 'nit' => '900462447-5', 'name' => 'Fondo de Solidaridad y Garantía Fosyga',     'created_at' => new DateTime ],
			['id' => 43, 'cod' => 'EPS037', 'nit' => '900156264-2', 'name' => 'Nueva EPS',     'created_at' => new DateTime ],
			['id' => 44, 'cod' => 'EPS002', 'nit' => '800130907-4', 'name' => 'Salud Total S.A.',     'created_at' => new DateTime ],
			['id' => 45, 'cod' => 'EPS033', 'nit' => '830074184-5', 'name' => 'Saludvida S.A EPS',     'created_at' => new DateTime ],
			['id' => 46, 'cod' => 'EPS018', 'nit' => '805001157-2', 'name' => 'Servicio Occidental de Salud S.O.S. S.A.',     'created_at' => new DateTime ],
			['id' => 47, 'cod' => 'RES011', 'nit' => '890980040-8', 'name' => 'Universidad de Antioquia',     'created_at' => new DateTime ],
			['id' => 48, 'cod' => 'RES012', 'nit' => '891080031-3', 'name' => 'Universidad de Córdoba',     'created_at' => new DateTime ],
			['id' => 49, 'cod' => 'RES005', 'nit' => '890102257-3', 'name' => 'Universidad del Atlántico',     'created_at' => new DateTime ],
			['id' => 50, 'cod' => 'RES009', 'nit' => '891500319-2', 'name' => 'Universidad del Cauca',     'created_at' => new DateTime ],
			['id' => 51, 'cod' => 'RES007', 'nit' => '890399010-6', 'name' => 'Universidad del Valle',     'created_at' => new DateTime ],
			['id' => 52, 'cod' => 'RES006', 'nit' => '890203183-0', 'name' => 'Universidad Industrial de Santander',     'created_at' => new DateTime ],
			['id' => 53, 'cod' => 'RES008', 'nit' => '899999063-3', 'name' => 'Universidad Nacional de Colombia',     'created_at' => new DateTime ],
			['id' => 54, 'cod' => 'RES014', 'nit' => '891800330-1', 'name' => 'Universidad Pedagógica y Tecnológica de Colombia - UPTC',     'created_at' => new DateTime ],


          ];

        DB::table('epss')->insert($epss);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
