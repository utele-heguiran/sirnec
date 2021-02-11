@extends('layouts.sirnec')
@section('guia') Bitacora @endsection
@section('linkencabezado') @endsection


@section('titulo') 

@if (count($data) > 0)
    @foreach($data as $row)@endforeach
    BITACORA DEL CENTRO DE ACOPIO - {{ $row->nombredepartamento }}
    @else
    BITACORA DEL CENTRO DE ACOPIO
@endif

    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearbitacora"><img class="img-responsiveid float-right" style="width: 3%; height: 3%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/bitacora.png')}}" title="Crear Bitacora" /></a>
    <a href="" data-toggle="modal" data-target="#reporteraft42"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 42" /></a> 
    
@endsection

@section('contenido')

        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                        <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:80%;" >
                            <thead>
                                <tr>
                                    <th>Creacion</th>
                                    <th>Factor</th>
                                    <th>Observaciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:14px;">
                                @foreach($data as $row)
                                    <tr >
                                        <td>{{ $row->feccreacion }}</td>                              
                                        <td>{{ $row->factor }}</td>                              
                                        <td>{{ $row->observaciones}}</td>                              
                                    </tr>
                                @endforeach  
                            </tbody>
                       </table>
                </div>
            </div> 
        </div>
    
        {{-- modal crear sts --}}
        <div class="modal fade bd-example-modal-lg" name='crearbitacora' id="crearbitacora" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREAR ANOTACION A LA BITACORA </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'bitacora_guardar', 'method'=>'POST', 'autocomplete'=> 'off', 'id' => 'bitacoracrear', 'name' => 'bitacoracrear' ]) !!}
                    <div class="modal-body">
                        
                        <div class="row" >
                            <div class="col-md-3"></div>
                            <div class="col-md-6">{!! Form::text('factor', null, ['class' => 'form-control', 'id' => 'factor', 'placeholder' => 'Factor ']) !!} </div>
                            <div class="col-md-3"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Observaciones </span>
                                    </div>
                                    <textarea class="form-control" name="observaciones" id="observaciones" aria-label="With textarea" ></textarea>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12" style="padding: 10px; text-align: center;">
                                <a class="btn btn-info" href="{{ route('bitacora')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info" id="enviarbitacora">Crear Sts</button>
                            </div>
                        </div>
                        
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
        {{-- fin modal crear sts --}}

        {{-- modal generar raft 42 --}}
        <div class="modal fade bd-example-modal-lg" name='reporteraft42' id="reporteraft42" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR RAFT - 42</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'raft42pdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <center>
                                        <strong>Fecha Inicio del Reporte</strong>
                                        {!! Form::date('fechainicial', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
                                    </center>
                                </div>
                                <div class="col-md-3">
                                    <center>
                                        <strong>Fecha Final del Reporte</strong>
                                        {!! Form::date('fechafinal', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
                                    </center>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <a class="btn btn-info" href="{{ route('bitacora')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info">Generar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
        {{-- fin modal generar raft 42  --}}
    
    
@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){

            //pone dentro de la ventana modal el focus en el input 
                $('#crearbitacora').on('shown.bs.modal', function () {
                    $('#factor').focus();
                });

            //valida el formulario antes de envio 

            $('#enviarbitacora').click(function(){

                var factor = $('#factor').val();
                var observaciones =$('#observaciones').val();
                
                if(factor == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ingrese el Factor determinante en la afectacion a la produccion del centro de Acopio ..' })
                    return false;
                }
                if(observaciones == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ingrese las Observaciones que generaron la afectacion en la produccion del centro de Acopio ..' })
                    return false;
                }
                
                document.getElementById('bitacoracrear').submit();
            });


        });
           
    </script>   
@endsection
