<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Tipocuenta extends Model
{
    protected $table = "tipocuentas";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
