<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Materialfaltante extends Model
{
    protected $table = "materialesfaltantes";
    protected $fillable = ['lote_id','departamento_id', 'oficina_id', 'numlote', 'feccrealote', 'numpreparacion', 'numoficenvio', 'claseformatos_id', 'estado_id', 'user_id'];
    protected $guarded = ['id'];
}
