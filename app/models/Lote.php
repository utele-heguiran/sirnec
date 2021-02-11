<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = "lotes";
    protected $fillable = ['departamento_id', 'oficina_id', 'numlote', 'feccrealote', 'fecenvlote', 'fecrecacopio', 'cantfaltantes', 'cantanulados', 'cantdiastrasporte', 'cantdecasrecibidas', 'numoficenvio', 'novedad', 'user_id'];
    protected $guarded = ['id'];
}
