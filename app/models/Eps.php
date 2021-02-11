<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Eps extends Model
{
    protected $table = "epss";
    protected $fillable = ['cod', 'nit', 'name'];
    protected $guarded = ['id'];
}
