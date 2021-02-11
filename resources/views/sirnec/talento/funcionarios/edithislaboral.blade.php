@extends('layouts.sirnec')
@section('guia') Historia_Laboral @endsection
@section('linkencabezado') @endsection

@section('titulo')
    EDITAR HISTORIA LABORAL
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
@endsection

@section('contenido')
        {!! Form::model($data, ['route' => ['histlaboral_actualizar', $data->id], 'method' => 'PUT', 'id'=>'historialab']) !!}

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="margin-top: 13px"><center>Publica &nbsp&nbsp {!!Form::radio('tipoempresa', 1, true)!!}&nbsp&nbsp Privada  &nbsp&nbsp{!!Form::radio('tipoempresa', 2)!!}</center></div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4"><center>{!! Form::label ('fechaingreso', 'Fecha de Ingreso') !!}</center>{!! Form::date ('fechaingreso', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:-5px', 'id' => 'fechaingreso']) !!} </div>
                <div class="col-md-4"><center>{!! Form::label ('fecharetiro', 'Fecha de Retiro') !!}</center>{!! Form::date ('fecharetiro', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:-5px', 'id' => 'fecharetiro']) !!} </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required',  'placeholder' => 'Nombre de la Empresa', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">{!! Form::select ('pais_id', $paises, null, ['class'=>'form-control', 'id' => 'pais_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Pais']) !!}</div>
                <div class="col-md-4">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Departamento']) !!}  </div>
                <div class="col-md-3">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Municipio']) !!}</div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">{!! Form::text('telefono_fijo', null, ['class' => 'form-control', 'id' => 'telefono_fijo',  'placeholder' => 'Telefono Fijo', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-3"> {!! Form::tel('movil', null, ['class' => 'form-control', 'id' => 'movil', 'placeholder' => 'Movil', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-4"> {!! Form::email('email', null, [ 'placeholder' => 'Email','class' => 'form-control', 'id' => 'email', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-4">{!! Form::text('cargo', null, ['class' => 'form-control', 'id' => 'cargo',  'placeholder' => 'Cargo', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-4">{!! Form::text('dependencia', null, ['class' => 'form-control', 'id' => 'dependencia',  'placeholder' => 'Dependencia', 'style' => 'margin-top:5px']) !!} </div>
                <div class="col-md-4">{!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion',  'placeholder' => 'Direccion', 'style' => 'margin-top:5px']) !!} </div>
            </div>

                {!! Form::number('funcionario_id', $funcionario[0]->id, ['id' => 'funcionario_id' , 'hidden'] ) !!}


        <div class="modal-footer">
            <a type="button" class="btn btn-secondary" style="color:White;text-decoration:none;" href="{{ route('funcionarios_historialab', ['id' => $funcionario[0]->id ]) }}">Close</a>
            <button type="submit" id="guardar" class="btn btn-primary btnenviar">Guardar</button>
        </div>




        {!! Form::close() !!}

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            //trae los departamentos dependiendo del pais escogido
            $('select[name="pais_id"]').on('change', function(){
                //console.log('escuchando')
                var pais_id = $(this).val();
                if(pais_id){
                    console.log(pais_id);
                    $.ajax({
                        url:        '/getDepartamentos/'+pais_id,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            console.log(data);
                            $('select[name="departamento_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="departamento_id"]')
                                .append('<option value="'+key+'">'+ value + '</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="departamento_id"]').empty();
                }
            });

            //trae el municipio dependiendo del departamento escogido
            $('select[name="departamento_id"]').on('change', function(){
                    //console.log('escuchando')
                    var departamento_id = $(this).val();
                    if(departamento_id){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getMunucipios/'+departamento_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="municipio_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="municipio_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="municipio_id"]').empty();
                    }
                });


            //valida el formulario antes de envio id del boton
            $('#guardar').click(function(){

                var fechaingreso  = $('#fechaingreso').val();
                if( fechaingreso == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la Fecha de Ingreso ..' })
                    return false;
                }
                var fecharetiro  = $('#fecharetiro').val();
                if( fecharetiro == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la Fecha de Retiro..' })
                    return false;
                }
                var name  = $('#name').val();
                if( name == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Nombre de la Empresa a la cual Laboro..' })
                    return false;
                }
                var pais_id = $('#pais_id').val();
                if( pais_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Pais donde laboro..' })
                    return false;
                }
                var departamento_id = $('#departamento_id').val();
                if( departamento_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Departamento donde laboro..' })
                    return false;
                }
                var municipio_id = $('#municipio_id').val();
                if( municipio_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Municipio donde laboro..' })
                    return false;
                }
                var cargo = $('#cargo').val();
                if( cargo == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Cargo que desempeño..' })
                    return false;
                }
                var dependencia = $('#dependencia').val();
                if( dependencia == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la Dependencia en que laboro ..' })
                    return false;
                }

                document.getElementById('historialab').submit();
            });


            //mascaras de input
            jQuery(function($){
                $("#movil").mask("(999) 999-9999");
            });

            //pone el focus en el modal
            $('#crearhistlaboral').on('shown.bs.modal', function () {
                $('#fechaingreso').focus();
            })


        });
    </script>
@endsection
