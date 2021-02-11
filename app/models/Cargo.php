<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = "cargos";
    protected $fillable = ['nivel_id', 'name', 'codigo', 'grado', 'descripcion', 'sueldo', 'cantidad'];
    protected $guarded = ['id'];

}
