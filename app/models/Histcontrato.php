<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Histcontrato extends Model
{
    protected $table = "histcontratos";
    protected $fillable = ['funcionario_id'];
    protected $guarded = ['id'];
}
