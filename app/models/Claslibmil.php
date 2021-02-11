<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Claslibmil extends Model
{
    protected $table = "claslibmils";
    protected $fillable = ['name'];
    protected $guarded = ['id'];
}
