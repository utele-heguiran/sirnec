<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamentos";
    protected $fillable = ['name', 'pais_id', 'path'];
    protected $guarded = ['id'];
}
