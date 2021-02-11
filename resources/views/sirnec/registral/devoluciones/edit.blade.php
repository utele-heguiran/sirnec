@extends('layouts.sirnec')
@section('guia') Seguimiento a la Devolucion @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    SEGUIMIENTO A LA DEVOLUCION 
@endsection
@section('subtitulo') 
<span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Nombre del Ciudadano :</span>
    {{ $devolucion[0]->name }}
    <a href="" data-toggle="modal" data-target="#cerrardevolucion"><input type="button" class="btn btn-outline-primary float-right" value="Cerrar Devolucion" style="margin-right: 15px; margin-top: -10px"></a> 
@endsection

@section('contenido')
   
    {!! Form::model($devolucion, ['route' => ['devolucion_actualizar', $devolucion[0]->id], 'method' => 'PUT']) !!}
        
        <div class="modal-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="accordion" id="accordionExample">
                        
                        <div class="card ">
                          <div class="card-header" style="background:#F6F8FB" id="headingOne">
                            <h2 class="mb-0">
                              <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                Seguimiento No.1
                              </button>
                            </h2>
                          </div>
                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                @if (empty($devolucion[0]->observacion_1))
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">Observacion</span>
                                        </div>
                                        <textarea class="form-control" name="observacion_1" aria-label="With textarea"></textarea>
                                    </div>
                                @else
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $devolucion[0]->fec_observacion_1 }}</span>
                                        </div>
                                        <textarea disabled class="form-control" name="observacion_1" aria-label="With textarea" >{{ $devolucion[0]->observacion_1 }}</textarea>
                                    </div>
                                @endif
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-header " style="background:#F6F8FB" id="headingTwo">
                            <h2 class="mb-0">
                              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                Seguimiento No.2
                              </button>
                            </h2>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                @if (empty($devolucion[0]->observacion_2))
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">Observacion</span>
                                        </div>
                                        <textarea class="form-control" name="observacion_2" aria-label="With textarea"></textarea>
                                    </div>
                                @else
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $devolucion[0]->fec_observacion_2 }}</span>
                                        </div>
                                        <textarea disabled class="form-control" name="observacion_2" aria-label="With textarea" >{{ $devolucion[0]->observacion_2 }}</textarea>
                                    </div>
                                @endif
                            </div>
                          </div>
                        </div>
                        
                        <div class="card">
                          <div class="card-header" style="background:#F6F8FB" id="headingThree">
                            <h2 class="mb-0">
                              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                Seguimiento No.3
                              </button>
                            </h2>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                @if (empty($devolucion[0]->observacion_3))
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">Observacion</span>
                                        </div>
                                        <textarea class="form-control" name="observacion_3" aria-label="With textarea"></textarea>
                                    </div>
                                @else
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $devolucion[0]->fec_observacion_3 }}</span>
                                        </div>
                                        <textarea disabled class="form-control" name="observacion_3" aria-label="With textarea" >{{ $devolucion[0]->observacion_3 }}</textarea>
                                    </div>
                                @endif
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Departamento :</span>
                        </div>
                        <div class="col-md-8">
                            {{ ucwords(strtolower($departamento[0]->name)) }} || {{ $municipio[0]->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">No. de Identificacion :</span>
                        </div>
                        <div class="col-md-8">
                            {{ $devolucion[0]->numdocumento}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">No. de Preparacion :</span>
                        </div>
                        <div class="col-md-8">
                            {{ $devolucion[0]->numpreparacion}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Clase Devolucion :</span>
                        </div>
                        <div class="col-md-8">
                            {{ $clasedevol[0]->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Tipo de Tramite :</span>
                        </div>
                        <div class="col-md-8">
                            {{ ucwords(strtolower($clasetramite[0]->name)) }} ||{{ ucwords(strtolower($tramite[0]->name)) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Fecha de Preparacion:</span>
                        </div>
                        <div class="col-md-8">
                            {{ $devolucion[0]->fecpreparacion }} 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Oficio Devolucion :</span>
                        </div>
                        <div class="col-md-8">
                            {{ $devolucion[0]->numoficiodevolucion }} 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Fecha Devolucion :</span>
                        </div>
                        <div class="col-md-8">
                            {{ $devolucion[0]->fecdevolucion }} 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('devoluciones')}}"><input type="button" class="btn btn-outline-secondary" value="Cancelar"></a>
                        <button type="submit" class="btn btn-outline-success" id="confirmar">Guardar Observacion</button>
                    </div>
                    <hr>
                </div>
            </div>  
            {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}   
        </div>
    {!! Form::close() !!} 
                         

    {{-- modal para el cierre de la devolucion  --}}
    

    <div class="modal fade bd-example-modal-lg" name='cerrardevolucion' id="cerrardevolucion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                {!! Form::model($devolucion, ['route' => ['devolucion_actualizar', $devolucion[0]->id], 'method' => 'PUT', 'id' => 'cierredefinitivo', 'name' => 'cierredefinitivo']) !!}
                    <div class="modal-body">
                            
                        <div class="card ">
                            <div class="card-header" style="background:#F6F8FB" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne Show" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;" >
                                    CIERRE DEFINITIVO DE LA DEVOLUCION
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="input-group col-md-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Oficio No. </span>
                                            </div>
                                            <input type="text" class="form-control" name="numoficiocierre" id="numoficiocierre"  ></textarea>
                                        </div>
                                        <div class="input-group col-md-8">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">No. de Preparacion de Reemplazo</span>
                                            </div>
                                            <input type="text" class="form-control" name="numpreparacionremplazo" id="numpreparacionremplazo"  ></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Observacion de Cierre</span>
                                        </div>
                                        <textarea class="form-control" name="descripcion_solucion" id="descripcion_solucion" aria-label="With textarea" ></textarea>
                                    </div>
                                    
                                    

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-info" id="enviarcierredevolucion" >Cerrar Devolucion</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}   
                    </div>
                {!! Form::close() !!}        
            </div>
        </div>
    </div>  
    {{-- fin modal para el cierre de la devolucion  --}}  
    
@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){
            
            //pone dentro de la ventana modal el focus en el input id numoficiocierre
            $('#cerrardevolucion').on('shown.bs.modal', function () {
                $('#numoficiocierre').focus();
            });

            //valida el formulario antes de envio id del boton enviarcierredevolucion y id del formulario es cierredefinitivo
            $('#enviarcierredevolucion').click(function(){
                var numoficiocierre = $('#numoficiocierre').val();
                var descripcion_solucion = $('#descripcion_solucion').val();
                    if(numoficiocierre == ""){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Numero de Oficio con el cual se envia el material Nuevamente al centro de Acopio no puede Estar Vacio ..' })
                        return false;
                    }
                    if(descripcion_solucion == ""){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'La Observacion de Cierre No podra estar Vacia ..' })
                        return false;
                    }
                document.getElementById('cierredefinitivo').submit();
            });

        });

        $(function(){
            $("#cierredefinitivo").submit(function(e){
                e.preventDefault();
                //alert('esta inactivo el envio del formulario ');
                //var formData = $("#cierredefinitivo").serializeArray(); //captura todos los campos del formulario en un array 
                //console.log(formData);
                if($("#numoficiocierre").val()== ""){
                    //alert('esta vacio el campo'); 
                } 
            });
        });

    </script>   
@endsection

