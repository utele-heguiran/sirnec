@extends('layouts.sirnec')
@section('guia') Seguimiento al Rechazo @endsection
@section('linkencabezado') @endsection

@section('titulo')
    SEGUIMIENTO AL RECHAZO
@endsection
@section('subtitulo')
<span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Nombre del Ciudadano :</span>
    {{ $rechazo[0]->name }}
    <a href="" data-toggle="modal" data-target="#cerrarrechazo"><input type="button" class="btn btn-outline-primary float-right" value="Cerrar Rechazo" style="margin-right: 15px; margin-top: -10px"></a>
@endsection

@section('contenido')

    {!! Form::model($rechazo, ['route' => ['rechazo_actualizar', $rechazo[0]->id], 'method' => 'PUT']) !!}

        <div class="modal-body">
            <div class="row">

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
                            {{ $rechazo[0]->numdocumento}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">No. de Preparacion :</span>
                        </div>
                        <div class="col-md-8">
                            {{ $rechazo[0]->numpreparacion}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Origen del Rechazo :</span>
                        </div>
                        <div class="col-md-8">
                            {{ $origen[0]->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Tramite Realizado:</span>
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
                            {{ $rechazo[0]->fecpreparacion }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Fecha de Rechazo:</span>
                        </div>
                        <div class="col-md-8">
                            {{ $rechazo[0]->fecrechazo }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Hit :</span>
                        </div>
                        <div class="col-md-8">
                            {{ $rechazo[0]->hit }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Direccion:</span>
                        </div>
                        <div class="col-md-8">
                            {{ $rechazo[0]->direccion }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="card-text" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">Telefono:</span>
                        </div>
                        <div class="col-md-8">
                            {{ $rechazo[0]->telefono }}
                        </div>
                    </div>
                </div>

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

                                @if (empty($rechazo[0]->observacion_1))
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">Observacion</span>
                                        </div>
                                        <textarea class="form-control" name="observacion_1" aria-label="With textarea"></textarea>
                                    </div>
                                @else
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $rechazo[0]->fec_observacion_1 }}</span>
                                        </div>
                                        <textarea disabled class="form-control" name="observacion_1" aria-label="With textarea" >{{ $rechazo[0]->observacion_1 }}</textarea>
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

                                @if (empty($rechazo[0]->observacion_2))
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">Observacion</span>
                                        </div>
                                        <textarea class="form-control" name="observacion_2" aria-label="With textarea"></textarea>
                                    </div>
                                @else
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $rechazo[0]->fec_observacion_2 }}</span>
                                        </div>
                                        <textarea disabled class="form-control" name="observacion_2" aria-label="With textarea" >{{ $rechazo[0]->observacion_2 }}</textarea>
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

                                @if (empty($rechazo[0]->observacion_3))
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">Observacion</span>
                                        </div>
                                        <textarea class="form-control" name="observacion_3" aria-label="With textarea"></textarea>
                                    </div>
                                @else
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $rechazo[0]->fec_observacion_3 }}</span>
                                        </div>
                                        <textarea disabled class="form-control" name="observacion_3" aria-label="With textarea" >{{ $rechazo[0]->observacion_3 }}</textarea>
                                    </div>
                                @endif

                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('rechazos')}}"><input type="button" class="btn btn-outline-secondary" value="Cancelar"></a>
                            <button type="submit" class="btn btn-outline-success" id="confirmar">Guardar Observacion</button>
                        </div>


                    </div>
                </div>
            </div>
            {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}
        </div>
    {!! Form::close() !!}


    {{-- modal para el cierre del rechazo --}}
    <div class="modal fade bd-example-modal-lg" name='cerrarrechazo' id="cerrarrechazo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                {!! Form::model($rechazo, ['route' => ['rechazo_actualizar', $rechazo[0]->id], 'method' => 'PUT', 'id' => 'cierredefinitivo', 'name' => 'cierredefinitivo']) !!}

                <div class="modal-body">

                    <div class="card ">
                        <div class="card-header" style="background:#F6F8FB" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne Show" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;" >
                                CIERRE DEFINITIVO DEL RECHAZO
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Observacion de Cierre</span>
                                    </div>
                                    <textarea class="form-control" name="descripcion_solucion" id="descripcion_solucion" aria-label="With textarea" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-info" id="enviarcierrerechazo">Cerrar Rechazo</button>
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
    {{-- fin modal para el cierre del rechazo  --}}




@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            //pone dentro de la ventana modal el focus en el input id numoficiocierre
            $('#cerrarrechazo').on('shown.bs.modal', function () {
                $('#descripcion_solucion').focus();
            });

            //valida el formulario antes de envio id del boton enviarcierredevolucion y id del formulario es cierredefinitivo
            $('#enviarcierrerechazo').click(function(){
                var descripcion_solucion = $('#descripcion_solucion').val();
                    if(descripcion_solucion == ""){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'La Observacion de Cierre No podra estar Vacia ..' })
                        return false;
                    }
                document.getElementById('cierredefinitivo').submit();
            });

        });

    </script>
@endsection

