<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ubicacioncargo extends Model
{
    use SoftDeletes; //Implementamos
    protected $table = "ubicacioncargos";
    protected $fillable = ['oficina_id', 'cargo_id', 'especificacioncargos_id','funcionario_id', 'funcionarioclase4_id', 'funcionarioclase5_id', 'funcionarioclase6_id', 'estado_id'];
    protected $guarded = ['id'];
}
