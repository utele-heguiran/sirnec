<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Estadisticaregistro extends Model
{
    protected $table = "estadisticaregistros";
    protected $fillable = [
				            'fechainic',
                            'fechafin',
                            'fechacreacion',
				            'mes_id',
				            'ano',
                            'departamento_id',
                            'municipio_id',
				            'oficina_id',
				            'rcn_masculino',
				            'rcn_femenino',
				            'rcn_mayores',
				            'rcn_menores',
				            'rcn_indigenas',
				            'rcn_afro',
				            'rcn_decreto290',
				            'rcn_certificaciones',
				            'rcn_rango_1_inic',
				            'rcn_rango_1_fin',
				            'rcn_rango_2_inic',
				            'rcn_rango_2_fin',
				            'rcn_rango_3_inic',
				            'rcn_rango_3_fin',
				            'rcn_rango_4_inic',
				            'rcn_rango_4_fin',
				            'rcn_rango_5_inic',
				            'rcn_rango_5_fin',
				            'rcn_malos',
				            'rcn_reg_malos',
				            'rcm_inscritos',
				            'rcm_certificaciones',
				            'rcm_rango_1_inic',
				            'rcm_rango_1_fin',
				            'rcm_rango_2_inic',
				            'rcm_rango_2_fin',
				            'rcm_rango_3_inic',
				            'rcm_rango_3_fin',
				            'rcm_malos',
				            'rcm_reg_malos',
				            'rcd_masculino',
				            'rcd_femenino',
				            'rcd_mayores',
				            'rcd_menores',
				            'rcd_indigenas',
				            'rcd_afro',
				            'rcd_certificaciones',
				            'rcd_rango_1_inic',
				            'rcd_rango_1_fin',
				            'rcd_rango_2_inic',
				            'rcd_rango_2_fin',
				            'rcd_rango_3_inic',
				            'rcd_rango_3_fin',
				            'rcd_malos',
				            'rcd_reg_malos',
							'raft30',
							'raft29',
							'rcn1danado',
							'rcn2danado',
							'rcn3danado',
							'rcn4danado',
							'rcn5danado',
							'rcn6danado',
							'rcn7danado',
							'rcn8danado',
							'rcn9danado',
							'rcn10danado',
							'rcn11danado',
							'rcm1danado',
							'rcm2danado',
							'rcm3danado',
							'rcm4danado',
							'rcm5danado',
							'rcm6danado',
							'rcm7danado',
							'rcm8danado',
							'rcm9danado',
							'rcm10danado',
							'rcm11danado',
							'rcd1danado',
							'rcd2danado',
							'rcd3danado',
							'rcd4danado',
							'rcd5danado',
							'rcd6danado',
							'rcd7danado',
							'rcd8danado',
							'rcd9danado',
							'rcd10danado',
							'rcd11danado',
    ];
    protected $guarded = ['id'];

    public function oficina()
    {
        return $this->belongsTo(Oficina::class);
    }

    public function scopeRegpordep($consulta){
        return $consulta->where('departamento_id', auth()->user()->departamento_id);
    }


}
