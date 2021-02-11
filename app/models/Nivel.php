<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = "niveles";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
