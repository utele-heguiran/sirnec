@extends('layouts.sirnec')
@section('guia') Devoluciones @endsection
@section('linkencabezado') @endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scriptsplugins')
    <script src="{{ asset('bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-fileinput/js/locales/es.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-fileinput/themes/fas/theme.min.js') }}" type="text/javascript"></script>
@endsection

@section('titulo')
    LISTADO DE DEVOLUCIONES
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#generarreporte"><img class="img-responsiveid float-right"  style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/descargarpdf.png')}}"  title="Generar Oficio Remisorio" /></a>
    <a href="" data-toggle="modal" data-target="#creardevolucion"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/devolucion.png')}}" title="Crear Devoluciones de Material de Identificacion" /></a>
    <a href="" data-toggle="modal" data-target="#crearreporte"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 06" /></a>
@endsection

@section('contenido')
    {{-- modal crear RAFT06 de Devoluciones --}}
        <div class="modal fade bd-example-modal-lg" name='crearreporte' id="crearreporte" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR RAFT - 06</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'raft06pdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
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
                                <a class="btn btn-info" href="{{ route('devolucionesacopio')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info">Generar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    {{-- fin modal crear RAFT06 de Devoluciones --}}

        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                    {!! Form::open(['route' => 'oficiodevolucion','id'=>'form_devoluciones', 'name' => 'form_devoluciones','method'=>'post', 'autocomplete'=> 'off']) !!}
                        <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Identificacion</th>
                                    <th>Ciudadano</th>
                                    {{-- <th>Municipio</th> --}}
                                    <th>Oficina</th>
                                    <th>Motivo Devolucion</th>
                                    <th>Devolucion</th>
                                    <th>Oficio No.</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 14px">
                                @foreach($data as $row)
                                    <tr >
                                        <td style="width: 2%;">
                                            @if($row->numoficiodevolucion == '')
                                                {!! Form::checkbox('registro_checkbox[]',$row->id, false, ['class'=>'registro_checkbox']) !!}
                                            @else
                                                <span style="color: green;">
                                                    <i class="fas fa-check-double"></i>
                                                </span>
                                            @endif
                                        </td>
                                        <td> {{ $row->numdocumento }} </td>
                                        <td> {{ $row->name }} </td>
                                        {{-- <td> {{ $row->nombremunicipio }} </td> --}}
                                        <td> {{ $row->nombreoficina  }} </td>
                                        <td> {{ $row->nombredevolucion  }} </td>
                                        <td> {{ $row->fecdevolucion }} </td>
                                        <td >
                                            <?php $id=$row->id;?>
                                            @if($row->numoficiodevolucion != '' )
                                                <a href="{{route ('generaroficiodevolucion', ['id' => $row->id ]) }}"><img src="{{ asset('images/descargarpdf.png') }}" title="Generar Oficio De Devolucion No. {{$row->numoficiodevolucion}}" width="30" height="30" ></a>
                                            @endif
                                            @if ($row->path == '')
                                                <a href="#" data-toggle="modal" data-target="#carguedevolucion" onclick="agregamodaldevolucion(<?php echo $id ?>)" ><img src="{{ asset('images/subirpdf.png') }}" title="Subir Material devuelto" width="30" height="30" ></a>
                                            @else
                                                <a href="{{ asset ('/storage/'.$row->path) }}" target="_blank"><img src="{{ asset('images/visualizarpdf.png') }}" title="Visualizar Material Devuelto" width="30" height="30" ></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- modal crear reporte de Devoluciones --}}
                                <div class="modal fade bd-example-modal-lg" name='generarreporte' id="generarreporte" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR OFICIO REMISORIO</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4">{!! Form::text('numoficiodevolucion', null, ['class' => 'form-control', 'id' => 'numoficiodevolucion', 'placeholder'=>"No. de Oficio Remisorio", 'required']) !!}</div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <a class="btn btn-info" href="{{ route('devolucionesacopio')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                                    <button type="submit" class="btn btn-info" id="oficioremisorio" formtarget="_blank">Generar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- fin modal crear reporte de Devoluciones --}}
                            </tbody>
                       </table>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>



    {{-- modal para cargar documento --}}
    <div class="modal fade" id="carguedevolucion" name="carguedevolucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Cargue de Material Devuelto </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => ['path_actualizar'], 'method' => 'post', 'id' => 'devolucionespath', 'name' => 'devolucionespath', 'enctype'=>'multipart/form-data']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::number('identificador', null,['id' => 'identificador', 'hidden'] ) !!}
                                <input type="file" name="path" id="path" class="form-control-file" style="background:#BFBDBC; border-radius: 10px ; padding: 10px 5px 10px 15px">
                            </div>
                        </div>
                    </div>
                    {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info" id="enviar_path">Cargar Archivo</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- fin modal para cargar documento --}}

    {{-- modal crear DEVOLUCIONES  --}}
    <div class="modal fade bd-example-modal-xl" name='creardevolucion' id="creardevolucion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE DEVOLUCIONES</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'devolucionesacopio_guardar', 'id'=>'devo', 'name' => 'devo', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <center>
                                    <h6 style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">No. DE PREPARACION</h6>
                                    {!! Form::text('buscarnumprep', null, ['class' => 'form-control', 'id' => 'buscarnumprep',]) !!}
                                </center>
                            </div>
                            <div class="col-md-5"></div>
                        </div>

                        <div class="row card-body">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table  class="table table-hover text-center" data-toggle="dataTable" style="width:100%"  >
                                        <thead>
                                            <tr>
                                                <th>Depto</th>
                                                <th>Nombre </th>
                                                <th>No. Preparacion</th>
                                                <th>Identificacion</th>
                                                <th>Oficina</th>
                                                <th>Fecha Preparacion</th>
                                                <th>Clase Devolucion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="devoluciones-tabla"  style="font-size: 12px;">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="variables"></div>
                        {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}
                    </div>
                    <div class="row" >
                        <div class="col-12" style="padding: 10px; text-align: center" >
                            <button type="submit" class="btn btn-info" >Guardar</button>
                            <button type="button" href="{{ route('devolucionesacopio')}}" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    <br>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- fin modal crear DEVOLUCIONES  --}}



