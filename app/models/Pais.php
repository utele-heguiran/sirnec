<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "paises";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
