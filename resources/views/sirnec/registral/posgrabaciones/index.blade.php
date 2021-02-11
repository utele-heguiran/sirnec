@extends('layouts.sirnec')
@section('guia') Pos-grabaciones @endsection
@section('linkencabezado') @endsection


@section('titulo')

@if (count($data) > 0)
    @foreach($data as $row)@endforeach
    POS-GRABACIONES - {{ $row->nombreoficina }}
    @else
    POS-GRABACIONES
@endif

    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#reporteposgrabacion"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 04" /></a>


@endsection

@section('contenido')

        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                        <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:80%;" >
                            <thead>
                                <tr>
                                    <th>Oficina</th>
                                    <th>Mes Cargue</th>
                                    <th>Año</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($data as $row)
                                    <tr >
                                        <td>{{ $row->nombreoficina }}</td>
                                        <td>{{ $row->mescargue }}</td>
                                        <td>{{ $row->ano}}</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#crearposgrabacion" onclick="creaposgra({{ $row->id}})" title="Generar Cargue de Posgrabacion"><span style="color: #007BFF;" ><i class="fas fa-file-signature fa-lg"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                       </table>
                </div>
            </div>
        </div>

        {{-- modal crear postgrabacion  --}}
        <div class="modal fade bd-example-modal-lg" name='crearposgrabacion' id="crearposgrabacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREAR POS-GRABACION </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'posgrabacion_Guardar', 'method'=>'POST', 'autocomplete'=> 'off', 'id' => 'form_posgrabacion', 'name' => 'form_posgrabacion' ]) !!}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <center>
                                    <strong>RCN </strong>
                                    {!! Form::number('pos_regis_rcn',0, ['class'=>'form-control', 'id' => 'pos_regis_rcn']) !!}
                                </center>
                            </div>
                            <div class="col-md-2">
                                <center>
                                    <strong>RCM </strong>
                                    {!! Form::number('pos_regis_rcm',0, ['class'=>'form-control', 'id' => 'pos_regis_rcm']) !!}
                                </center>
                            </div>
                            <div class="col-md-2">
                                <center>
                                    <strong>RCD </strong>
                                    {!! Form::number('pos_regis_rcd',0, ['class'=>'form-control', 'id' => 'pos_regis_rcd']) !!}
                                </center>
                            </div>
                            <div class="col-md-2">
                                <center>
                                    <strong>TOTAL </strong>
                                    {!! Form::number('total_regis',0, ['class'=>'form-control', 'id' => 'total_regis', 'disabled']) !!}
                                </center>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"> </div>
                            <div class="col-md-8"><hr></div>
                            <div class="col-md-2"> </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <center>
                                    <strong>RCN MODIFICACION</strong>
                                    {!! Form::number('pos_modif_rcn',0, ['class'=>'form-control', 'id' => 'pos_modif_rcn']) !!}
                                </center>
                            </div>
                            <div class="col-md-2">
                                <center>
                                    <strong>RCM MODIFICACION</strong>
                                    {!! Form::number('pos_modif_rcm',0, ['class'=>'form-control', 'id' => 'pos_modif_rcm']) !!}
                                </center>
                            </div>
                            <div class="col-md-2">
                                <center>
                                    <strong>RCD MODIFICACION</strong>
                                    {!! Form::number('pos_modif_rcd',0, ['class'=>'form-control', 'id' => 'pos_modif_rcd']) !!}
                                </center>
                            </div>
                            <div class="col-md-2">
                                <center>
                                    <strong>TOTAL MODIFICACION</strong>
                                    {!! Form::number('total_modif',0, ['class'=>'form-control', 'id' => 'total_modif', 'disabled']) !!}
                                </center>
                            </div>
                            <div class="col-md-2"></div>
                        </div>


                        <br>

                        <div id="variables"></div>

                        <div class="row">
                            <div class="col-12" style="padding: 10px; text-align: center;">
                                <a class="btn btn-info" href="{{ route('posgrabacion')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info" id="enviarpostgrabacion">Crear Posgrabacion</button>
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- fin modal crear posgrabacion --}}

        {{-- modal generar reporte de posgrabaciones --}}
         <div class="modal fade bd-example-modal-lg" name='reporteposgrabacion' id="reporteposgrabacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR REPORTE DE POS-GRABACION</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'reporteposgrabacionespdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
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
                                <a class="btn btn-info" href="{{ route('posgrabacion')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info">Generar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- fin modal generar reporte de posgrabaciones --}}


