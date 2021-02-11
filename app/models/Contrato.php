<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    use SoftDeletes; //Implementamos
    protected $table = "contratos";
    protected $fillable = [
     'funcionario_id',
     'clascontrato_id',
     'departamento_id',
     'oficina_id',
     'ubicacioncargo_id',
     'cargo_id',
     'especificacioncargos_id',
     'fechaviavilidad',
     'clase_id',
     'numactaposecion',
     'fechaactaposesion',
     'numresolucion',
     'fecharesolucion',
     'numcertificacion',
     'fechacertificacion',
     'oficpostulacion',
     'fechaoficiopostulacion',
     'fechainicial',
     'fechaterminacion',
     'certdiciplinariosprocuraduria',
     'certantecedentespolicia',
     'certresponsabilidadfiscalcontraloria',
     'certmedidascorrectivaspolicia',
     'funcionario2_id',
     'cargo2_id',
     'oficina2_id',
     'notaencargodespachos',
     'delegado1_id',
     'delegado2_id',
     'cordinador_id',
     'registrador_id',
     'estado_id',
     'user_id'];
    protected $guarded = ['id'];
}

