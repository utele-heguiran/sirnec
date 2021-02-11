@extends('layouts.sirnec')
@section('guia') Produccion y Envios @endsection
@section('linkencabezado') @endsection


@section('titulo')

@if (count($data) > 0)
    @foreach($data as $row)@endforeach
    PRODUCCION Y ENVIOS DEL CENTRO DE ACOPIO - {{ $row->nombredepartamento }}
    @else
    PRODUCCION Y ENVIOS DEL CENTRO DE ACOPIO
@endif
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearproduccionenvio"><img class="img-responsiveid float-right" style="width: 3%; height: 3%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/despacho.png') }}" title="Crear produccion y Envio" /></a>
    <a href="" data-toggle="modal" data-target="#reporteraft10"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 10" /></a>
@endsection


@section('styles')


@endsection

@section('contenido')

        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                        <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:80%;" >
                            <thead>
                                <tr>
                                    <th>Departamento</th>
                                    <th>Fecha Creacion</th>
                                    <th>Fecha Inicial</th>
                                    <th>Fecha Final</th>
                                    <th>Total Escaneo</th>
                                    <th>Total Comprobacion</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:14px;">
                                @foreach($data as $row)
                                    <tr >
                                        <td>{{ $row->nombredepartamento }}</td>
                                        <td>{{ $row->feccreacion }}</td>
                                        <td>{{ $row->fechinicial }}</td>
                                        <td>{{ $row->fechfinal }}</td>
                                        <td>{{ $row->escaneo_total }}</td>
                                        <td>{{ $row->comprobado_total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                       </table>
                </div>
            </div>
        </div>

        {{-- modal crear PRODUCCION Y ENVIO --}}
        <div class="modal fade bd-example-modal-lg" name='crearproduccionenvio' id="crearproduccionenvio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREAR ENVIO DE PRODUCCION </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'produccion_envios_guardar', 'method'=>'POST', 'autocomplete'=> 'off', 'id' => 'produccionenviocrear', 'name' => 'produccionenviocrear' ]) !!}
                    <div class="modal-body">

                        <div class="row" >
                            <div class="col-md-4"></div>
                            <div class="col-md-2">
                                <center>
                                    <strong id="letra">Fecha Inicial</strong>
                                    {!! Form::date('fechinicial', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required', 'id' => 'fechinicial']) !!}
                                </center>
                            </div>
                            <div class="col-md-2">
                                <center>
                                    <strong id="letra">Fecha Final</strong>
                                    {!! Form::date('fechfinal', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required', 'id' => 'fechfinal']) !!}
                                </center>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <br>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-md-5"></div>
                            <div class="col-md-1">
                                <center>
                                    <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;">STS</strong>
                                    {!! Form::number('sts', null, ['class' => 'form-control', 'id' => 'sts', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                </center>
                            </div>
                            <div class="col-md-1">
                                <center>
                                    <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;">TS</strong>
                                    {!! Form::number('ts', null, ['class' => 'form-control', 'id' => 'ts', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                </center>
                            </div>
                            <div class="col-md-5"></div>
                        </div>

                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12" id="letra" >
                                        <center>
                                            <strong  >CEDULA DE CIUDADANIA</strong>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12" id="letra" >
                                        <center>
                                            <strong>TARJETA DE IDENTIDAD</strong>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-12"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-md-2" id="letra" style="color: #FC5834; margin-top:38px"><center><strong>ESCANEO</strong></center></div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >PV</strong>
                                            {!! Form::number('escaneo_pvc', null, ['class' => 'form-control', 'id' => 'escaneo_pvc', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >REN</strong>
                                            {!! Form::number('escaneo_renovc', null, ['class' => 'form-control', 'id' => 'escaneo_renovc', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >RECT</strong>
                                            {!! Form::number('escaneo_rectc', null, ['class' => 'form-control', 'id' => 'escaneo_rectc', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >DUP</strong>
                                            {!! Form::number('escaneo_dupc', null, ['class' => 'form-control', 'id' => 'escaneo_dupc', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >PV</strong>
                                            {!! Form::number('escaneo_pvt', null, ['class' => 'form-control', 'id' => 'escaneo_pvt', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >REN</strong>
                                            {!! Form::number('escaneo_renovt', null, ['class' => 'form-control', 'id' => 'escaneo_renovt', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >RECT</strong>
                                            {!! Form::number('escaneo_rectt', null, ['class' => 'form-control', 'id' => 'escaneo_rectt', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >DUP</strong>
                                            {!! Form::number('escaneo_dupt', null, ['class' => 'form-control', 'id' => 'escaneo_dupt', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >N_PROC</strong>
                                            {!! Form::number('escaneo_noprocesado', null, ['class' => 'form-control', 'id' => 'escaneo_noprocesado', 'style' => 'margin-top: 5px' , 'onchange'=> 'sumar_escaneo(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        <center>
                                            <strong id="letra" style="border-style: solid; padding: 1px 10px 1px 10px;border-width: 1px;border-radius: 5px;" >TOTAL</strong>
                                            {!! Form::number('escaneo_total', 0, ['class' => 'form-control', 'id' => 'escaneo_total',  'readonly'=>'readonly',  'style' => 'margin-top: 5px']) !!}
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-md-2" id="letra" style="color: #FC5834; margin-top:10px"><center><strong>COMPROBACION</strong></center></div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <center>
                                            {!! Form::number('comprobado_pvc', null, ['class' => 'form-control', 'id' => 'comprobado_pvc', 'style' => 'margin-top: 5px' , 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            {!! Form::number('comprobado_renovc', null, ['class' => 'form-control', 'id' => 'comprobado_renovc', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            {!! Form::number('comprobado_rectc', null, ['class' => 'form-control', 'id' => 'comprobado_rectc', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            {!! Form::number('comprobado_dupc', null, ['class' => 'form-control', 'id' => 'comprobado_dupc', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <center>
                                            {!! Form::number('comprobado_pvt', null, ['class' => 'form-control', 'id' => 'comprobado_pvt', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            {!! Form::number('comprobado_renovt', null, ['class' => 'form-control', 'id' => 'comprobado_renovt', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            {!! Form::number('comprobado_rectt', null, ['class' => 'form-control', 'id' => 'comprobado_rectt', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            {!! Form::number('comprobado_dupt', null, ['class' => 'form-control', 'id' => 'comprobado_dupt', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <center>
                                            {!! Form::number('comprobado_noprocesado', null, ['class' => 'form-control', 'id' => 'comprobado_noprocesado', 'style' => 'margin-top: 5px', 'onchange'=> 'sumar_comprobado(this.value)']) !!}
                                        </center>
                                    </div>
                                    <div class="col-md-6">
                                        <center>
                                            {!! Form::number('comprobado_total', 0, ['class' => 'form-control', 'id' => 'comprobado_total',  'style' => 'margin-top: 5px', 'readonly'=>'readonly' ]) !!}
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>





                        <div class="row">
                            <div class="col-12" style="padding: 10px; text-align: center;">
                                <a class="btn btn-info" href="{{ route('produccion_envios')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info" id="enviarproduccionenvio">Crear Produccion</button>
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- fin modal crear PRODUCCION Y ENVIO --}}

        {{-- modal generar raft 10 --}}
        <div class="modal fade bd-example-modal-lg" name='reporteraft10' id="reporteraft10" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR RAFT - 10</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'raft10pdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
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
                                <a class="btn btn-info" href="{{ route('produccion_envios')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info">Generar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- fin modal generar raft 10  --}}


@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){

            //pone dentro de la ventana modal el focus en el input
                $('#crearproduccionenvio').on('shown.bs.modal', function () {
                    $('#fechinicial').focus();
                });

            //valida el formulario antes de envio
                $('#enviarproduccionenvio').click(function(){

                    var sts = $('#sts').val();
                    var ts = $('#ts').val();
                    var escaneo_pvc = $('#escaneo_pvc').val();
                    var escaneo_renovc = $('#escaneo_renovc').val();
                    var escaneo_rectc = $('#escaneo_rectc').val();
                    var escaneo_dupc = $('#escaneo_dupc').val();
                    var escaneo_pvt = $('#escaneo_pvt').val();
                    var escaneo_renovt = $('#escaneo_renovt').val();
                    var escaneo_rectt = $('#escaneo_rectt').val();
                    var escaneo_dupt = $('#escaneo_dupt').val();
                    var escaneo_noprocesado = $('#escaneo_noprocesado').val();
                    var comprobado_pvc = $('#comprobado_pvc').val();
                    var comprobado_renovc = $('#comprobado_renovc').val();
                    var comprobado_rectc = $('#comprobado_rectc').val();
                    var comprobado_dupc = $('#comprobado_dupc').val();
                    var comprobado_pvt = $('#comprobado_pvt').val();
                    var comprobado_renovt = $('#comprobado_renovt').val();
                    var comprobado_rectt = $('#comprobado_rectt').val();
                    var comprobado_dupt = $('#comprobado_dupt').val();
                    var comprobado_noprocesado = $('#comprobado_noprocesado').val();

                    if( sts == ""){ sts = 0; document.getElementById("sts").value = sts; }
                    if( ts == ""){ ts = 0; document.getElementById("ts").value = ts; }
                    if( escaneo_pvc == ""){ escaneo_pvc = 0; document.getElementById("escaneo_pvc").value = escaneo_pvc; }
                    if( escaneo_renovc == ""){ escaneo_renovc = 0; document.getElementById("escaneo_renovc").value = escaneo_renovc; }
                    if( escaneo_rectc == ""){ escaneo_rectc = 0; document.getElementById("escaneo_rectc").value = escaneo_rectc; }
                    if( escaneo_dupc == ""){ escaneo_dupc = 0; document.getElementById("escaneo_dupc").value = escaneo_dupc; }
                    if( escaneo_pvt == ""){ escaneo_pvt = 0; document.getElementById("escaneo_pvt").value = escaneo_pvt; }
                    if( escaneo_renovt == ""){ escaneo_renovt = 0; document.getElementById("escaneo_renovt").value = escaneo_renovt; }
                    if( escaneo_rectt == ""){ escaneo_rectt = 0; document.getElementById("escaneo_rectt").value = escaneo_rectt; }
                    if( escaneo_dupt == ""){ escaneo_dupt = 0; document.getElementById("escaneo_dupt").value = escaneo_dupt; }
                    if( escaneo_noprocesado == ""){ escaneo_noprocesado = 0; document.getElementById("escaneo_noprocesado").value = escaneo_noprocesado; }
                    if( escaneo_total == ""){ escaneo_total = 0; document.getElementById("escaneo_total").value = escaneo_total; }
                    if( comprobado_pvc == ""){ comprobado_pvc = 0; document.getElementById("comprobado_pvc").value = comprobado_pvc; }
                    if( comprobado_renovc == ""){ comprobado_renovc = 0; document.getElementById("comprobado_renovc").value = comprobado_renovc; }
                    if( comprobado_rectc == ""){ comprobado_rectc = 0; document.getElementById("comprobado_rectc").value = comprobado_rectc; }
                    if( comprobado_dupc == ""){ comprobado_dupc = 0; document.getElementById("comprobado_dupc").value = comprobado_dupc; }
                    if( comprobado_pvt == ""){ comprobado_pvt = 0; document.getElementById("comprobado_pvt").value = comprobado_pvt; }
                    if( comprobado_renovt == ""){ comprobado_renovt = 0; document.getElementById("comprobado_renovt").value = comprobado_renovt; }
                    if( comprobado_rectt == ""){ comprobado_rectt = 0; document.getElementById("comprobado_rectt").value = comprobado_rectt; }
                    if( comprobado_dupt == ""){ comprobado_dupt = 0; document.getElementById("comprobado_dupt").value = comprobado_dupt; }
                    if( comprobado_noprocesado == ""){ comprobado_noprocesado = 0; document.getElementById("comprobado_noprocesado").value = comprobado_noprocesado; }
                    if( comprobado_total == ""){ comprobado_total = 0; document.getElementById("comprobado_total").value = comprobado_total; }

                    total_escaneado = (parseInt(sts)+parseInt(ts)+parseInt(escaneo_pvc)+parseInt(escaneo_renovc)+parseInt(escaneo_rectc)+parseInt(escaneo_dupc)+parseInt(escaneo_pvt)+parseInt(escaneo_renovt)+parseInt(escaneo_rectt)+parseInt(escaneo_dupt)+parseInt(escaneo_noprocesado));
                    total_comprobado =(parseInt(comprobado_pvc)+parseInt(comprobado_renovc)+parseInt(comprobado_rectc)+parseInt(comprobado_dupc)+parseInt(comprobado_pvt)+parseInt(comprobado_renovt)+parseInt(comprobado_rectt)+parseInt(comprobado_dupt)+parseInt(comprobado_noprocesado));
                    document.getElementById("escaneo_total").value=  total_escaneado;
                    document.getElementById("comprobado_total").value=  total_comprobado;

                    document.getElementById('produccionenviocrear').submit();
                });




        });

        function sumar_escaneo (valor) {
            valor_escaneado = parseInt(valor); // Convertir el valor a un entero (número).
            var total_escaneado = document.getElementById("escaneo_total").value; // trae el acumulado
            totalizado_escaneo = (parseInt(total_escaneado) + parseInt(valor_escaneado)); //suma el acumulado mas el valor que llega
            document.getElementById("escaneo_total").value=  totalizado_escaneo; //le pone al acumulado el valor total ya sumado
        }

        function sumar_comprobado (valor) {
            valor_comprobado = parseInt(valor); // Convertir el valor a un entero (número).
            var total_comprobado = document.getElementById("comprobado_total").value; // trae el acumulado
            totalizado_comprobado = (parseInt(total_comprobado) + parseInt(valor_comprobado)); //suma el acumulado mas el valor que llega
            document.getElementById("comprobado_total").value=  totalizado_comprobado; //le pone al acumulado el valor total ya sumado
        }

    </script>
@endsection

