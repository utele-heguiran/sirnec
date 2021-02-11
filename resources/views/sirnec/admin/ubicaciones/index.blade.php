@extends('layouts.sirnec')
@section('guia') Ubicaciones @endsection
@section('linkencabezado') @endsection

@section('titulo')
    LISTADO DE LAS UBICACIONES DE LOS CARGOS
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearubicacion"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/ubicacion.png')}}" title="Crear Ubicaciones" /></a>

@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%;font-size: 13px" >
                    <thead>
                        <tr >
                            <th>Departamento </th>
                            <th>NIvel </th>
                            <th>Oficina</th>
                            <th>Cargo </th>
                            <th>Especificaciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->nombredepartamento }}</td>
                                <td> {{ $row->nombrenivel }} </td>
                                <td> {{ $row->nombreoficina }} </td>
                                <td> {{ $row->nombrecargo }} {{ $row->codigocargo }}-{{ $row->gradocargo }}</td>
                                <td> {{ $row->especificacionareafuncional  }} </td>
                                <td>
                                    {!! Form::model($row, ['method' => 'delete', 'route' => ['ubicacion_eliminar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $row->id) !!}
                                        <button  style="background-color:#FFFFFF;border: none;" title="Eliminar este registro"><span style="color: red;"><i class="fas fa-trash-alt"></i></span></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal creacion ubicacion --}}
    <div class="modal fade bd-example-modal-lg" name='crearubicacion' id="crearubicacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE UBICACIONES</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => ['ubicaciones_Guardar'], 'method' => 'post', 'id' => 'for_ubicacion', 'name' => 'for_ubicacion' ]) !!}

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Departamento']) !!}  </div>
                        <div class="col-md-4">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                        <div class="col-md-5">{!! Form::select ('oficina_id', $oficinas, null, ['class'=>'form-control', 'id' => 'oficina_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione la Oficina']) !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">{!! Form::select ('nivel_id', $niveles, null, ['class'=>'form-control', 'id' => 'nivel_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Nivel']) !!}  </div>
                        <div class="col-md-6">{!! Form::select ('cargo_id', $cargos, null, ['class'=>'form-control', 'id' => 'cargo_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Cargos ']) !!}  </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">{!! Form::select ('especificacioncargos_id', $especificacioncargo, null, ['class'=>'form-control', 'id' => 'especificacioncargos_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Area Funcional ']) !!}  </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info" id="confirmar">Guardar</button>

                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- fin modal creacion Ubicaciones  --}}



@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

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

            //trae la oficina dependiendo del municipio escogido
                $('select[name="municipio_id"]').on('change', function(){
                    //console.log('escuchando')
                    var municipio_id = $(this).val();
                    if(municipio_id){
                        //console.log(municipio_id);
                        $.ajax({
                            url:        '/getOficinasregistraduria/'+municipio_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="oficina_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="oficina_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="oficina_id"]').empty();
                    }
                });

            //trae los cargos dependiendo el nivel escogido
                $('select[name="nivel_id"]').on('change', function(){
                    //console.log('escuchando')
                    var nivel_id = $(this).val();
                    if(nivel_id){
                        //console.log(nivel_id);
                        $.ajax({
                            url:        '/getCargo/'+nivel_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="cargo_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="cargo_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="cargo_id"]').empty();
                    }
                });

            //trae las especificaciones de los cargos cargos dependiendo el cargo escogido
                $('select[name="cargo_id"]').on('change', function(){
                    //console.log('escuchando')
                    var cargo_id = $(this).val();
                    if(cargo_id){
                        //console.log(cargo_id);
                        $.ajax({
                            url:        '/getEspecificacioncargo/'+cargo_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="especificacioncargos_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="especificacioncargos_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="especificacioncargos_id"]').empty();
                    }
                });

            //valida el formulario antes de envio
                $("#confirmar").on("click", function(){

                    if(for_ubicacion.departamento_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Departamento en donde se encuentra el cargo!', })
                        return false;
                    }
                    if(for_ubicacion.municipio_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Municipio en donde se encuentra el cargo!', })
                        return false;
                    }
                    if(for_ubicacion.oficina_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger la Oficina en donde se encuentra el cargo  !', })
                        return false;
                    }
                    if(for_ubicacion.nivel_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Nivel de Cargo a Escoger !', })
                        return false;
                    }
                    if(for_ubicacion.cargo_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Cargo a Escoger  !', })
                        return false;
                    }
                    if(for_ubicacion.especificacioncargos_id.value == ''){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Area Funcional del Cual dependera el Cargo   !', })
                        return false;
                    }


                });

            // ventana de confirmacion de eliminado de registros
                $('table[data-form="formulario"]').on('click', '.form-delete', function(e){
                    e.preventDefault();
                    var $form=$(this);

                    Swal.fire({
                        title: 'Desea eliminar la Ubicacion?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si!!',
                        cancelButtonText: 'No!!',
                        }).then((result) => {
                        if (result.value) {
                            $form.submit(),
                            Swal.fire(
                            // 'Eliminado!',
                            // 'El Usuario Ha sido Eliminado.',
                            // 'success'
                            )
                        }
                    })
                });





        });

    </script>
@endsection

