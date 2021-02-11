<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Posgrabacion extends Model
{
    protected $table = "posgrabaciones";
    protected $fillable = ['departamento_id', 'municipio_id', 'oficina_id', 'mes_id', 'ano', 'feccreacion', 'totalinscritosrcn', 'totalinscritosrcm', 'totalinscritosrcd', 'total_posgrabacion_rcn', 'total_posgrabacion_rcm', 'total_posgrabacion_rcd', 'total_modificacion_rcn', 'total_modificacion_rcm', 'total_modificacion_rcd', 'user_id'  ];
    protected $guarded = ['id'];
}
