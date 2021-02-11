<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TablaRhsSeeder::class);
        $this->call(TablaFondopensionesSeeder::class);
        $this->call(TablaTipocuentasSeeder::class);
        $this->call(TablaBancosSeeder::class);
        $this->call(TablaEpssSeeder::class);
        $this->call(TablaClaslibmilsSeeder::class);
        $this->call(TablaArlsSeeder::class);
        $this->call(TablaNivelesSeeder::class);
        $this->call(TablaClaseformatosSeeder::class);
        $this->call(TablaMotivosdestrucionesSeeder::class);
        $this->call(TablaPaisesSeeder::class);
        $this->call(TablaDepartamentosSeeder::class);
        $this->call(TablaEstadosCivilesSeeder::class);
        $this->call(TablaEstadosSeeder::class);
        $this->call(TablaGenerosSeeder::class);
        $this->call(TablaMunicipiosSeeder::class);
        $this->call(TablaBarriosSeeder::class);
        $this->call(TablaNiveleseducativosSeeder::class);
        $this->call(TablaParentescosSeeder::class);
        $this->call(TablaTiposusuariosSeeder::class);
        $this->call(TablaTitulosdeformacionesSeeder::class);
        $this->call(TablaClaseoficinasSeeder::class);
        $this->call(TablaOficinasSeeder::class);
        $this->call(TablaUsuariosSeeder::class);
        $this->call(TablaClasedevolucionesSeeder::class);
        $this->call(TablaClasetramitesSeeder::class);
        $this->call(TablaTipotramitesSeeder::class);
        $this->call(TablaClaseformasSeeder::class);
        $this->call(TablaFuncionariosSeeder::class);
        $this->call(TablaMesSeeder::class);
        $this->call(TablaOrigenrechazosSeeder::class);
        $this->call(TablaCodigosrechazosSeeder::class);
        $this->call(TablaEstadisticaregistrosSeeder::class);
        $this->call(TablaCompensacioncajasSeeder::class);
        $this->call(TablaCargosSeeder::class);
        $this->call(TablaEspecificacioncargosSeeder::class);
        $this->call(TablaClascontratosSeeder::class);
        $this->call(TablaUbicacioncargosSeeder::class);

    }
}
