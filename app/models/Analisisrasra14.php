<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Analisisrasra14 extends Model
{
    protected $table = "analisisrasra14";
    protected $fillable = ['departamento_id', 'ano', 'clase14o13', 'feccreacion', 'analisis1trimestre', 'accionmejora1trimestre', 'user_id1trim', 'analisis2trimestre', 'accionmejora2trimestre', 'user_id2trim', 'analisis3trimestre', 'accionmejora3trimestre', 'user_id3trim', 'analisis4trimestre', 'accionmejora4trimestre', 'user_id4trim', 'user_id'  ];
    protected $guarded = ['id'];
}
