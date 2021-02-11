<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Motivosdestrucion extends Model
{
    protected $table = "motivosdestrucciones";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