@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){


            $('#path').fileinput({
                language: 'es',
                allowedFileExtensions:['pdf'],
                maxFileSize: 1000,
                showUpload: false,
                showClose: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                theme: 'fas',
            });

            //pone dentro de la ventana modal el focus en el input id numoficio
            $('#creardevolucion').on('shown.bs.modal', function () {
                $('#buscarnumprep').focus();
            })

            $('#generarreporte').on('shown.bs.modal', function () {
                $('#numoficiodevolucion').focus();
            })

            //trae con el numero de preparacion el registro encontrado en la tabla de scr
            $('input[name="buscarnumprep"]').on('change', function(){
                var numprepa = $(this).val();
                if(numprepa){
                    $.ajax({
                        url:        '/getDevoluciones/'+numprepa,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            //console.log(data);
                            if(data == ''){
                                Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Numero de Preparacion No. ' + numprepa + ' presenta alguno de los siguientes errores asi: 1) No Exista en la Base de Datos o 2) el Registro No pertenesca a la circuscripcion a la cual usted pertenece..' })
                                devo.buscarnumprep.value = '';
                            }else {
                                //console.log(data);
                                var cuerpoTabla = document.getElementById("devoluciones-tabla");
                                var variables = document.getElementById("variables");

                                for( var i = 0; i<data.length; i++){
                                    cuerpoTabla.innerHTML += "<tr><td>"+data[i].departamento_id+"</td><td>"+data[i].name+"</td><td>"+data[i].serial_np+"</td><td>"+data[i].nuip+"</td><td>"+data[i].oficina_id+"</td><td>"+data[i].fechapreparacion+"</td><td><select name='clasedevolucion_id[]' required ><option value='' id='clasedevolucion_id' >Selecione el Motivo Devolucion</option><option value=1>A_Cancelada Por Doble Cedulación</option><option value=2>B_Suplantación</option><option value=3>C_Cancelada Por Mala Elaboración</option><option value=4>D_Cancelada Por Muerte</option><option value=5>E_Datos Incoherentes</option><option value=6>F_Datos Incompletos</option><option value=7>G_Falta Firma Del Registrador/Nombre Reseñador</option><option value=8>H_Falta Firma Del Colombiano</option><option value=9>K_Foto No Cumple Con Especificaciones</option><option value=10>L_Huellas Fuera Del Cuadro</option><option value=11>M_Impresiones Trocadas</option><option value=12>N_Mala Calidad De La Reseña</option><option value=13>O_Nuip Mal Asignado</option><option value=14>P_Problema Con Cambio De Datos</option><option value=15>Q_Reseña No Concuerda Con Señales Particulares</option><option value=16>R_Tarjeta En Un Lote Equivocado</option><option value=17>S_Tarjeta Posiblemente Alterada</option><option value=18>T_Tramite Ya Producido (Pv O Ren)</option><option value=19>U_Error Prenist (Huellas Negras, Tomar Huellas En Tinta)</option><option value=20>V_Numero De Preparación Errado</option><option value=21>W_Mala Calidad De La Firma</option> </select></td></tr>";

                                    variables.innerHTML += "<input name='departamento_id[]' value="+data[i].departamento_id+" hidden >";
                                    variables.innerHTML += "<input name='numpreparacion[]' value="+data[i].serial_np+" hidden >";
                                    variables.innerHTML += "<input name='numdocumento[]' value="+data[i].nuip+" hidden >";
                                    variables.innerHTML += "<input name='name[]' value='"+data[i].name+"' hidden >";
                                    variables.innerHTML += "<input name='clasetramite_id[]' value="+data[i].clasetramite_id+" hidden >";
                                    variables.innerHTML += "<input name='tipotramite_id[]' value="+data[i].tipotramite_id+" hidden >";
                                    variables.innerHTML += "<input name='oficina_id[]' value="+data[i].oficina_id+" hidden >";
                                    variables.innerHTML += "<input name='fecpreparacion[]' value="+data[i].fechapreparacion+" hidden >";
                                    //console.log(data[i].name);

                                    devo.buscarnumprep.value = '';
                                    $('#buscarnumprep').focus();
                                }
                            }
                        }
                    });
                }
                else{
                }
            });

            //valida el formulario antes de envio id del boton enviarcierredevolucion y id del formulario es cierredefinitivo
            $('#enviarpath').click(function(){
                var path = $('#path').val();
                    if(path == ""){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Seleccione el Material de Identificacion que sera Devuelto por el Centro de Acopio ..' })
                        return false;
                    }
                document.getElementById('devolucionespath').submit();
            });



        });

        //funcion que carga el id en la modal de raft30
        function agregamodaldevolucion(id){
            $('#identificador').val(id);
        }

    </script>
@endsection
