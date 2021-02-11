@extends('layouts.sirnec')
@section('guia') Familiares @endsection
@section('linkencabezado') @endsection

@section('titulo')
    Familia de {{ $funcionario->name }}
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="{{ route('funcionarios')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/anterior.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearfamilia"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/family.png')}}" title="Crear Familiares" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Movil</th>
                            <th>Parentesco</th>
                            <th>% Poliza</th>
                            <th>% Contingente Poliza</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->name }} </td>
                                <td> {{ $row->cedula }} </td>
                                <td> {{ $row->movil }} </td>
                                <td> {{ $row->nombreparentesco }} </td>
                                <td> {{ $row->porcentpoliza }} </td>
                                <td> {{ $row->porcentpolizacontingente }} </td>
                                <td>
                                    <center>
                                    <a href="{{ route('funcionarios_editar_familia', ['id' => $row->id ]) }}" title="Editar el Familiar"><span style="color: #007BFF;"><i class="fas fa-pencil-alt" ></i></span></a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- modal creacion de familiares --}}
    <div class="modal fade bd-example-modal-xl" id="crearfamilia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">


            {!! Form::open(['route' => 'familiares_guardar', 'id'=>'fami', 'name' => 'Fami', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Crear Familiar de {{ $funcionario->name }}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

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

                            {!! Form::number('funcionario_id', $funcionario->id, ['id' => 'funcionario_id' , 'hidden'] ) !!}

                    </div>

                    <div class="alert alert-primary" id="divmsg" style="display: none" role="alert" ></div>

                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" style="color:White;text-decoration:none;" href="{{ route('funcionarios_familia', ['id' => $funcionario->id ]) }}">Close</a>
                        <button type="submit" id="guardar" class="btn btn-primary btnenviar">Guardar</button>
                    </div>

                </div>

            {!! Form::close() !!}

        </div>
    </div>

    {{-- fin modal creacion de familiaress --}}

    <div class="alert alert-primary" id="divmsg" style="display: none" role="alert" ></div>

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
                var total = $('#total').val();
                var totalisimo = parseInt(porcentpoliza)+parseInt(total);
                if(totalisimo >= 101){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'La sumatoria de los porcentajes de Polizas supera el 100% por favor revise ..' })
                    return false;
                }

                document.getElementById('fami').submit();
            });


            //mascaras de input
            jQuery(function($){
                $("#movil").mask("(999) 999-9999");
            });

            //pone el focus en el modal
            $('#crearfamilia').on('shown.bs.modal', function () {
                $('#cedula').focus();
            })


        });
    </script>
@endsection
