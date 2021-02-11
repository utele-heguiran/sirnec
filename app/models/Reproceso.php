<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reproceso extends Model
{
    protected $table = "reprocesos";
    protected $fillable = ['departamento_id', 'oficina_id', 'feccreacion', 'nuip', 'numpreparacion', 'numreproceso', 'factor', 'observaciones', 'estado_id', 'user_id'  ];
    protected $guarded = ['id'];
}
