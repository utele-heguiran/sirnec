@extends('layouts.sirnec')
@section('guia') Familiares @endsection
@section('linkencabezado') @endsection

@section('titulo')
    EDITAR FAMILIAR
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
@endsection

@section('contenido')
        {!! Form::model($data, ['route' => ['familiar_actualizar', $data->id], 'method' => 'PUT', 'id'=>'familiar']) !!}

            <div class="row">
                <div class="col-md-3">{!! Form::label ('nacimiento', 'Fecha de Nacimiento') !!}{!! Form::date ('nacimiento', null, ['class' => 'form-control ', 'style' => 'margin-top:-5px', 'id' => 'nacimiento']) !!} </div>
                <div class="col-md-3">{!! Form::number('cedula', null, ['class' => 'form-control', 'required', 'style' => 'margin-top:26px', 'placeholder' => 'Cedula No.', 'id' => 'cedula']) !!} </center></div>
                <div class="col-md-6">{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required',  'placeholder' => 'Nombre del Familiar', 'style' => 'margin-top:26px']) !!} </div>
            </div>
            <div class="row">
                <div class="col-md-3">{!! Form::select ('parentesco_id', $parentescos, null, ['class'=>'form-control', 'id' => 'parentesco_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Parentesco']) !!}</div>
                <div class="col-md-6">{!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion', 'placeholder' => 'Direccion del Familiar', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-3"> {!! Form::tel('movil', null, ['class' => 'form-control', 'id' => 'movil', 'placeholder' => 'Movil', 'style' => 'margin-top:5px']) !!} </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">{!! Form::text('ocupacion', null, ['class' => 'form-control', 'id' => 'ocupacion', 'required',  'placeholder' => 'Ocupacion del Familiar', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-3">{!! Form::number('porcentpoliza', null, ['class' => 'form-control', 'style' => 'margin-top:5px', 'placeholder' => '% Poliza', 'id' => 'porcentpoliza']) !!} </center></div>
                <div class="col-md-3">{!! Form::number('porcentpolizacontingente', null, ['class' => 'form-control', 'style' => 'margin-top:5px', 'placeholder' => '% Contingente', 'id' => 'porcentpolizacontingente']) !!} </center></div>
                <div class="col-md-1"></div>
            </div>

                {!! Form::number('funcionario_id', $funcionario[0]->id, ['id' => 'funcionario_id' , 'hidden'] ) !!}
                {!! Form::number('familiar_id', $data->id, ['id' => 'familiar_id' , 'hidden'] ) !!}


            <div class="alert alert-primary" id="divmsg" style="display: none" role="alert" ></div>

            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" style="color:White;text-decoration:none;" href="{{ route('funcionarios_familia', ['id' => $funcionario[0]->id ]) }}">Close</a>
                <button type="submit" id="guardar" class="btn btn-primary btnenviar">Guardar</button>
            </div>

        {!! Form::close() !!}

@endsection

@section('scriptnecesario')
<script>

    $(document).ready(function(){

        //valida el formulario antes de envio id del boton
        $('#guardar').click(function(){

            var cedula = $('#cedula').val();
                if(cedula == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la Cedula del Familiar..' })
                    return false;
                }

                var name = $('#name').val();
                if(name == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Nombre del Familiar ..' })
                    return false;
                }

                var parentesco_id = $('#parentesco_id').val();
                if(parentesco_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Tipo de Parentesco ..' })
                    return false;
                }

                var movil = $('#movil').val();
                if(movil == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa el Numero Movil del Familiar ..' })
                    return false;
                }

                var ocupacion = $('#ocupacion').val();
                if(ocupacion == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese a la ocupacion del Familiar ..' })
                    return false;
                }

            var funcionario_id = $('#funcionario_id').val();
            var porcentpoliza = $('#porcentpoliza').val();

            document.getElementById('familiar').submit();
            });


        //mascaras de input
        jQuery(function($){
                $("#movil").mask("(999) 999-9999");
        });


    });
</script>
@endsection
