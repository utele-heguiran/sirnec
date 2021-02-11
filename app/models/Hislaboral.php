<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hislaboral extends Model
{
    protected $table = "hislaborales";
    protected $fillable = ['funcionario_id', 'name', 'tipoempresa', 'pais_id', 'departamento_id', 'municipio_id', 'email', 'telefono_fijo', 'movil', 'fechaingreso', 'fecharetiro', 'cargo', 'dependencia', 'direccion'];
    protected $guarded = ['id'];
}
