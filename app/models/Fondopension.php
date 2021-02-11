<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Fondopension extends Model
{
    protected $table = "fondopensiones";
    protected $fillable = ['cod', 'nit', 'name'];
    protected $guarded = ['id'];
}
