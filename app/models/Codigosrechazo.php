<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Codigosrechazo extends Model
{
    protected $table = "codigosrechazos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
    
}
