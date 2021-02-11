<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Especificacioncargo extends Model
{
    protected $table = "especificacioncargos";
    protected $fillable = [ 'nivel_id', 'cargo_id', 'jefeinmediato', 'areafuncional', 'proposito', 'funcionesesenciales', 'conocimientosbasicos', 'competenciascomportamentales', 'experiencia', 'educacion', 'equivalencias'];
    protected $guarded = ['id'];
}
