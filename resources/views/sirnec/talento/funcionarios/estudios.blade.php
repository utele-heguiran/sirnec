@extends('layouts.sirnec')
@section('guia') Estudios @endsection
@section('linkencabezado') @endsection

@section('titulo')
    Estudios de {{ $funcionario->name }}
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="{{ route('funcionarios')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/anterior.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearestudios"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/titulos.png')}}" title="Crear Estudios" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Nivel Educativo</th>
                            <th>Titulo</th>
                            <th>Institucion</th>
                            <th>Estado</th>
                            <th>Semestres</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->nombreniveleducativo }} </td>
                                <td> {{ $row->nombretitulosdeformacion }} </td>
                                <td> {{ $row->institucion }} </td>
                                <td>
                                    @if ($row->obtuvotitulo == 1) Culminado @else En Proceso @endif
                                </td>
                                <td> {{ $row->semestres }} </td>
                                <td>
                                    <a href="{{ route('estudio_borrar', ['id' => $row->id ]) }}" title="Eliminar Estudio"><span style="color:#8B0000;"><i class="fa fa-eraser" ></i></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- modal creacion de estudios --}}
    <div class="modal fade bd-example-modal-xl" id="crearestudios" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            {!! Form::open(['method'=>'GET']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Crear Estudio al Funcionario {{ $funcionario->name }}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                            <div class="row">
                                <div class="col-md-3">{!! Form::select ('niveleducativo_id', $niveleducativo, null, ['class'=>'form-control', 'id' => 'niveleducativo_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Nivel Educativo']) !!}  </div>
                                <div class="col-md-5">{!! Form::select ('titulosdeformacion_id', $titulos, null, ['class'=>'form-control', 'id' => 'titulosdeformacion_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Titulo Obtenido']) !!}  </div>
                                <div class="col-md-4">{!! Form::text('institucion', null, ['class' => 'form-control', 'id' => 'institucion', 'required',  'placeholder' => 'Nombre de la instutuccion Educativa', 'style' => 'margin-top:5px']) !!} </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">{!! Form::date ('fechainicio', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:5px', 'id' => 'fechainicio']) !!} </div>
                                <div class="col-md-3">{!! Form::date ('fechafinal', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:5px', 'id' => 'fechafinal']) !!} </div>
                                <div class="col-md-4" style="margin-top: 13px"><center>Completo &nbsp&nbsp {!!Form::radio('obtuvotitulo', 1, true, ['id' => 'obtuvotitulo'] )!!}&nbsp&nbsp Incompleto  &nbsp&nbsp{!!Form::radio('obtuvotitulo', 2 )!!}</center></div>
                                <div class="col-md-2" id="inforsemestres" style="display:none">{!! Form::number('semestres', null, ['class' => 'form-control', 'id' => 'semestres', 'placeholder'=>"Semestres" , 'style' => 'margin-top:5px']) !!} </div>
                            </div>
                            {!! Form::number('funcionario_id', $funcionario->id, ['id' => 'funcionario_id' , 'hidden'] ) !!}
                    </div>

                    <div class="alert alert-primary" id="divmsg" style="display: none" role="alert" ></div>



                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" style="color:White;text-decoration:none;" href="{{ route('funcionarios_estudios', ['id' => $funcionario->id ]) }}">Close</a>
                        <button type="submit" id="guardar" class="btn btn-primary btnenviar">Guardar</button>
                    </div>

                </div>

            {!! Form::close() !!}

        </div>
    </div>
    {{-- fin modal creacion de estuduios --}}

    <div class="alert alert-primary" id="divmsg" style="display: none" role="alert" ></div>

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            //trae el titulo dependiendo del nivel de estudios escogido
            $('select[name="niveleducativo_id"]').on('change', function(){
                    //console.log('escuchando')
                    var niveleducativo_id = $(this).val();
                    if(niveleducativo_id){
                        //console.log(niveleducativo_id);
                        $.ajax({
                            url:        '/getTitulos/'+niveleducativo_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="titulosdeformacion_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="titulosdeformacion_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="titulosdeformacion_id"]').empty();
                    }
                });


            //debe estar para enviar peticiones ajax
            $.ajaxSetup({ headers: {'X-CRFT-TOKEN': $('meta[name="csrf-token"]').attr('content') } });


            $(".btnenviar").click(function(e){
                e.preventDefault();

                var funcionario_id = $('#funcionario_id').val();
                var niveleducativo_id = $('#niveleducativo_id').val();
                var titulosdeformacion_id = $('#titulosdeformacion_id').val();
                var institucion = $('#institucion').val();
                var fechainicio = $('#fechainicio').val();
                var fechafinal = $('#fechafinal').val();
                var obtuvotitulo = $('input:radio[name=obtuvotitulo]:checked').val();
                var semestres = $('#semestres').val();

                if(niveleducativo_id == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Nivel Educativo ..' }) }
                if(titulosdeformacion_id == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el titulo de Formacion Obtenido ..' }) }
                if(institucion == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa la Institucion Educativa que Otorgo el Titulo ..' }) }
                if(fechainicio == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa la fecha de Inicio ..' }) }
                if(fechafinal == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa la fecha Final ..' }) }

                $.ajax({
                    url:        '/getEstudios/',
                    type:       'GET',
                    data:   { funcionario_id:funcionario_id, niveleducativo_id:niveleducativo_id, titulosdeformacion_id:titulosdeformacion_id, institucion:institucion, fechainicio:fechainicio, fechafinal:fechafinal, obtuvotitulo:obtuvotitulo, semestres:semestres },
                    success:    function(data){
                        console.log(data);
                        mostrarMensaje(data.mensaje);
                        limpiarCampos();
                    }
                });


            });

            function mostrarMensaje(mensaje){
                $("#divmsg").empty(); // limpia el contenido
                $("#divmsg").append("<p>"+mensaje+"</p>");
                $("#divmsg").show(500);
                $("#divmsg").hide(5000);
            }

            function limpiarCampos (){
                $('#niveleducativo_id').val('');
                $('#titulosdeformacion_id').val('');
                $('#institucion').val('');
                $('#fechainicio').val('');
                $('#fechafinal').val('');
            }

            $('input:radio[name=obtuvotitulo]').on('change', function(){
                var titulo = $('input:radio[name=obtuvotitulo]:checked').val();
                if (titulo == 2 ) {
                     $("#inforsemestres").show();
                 } else {
                     $("#inforsemestres").hide();
                 }

            });








        });
    </script>
@endsection
