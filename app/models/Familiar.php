<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = "familiares";
    protected $fillable = ['funcionario_id', 'parentesco_id', 'cedula', 'name', 'nacimiento', 'movil', 'direccion', 'porcentpoliza', 'porcentpolizacontingente', 'ocupacion'  ];
    protected $guarded = ['id'];
}
