<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "logs";
    protected $fillable = ['usuario_id', 'departamento_id', 'oficina_id', 'descripcion'];
    protected $guarded = ['id'];
}
