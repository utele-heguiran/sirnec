<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";
    protected $fillable = ['cedula', 'deparcedula_id', 'municcedula_id', 'departamento_id', 'expedicion', 'name', 'nacimiento', 'paisnacimiento_id', 'deparnacimiento_id', 'municnacimiento_id', 'genero_id', 'estadocivil_id', 'clasmilitar_id', 'libreta_militar', 'distrito', 'rh_id', 'direccion', 'barrio_id','telefono_fijo', 'movil', 'emailpersonal', 'emailcorporativo', 'name_contacto', 'movil_contacto', 'personasacargo', 'incrementoantiguedad', 'auxiliotrasporte', 'ley4ta', 'primatecnicafs', 'primatecnicanfs', 'primageografica', 'auxilioalimentacion', 'banco_id', 'tipocuenta_id', 'numcuentabanco', 'estado_id', 'eps_id', 'pension_id', 'caja_id', 'arl_id' ];
    protected $guarded = ['id'];
}
