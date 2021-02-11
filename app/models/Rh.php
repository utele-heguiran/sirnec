<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Rh extends Model
{
    protected $table = "rhs";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
