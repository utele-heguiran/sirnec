@extends('layouts.sirnec')
@section('guia') Reprocesos @endsection
@section('linkencabezado') @endsection


@section('titulo') 

@if (count($data) > 0)
    @foreach($data as $row)@endforeach
    LISTADO DE REPROCESOS GENERADOS EN EL CENTRO DE ACOPIO - {{ $row->nombredepartamento }}
    @else
    LISTADO DE REPROCESOS GENERADOS EN EL CENTRO DE ACOPIO
@endif

    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearreprocesos"><img class="img-responsiveid float-right" style="width: 3.7%; height: 3.7%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reprocesar.png')}}" title="Crear Reproceso" /></a>
    <a href="" data-toggle="modal" data-target="#reporteraft41"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 41" /></a> 
     
    
@endsection

@section('contenido')

        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                        <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:80%;" >
                            <thead>
                                <tr>
                                    <th>Creacion</th>
                                    <th>Identificacion No.</th>
                                    <th>No. Preparacion</th>
                                    <th>Sticker o Reproceso</th>
                                    <th>Observaciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:14px;">
                                @foreach($data as $row)
                                    <tr >
                                        <td>{{ $row->feccreacion }}</td>                              
                                        <td>{{ $row->nuip }}</td>                              
                                        <td>{{ $row->numpreparacion }}</td>  
                                        <td>{{ $row->numreproceso }}</td>                              
                                        <td>{{ $row->observaciones}}</td>                              
                                    </tr>
                                @endforeach  
                            </tbody>
                       </table>
                </div>
            </div> 
        </div>
    
        {{-- modal crear sts --}}
        <div class="modal fade bd-example-modal-lg" name='crearreprocesos' id="crearreprocesos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE REPROCESOS</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'reproceso_guardar', 'method'=>'POST', 'autocomplete'=> 'off', 'id' => 'reprocesocrear', 'name' => 'reprocesocrear' ]) !!}
                    <div class="modal-body">
                        
                        <div class="row" >
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">{!! Form::number('nuip', null, ['class' => 'form-control', 'id' => 'nuip', 'placeholder' => 'Identificacion No. ']) !!} </div>
                                    <div class="col-md-4">{!! Form::text('numpreparacion', null, ['class' => 'form-control', 'id' => 'numpreparacion', 'placeholder' => 'No. Preparacion']) !!} </div>
                                    <div class="col-md-4">{!! Form::text('numreproceso', null, ['class' => 'form-control', 'id' => 'numreproceso', 'placeholder' => 'No. Reproceso']) !!} </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
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
                                <a class="btn btn-info" href="{{ route('reprocesosacopio')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info" id="enviarreproceso">Crear Sts</button>
                            </div>
                        </div>
                        
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
        {{-- fin modal crear sts --}}

        {{-- modal generar raft 41 --}}
        <div class="modal fade bd-example-modal-lg" name='reporteraft41' id="reporteraft41" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR RAFT - 41</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'raft41pdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
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
                                <a class="btn btn-info" href="{{ route('reprocesosacopio')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info">Generar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
        {{-- fin modal generar raft 08  --}}
    
    
@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){

            //pone dentro de la ventana modal el focus en el input id numoficio
                $('#crearreprocesos').on('shown.bs.modal', function () {
                    $('#nuip').focus();
                });

            //valida el formulario antes de envio id del boton enviarcierredevolucion y id del formulario es cierredefinitivo

            $('#enviarreproceso').click(function(){

                var numpreparacion = $('#numpreparacion').val();
                var numreproceso =$('#numreproceso').val();
                
                if(numpreparacion == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ingrese el Numero de Preparacion Inicial ..' })
                    return false;
                }
                if(numreproceso == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ingrese el Nuemro de Sticker Utilizado para el Reproceso ..' })
                    return false;
                }
                
                document.getElementById('reprocesocrear').submit();
            });


        });
           
    </script>   
@endsection
