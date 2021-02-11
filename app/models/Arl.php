<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Arl extends Model
{
    protected $table = "arls";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
