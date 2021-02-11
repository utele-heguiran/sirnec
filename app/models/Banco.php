<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "bancos";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