@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){

            //pone dentro de la ventana modal el focus en el input
                $('#crearposgrabacion').on('shown.bs.modal', function () {
                    $('#pos_regis_rcn').focus();
                });

                $("#pos_regis_rcn").focusout(function() { suma_registros(); });
                $("#pos_regis_rcm").focusout(function() { suma_registros(); });
                $("#pos_regis_rcd").focusout(function() { suma_registros(); });
                $("#pos_modif_rcn").focusout(function() { suma_modificaciones(); });
                $("#pos_modif_rcm").focusout(function() { suma_modificaciones(); });
                $("#pos_modif_rcd").focusout(function() { suma_modificaciones(); });

            //valida el formulario antes de envio
            $('#enviarpostgrabacion').click(function(){
                var pos_regis_rcn = $('#pos_regis_rcn').val();
                var pos_regis_rcm = $('#pos_regis_rcm').val();
                var pos_regis_rcd = $('#pos_regis_rcd').val();
                var total_posgrabacion_rcn = $('#total_posgrabacion_rcn').val();
                var total_posgrabacion_rcm = $('#total_posgrabacion_rcm').val();
                var total_posgrabacion_rcd = $('#total_posgrabacion_rcd').val();
                var totalinscritosrcn = $('#totalinscritosrcn').val();
                var totalinscritosrcm = $('#totalinscritosrcm').val();
                var totalinscritosrcd = $('#totalinscritosrcd').val();
                var totalicimoserverrcn = parseInt(totalinscritosrcn) - parseInt(total_posgrabacion_rcn) - parseInt(pos_regis_rcn);
                var totalicimoserverrcm = parseInt(totalinscritosrcm) - parseInt(total_posgrabacion_rcm) - parseInt(pos_regis_rcm);
                var totalicimoserverrcd = parseInt(totalinscritosrcd) - parseInt(total_posgrabacion_rcd) - parseInt(pos_regis_rcd);

                if(totalicimoserverrcn < 0){
                    Swal.fire({ icon: 'error', title:  'Oops..RCN..', text: 'La Sumatoria de Posgrabaciones Ingresadas al sistema superan el Total maximo reportado por la Oficina mediante el RAFT - 30' });
                    return false;
                }
                if(totalicimoserverrcm < 0){
                    Swal.fire({ icon: 'error', title:  'Oops..RCM..', text: 'La Sumatoria de Posgrabaciones Ingresadas al sistema superan el Total maximo reportado por la Oficina mediante el RAFT - 30' });
                    return false;
                }
                if(totalicimoserverrcd < 0){
                    Swal.fire({ icon: 'error', title:  'Oops..RCD..', text: 'La Sumatoria de Posgrabaciones Ingresadas al sistema superan el Total maximo reportado por la Oficina mediante el RAFT - 30' });
                    return false;
                }

                document.getElementById('form_posgrabacion').submit();
            });

        });

        function  suma_modificaciones() {
                var $pos_modif_rcn = parseInt(document.getElementById('pos_modif_rcn').value);
                var $pos_modif_rcm = parseInt(document.getElementById('pos_modif_rcm').value);
                var $pos_modif_rcd = parseInt(document.getElementById('pos_modif_rcd').value);

                var $total_modif = $pos_modif_rcn + $pos_modif_rcm + $pos_modif_rcd;
                document.getElementById("total_modif").value = $total_modif;
        };

        function  suma_registros() {
                var $pos_regis_rcn = parseInt(document.getElementById('pos_regis_rcn').value);
                var $pos_regis_rcm = parseInt(document.getElementById('pos_regis_rcm').value);
                var $pos_regis_rcd = parseInt(document.getElementById('pos_regis_rcd').value);
                var $total_regis = $pos_regis_rcn + $pos_regis_rcm + $pos_regis_rcd;
                document.getElementById("total_regis").value = $total_regis;
        };

        function creaposgra(dato){
            var id = dato;
            //console.log(id);
            $.ajax({
                url:        '/getPosgrabacion/',
                type:       'GET',
                dataType:   'json',
                data:       {id:id},
                success:    function(data){
                    console.log(data);
                    var variables = document.getElementById("variables");
                    variables.innerHTML += "<input name='id' value="+data.id+" hidden >";
                    variables.innerHTML += "<input name='totalinscritosrcd' value="+data.totalinscritosrcd+" id='totalinscritosrcd' hidden >";
                    variables.innerHTML += "<input name='totalinscritosrcm' value="+data.totalinscritosrcm+" id='totalinscritosrcm' hidden >";
                    variables.innerHTML += "<input name='totalinscritosrcn' value="+data.totalinscritosrcn+" id='totalinscritosrcn' hidden >";
                    variables.innerHTML += "<input name='total_posgrabacion_rcn' value="+data.total_posgrabacion_rcn+" id='total_posgrabacion_rcn' hidden >";
                    variables.innerHTML += "<input name='total_posgrabacion_rcm' value="+data.total_posgrabacion_rcm+" id='total_posgrabacion_rcm' hidden >";
                    variables.innerHTML += "<input name='total_posgrabacion_rcd' value="+data.total_posgrabacion_rcd+" id='total_posgrabacion_rcd' hidden >";
                    variables.innerHTML += "<input name='total_modificacion_rcn' value="+data.total_modificacion_rcn+" id='total_modificacion_rcn' hidden >";
                    variables.innerHTML += "<input name='total_modificacion_rcm' value="+data.total_modificacion_rcm+" id='total_modificacion_rcm' hidden >";
                    variables.innerHTML += "<input name='total_modificacion_rcd' value="+data.total_modificacion_rcd+" id='total_modificacion_rcd' hidden >";
                }
            });
        };

    </script>
@endsection
