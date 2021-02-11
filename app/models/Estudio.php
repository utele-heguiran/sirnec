<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Estudio extends Model
{
    use SoftDeletes; //Implementamos
    protected $table = "estudios";
    protected $fillable = ['funcionario_id', 'niveleducativo_id', 'titulosdeformacion_id', 'fechainicio', 'fechafinal', 'institucion', 'obtuvotitulo', 'semestres' ];
    protected $guarded = ['id'];

}
