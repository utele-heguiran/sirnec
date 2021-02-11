<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Compensacioncajas extends Model
{
    protected $table = "compensacioncajas";
    protected $fillable = ['cod', 'name', 'departamento_id'];
    protected $guarded = ['id'];
}
