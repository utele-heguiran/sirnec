<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Produccionespera extends Model
{
    protected $table = "produccionespera";
    protected $fillable = ['departamento_id', 'oficina_id', 'fechinicial', 'fechfinal', 'feccreacion', 'matsinrecepcionarcomprob', 'matsinrecepcionarescaneo', 'escaneo_pvc', 'escaneo_renovc', 'escaneo_rectc', 'escaneo_dupc', 'escaneo_pvt', 'escaneo_renovt', 'escaneo_rectt', 'escaneo_dupt', 'escaneo_noprocesado', 'escaneo_total', 'comprobado_pvc', 'comprobado_renovc', 'comprobado_rectc', 'comprobado_dupc', 'comprobado_pvt', 'comprobado_renovt', 'comprobado_rectt', 'comprobado_dupt', 'comprobado_noprocesado', 'comprobado_total' ];
    protected $guarded = ['id'];
}


