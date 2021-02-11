<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Clasecontrato extends Model
{
    protected $table = "clascontratos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
