<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Distribucion extends Model
{
    protected $table = "distribuciones";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
