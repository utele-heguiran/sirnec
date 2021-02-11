<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Origenrechazo extends Model
{
    protected $table = "origenrechazos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
