<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sts extends Model
{
    protected $table = "stss";
    protected $fillable = ['departamento_id', 'oficina_id', 'numsts', 'feccreasts', 'fecenvsts', 'tipotramite_id', 'cantidadsts', 'estado_id', 'fecverifists', 'observaciones', 'user_id'  ];
    protected $guarded = ['id'];
}



