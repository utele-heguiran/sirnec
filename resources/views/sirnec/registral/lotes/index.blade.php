@extends('layouts.sirnec')
@section('guia') Lotes Enviados @endsection
@section('linkencabezado') @endsection


@section('titulo') 
    LISTADO DE LOTES ENVIADOS AL CENTRO DE ACOPIO
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#reporteraft05"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 05" /></a>
    
    
@endsection

@section('contenido')
        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                        <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                            <thead>
                                <tr>
                                    <th><center><span style="color: blue;"><i class="fas fa-dolly fa-lg" aria-hidden="true" title="Dias de Trasporte"></i></span></center></th>
                                    <th>Creacion Lote</th>
                                    <th>Recepcion</th>
                                    <th>Oficina</th>
                                    <th>Lote No.</th>
                                    <th>Novedades</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                    <tr >
                                        <td>
                                            @if ($row->cantdiastrasporte - $row->tiempomaxtransporte <= 0 )
                                                <span style="color: green;">
                                                    <i class="fas fa-check-double"></i>
                                                </span>
                                            @else
                                                <span style="color: red">({{ $row->cantdiastrasporte - $row->tiempomaxtransporte }})</span> 
                                            @endif
                                        </td>                              
                                        <td>{{ $row->feccrealote }}</td>                              
                                        <td>{{ $row->fecrecacopio }}</td>                              
                                        <td>{{ $row->nombreoficina }}</td>                              
                                        <td>
                                            {{ $row->codpmt }}
                                            {{ Carbon\Carbon::parse($row->feccrealote)->formatLocalized('%Y') }}
                                            {{ Carbon\Carbon::parse($row->feccrealote)->formatLocalized('%m') }} 
                                            {{ Carbon\Carbon::parse($row->feccrealote)->formatLocalized('%d') }} 
                                            {{ $row->numlote }}
                                        </td>                              
                                        <td>{{ $row->novedad }}</td>                              
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#mostrarlote" onclick="agregadatos('{{ $row->id }}')"><img src="{{ asset('images/visualizarpdf.png') }}" title="Informacion del Lote" width="30" height="30" ></a>
                                        </td>                              
                                    </tr>
                                @endforeach 
                            </tbody>
                       </table>
                </div>
            </div> 
        </div>
    
        
        {{-- modal generar raft 04 --}}
        <div class="modal fade bd-example-modal-lg" name='reporteraft05' id="reporteraft05" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR RAFT - 05</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'raft05pdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
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
                                <a class="btn btn-info" href="{{ route('lotesregistrales')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info">Generar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- fin modal generar raft 04 --}}
    
        {{-- modal para ver el Lote --}}
        <div class="modal fade" id="mostrarlote" name="mostrarlote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Informacion Detallada del Lote </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row" >
                            <div class="col-md-2" id="letra">Registraduria</div>
                            <div class="col-md-9"><span id="campo"><strong id="nombreoficina"></strong></span></div>
                        </div>
                        <div class="row" >
                            <div class="col-md-2" id="letra">Lote No.</div>
                            <div class="col-md-9"><span id="campo"><strong id="numloteu"></strong></span></div>
                        </div>
                        <div class="row" >
                            <div class="col-md-2" id="letra">Creacion Lote</div>
                            <div class="col-md-2"><span id="campo"><strong id="feccrealoteu"></strong></span></div>
                            <div class="col-md-2" id="letra">Recogida Lote</div>
                            <div class="col-md-2"><span id="campo"><strong id="fecenvloteu"></strong></span></div>
                            <div class="col-md-2" id="letra">Recepcion Lote</div>
                            <div class="col-md-2"><span id="campo"><strong id="fecrecacopiou"></strong></span></div>
                        </div>
                        <div class="row" >
                            <div class="col-md-2" id="letra">Dias Transp. </div>
                            <div class="col-md-2"><span id="campo"><strong id="cantdiastrasporteu"></strong></span></div>
                            <div class="col-md-2" id="letra">Cantidad Decas</div>
                            <div class="col-md-2"><span id="campo"><strong id="cantdecasrecibidasu"></strong></span></div>
                            <div class="col-md-2" id="letra">Ofic Envio No.</div>
                            <div class="col-md-2"><span id="campo"><strong id="numoficenviou"></strong></span></div>
                        </div>
                        <div class="row" >
                            <div class="col-md-2" id="letra">Cant. Anulados</div>
                            <div class="col-md-2"><span id="campo"><strong id="cantanuladosu"></strong></span></div>
                            <div class="col-md-2" id="letra">Cant. Faltantes</div>
                            <div class="col-md-2"><span id="campo"><strong id="cantfaltantesu"></strong></span></div>
                        </div>
                        <div class="row" >
                            <div class="col-md-2" id="letra">Novedad. </div>
                            <div class="col-md-10"><span id="campo"><strong id="novedadu"></strong></span></div>
                        </div>
                        <br>
                        <div class="row" >
                            <div class="col-md-6">
                                <div class="row ">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);text-align: center" >
                                        RELACION DE ANULADOS
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10" >
                                        <table class="table table-sm table-striped" style="width:100%"  >
                                            <thead style="text-align: center">
                                                <tr >
                                                    <th>Id</th>
                                                    <th>No. Prep </th>
                                                    <th>Formato</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablita-anulados" style="font-size: 12px; text-align:center ">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="row ">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);text-align: center" >
                                        RELACION DE FALTANTES
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10" >
                                        <table class="table table-sm table-striped" style="width:100%"  >
                                            <thead style="text-align: center">
                                                <tr >
                                                    <th>Id</th>
                                                    <th>No. Prep </th>
                                                    <th>Formato</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablita-faltantes" style="font-size: 12px; text-align:center ">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- fin modal para ver el Lote --}}
    

        

    
@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){

            // me trae los datos de la oficina ciando cambia el select
            $('select[name="oficina_id"]').on('change', function(){
                var oficina_id = $(this).val();
                //console.log(oficina_id)
                $.ajax({
                    url:        '/getOficin/'+oficina_id,
                    type:       'GET',
                    dataType:   'json',
                    success:    function(data){
                        //console.log(data.diastrasporte);
                        var diastransporte = document.getElementById("diastransporte");
                        diastransporte.innerHTML = "<input name='diastranporteoficina' value="+data.diastrasporte+" hidden >";
                    }
                });
            });

           

            //llena la tabla de faltantes 
            var contador = 1;
            $('input[name="numpreparacionfaltantes"]').on('change', function(){
                var numerofaltante = $(this).val();
                var cuerpoTabla = document.getElementById("faltantes-tabla");
                var variables = document.getElementById("variablesfaltantes");
                    cuerpoTabla.innerHTML += "<tr><td>"+contador+"</td><td>"+numerofaltante+"</td><td><select name='claseformatosfaltantes[]' required='required' ><option value='1'>Alfabética</option><option value='2'>Alfabética Y Contraseña</option><option value='3'>Alfabética Y Decadactilar</option><option value='4'>Contraseña</option><option value='5'>Contraseña Y Decadactilar</option><option value='6' selected >Decadactilar</option><option value='7'>Formato Completo</option></select></td></tr>";
                    variables.innerHTML += "<input name='numpreparacionfaltantes[]' value="+numerofaltante+" hidden >";
                    variables.innerHTML += "<input name='cantfaltantes' value="+contador+" hidden >";
                    contador++;
                    lotescrear.numpreparacionfaltantes.value = '';
                    $('#numpreparacionfaltantes').focus();
            });

            //llena la tabla de anulados 
            var cuenta = 1;
            $('input[name="numpreparacionanulados"]').on('change', function(){
                var numeroanulado = $(this).val();
                var cuerpoTabla = document.getElementById("anulados-tabla");
                var variables = document.getElementById("variablesanulados");
                    cuerpoTabla.innerHTML += "<tr><td>"+cuenta+"</td><td>"+numeroanulado+"</td><td><select name='claseformatosanulados[]' required='required' ><option value='1'>Alfabética</option><option value='2'>Alfabética Y Contraseña</option><option value='3'>Alfabética Y Decadactilar</option><option value='4'>Contraseña</option><option value='5'>Contraseña Y Decadactilar</option><option value='6' selected >Decadactilar</option><option value='7'>Formato Completo</option></select></td></tr>";
                    variables.innerHTML += "<input name='numpreparacionanulados[]' value="+numeroanulado+" hidden >";
                    variables.innerHTML += "<input name='cantanulados' value="+cuenta+" hidden >";
                    cuenta++;
                    lotescrear.numpreparacionanulados.value = '';
                    $('#numpreparacionanulados').focus();
            });

            //valida el formulario antes de envio id del boton enviarcierredevolucion y id del formulario es cierredefinitivo
            $('#enviarlote').click(function(){
                var oficina_id = $('#oficina_id').val();
                var numlote = $('#numlote').val();
                var feccrealote =$('#feccrealote').val();
                var fecenvlote =$('#fecenvlote').val();
                var fecrecacopio =$('#fecrecacopio').val();
                var cantdecasrecibidas =$('#cantdecasrecibidas').val();
                var numoficenvio =$('#numoficenvio').val();

                if(oficina_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor Selecione la Oficina de donde proviene el Material a ser Procesado ..' })
                    return false;
                }
                if(numlote == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ingrese el Numero del lote ..' })
                    return false;
                }
                if(feccrealote == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor ingrese la fecha de Creacion del lote..' })
                    return false;
                }
                if(fecenvlote == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor indique la fecha en la que el proveedor de Trasporte recogio el material con destino al centro de acopio..' })
                    return false;
                }
                if(fecrecacopio == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor indique la fecha en la que fue recibido el material en el centro de Acopio ..' })
                    return false;
                }
                if(cantdecasrecibidas == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor indique EL numero de Decadactilares Recibidas en el centro de Acopio ..' })
                    return false;
                }
                if(numoficenvio == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor indique EL numero de Oficio con el Cual llego el Material al centro de Acopio ..' })
                    return false;
                }

                document.getElementById('lotescrear').submit();
            });
          
        });

        //funcion que trae mediante ajax la informacion del lote con anulados y faltantes 
        function agregadatos(datos){
            document.getElementById("tablita-anulados").innerHTML = ''; //limpia la tabla de consultas anteriores
            document.getElementById("tablita-faltantes").innerHTML = ''; //limpia la tabla de consultas anteriores
            var lote_id = datos;
            //alert(lote_id);
            $.ajax({
                url:        '/getLote/'+lote_id,
                type:       'GET',
                dataType:   'json',
                success:    function(data){
                    //console.log(data);
                    document.getElementById("nombreoficina").innerHTML = data[0].nombreoficina;
                    document.getElementById("numloteu").innerHTML = data[0].codpmt+' '+data[0].feccrealote+' '+data[0].numlote;
                    document.getElementById("feccrealoteu").innerHTML = data[0].feccrealote;
                    document.getElementById("fecenvloteu").innerHTML = data[0].fecenvlote;
                    document.getElementById("fecrecacopiou").innerHTML = data[0].fecrecacopio;
                    document.getElementById("cantdiastrasporteu").innerHTML = data[0].cantdiastrasporte;
                    document.getElementById("cantdecasrecibidasu").innerHTML = data[0].cantdecasrecibidas;
                    document.getElementById("numoficenviou").innerHTML = data[0].numoficenvio;
                    document.getElementById("novedadu").innerHTML = data[0].novedad;
                    document.getElementById("cantanuladosu").innerHTML = data[0].cantanulados;
                    document.getElementById("cantfaltantesu").innerHTML = data[0].cantfaltantes;
                    var totalanulados = data[0].cantanulados;
                    var totalfaltantes = data[0].cantfaltantes;

                    if(totalanulados > 0){
                        //alert('hay anulados');
                        $.ajax({
                            url:        '/getAnulados/'+lote_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(anulados){
                                //console.log(anulados);
                                var tablitaAnulados = document.getElementById("tablita-anulados");
                                var contador = 1;
                                for( var i = 0; i<anulados.length; i++){
                                    tablitaAnulados.innerHTML += "<tr><td>"+contador+"</td><td>"+anulados[i].numpreparacion+"</td><td>"+anulados[i].nombreclaseformato+"</td></tr>";
                                    contador++;
                                }
                            } 
                        });
                    }
                    if(totalfaltantes > 0){
                        //alert('hay faltantes');
                        $.ajax({
                            url:        '/getFaltantes/'+lote_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(faltantes){
                                //console.log(faltantes);
                                var tablitaFaltantes = document.getElementById("tablita-faltantes");
                                var numerador = 1;
                                for( var i = 0; i<faltantes.length; i++){
                                    tablitaFaltantes.innerHTML += "<tr><td>"+numerador+"</td><td>"+faltantes[i].numpreparacion+"</td><td>"+faltantes[i].nombreclaseformato+"</td></tr>";
                                    numerador++;
                                }
                            } 
                        });         
                    }
                } 
            });
        };

        
        



    </script>   
@endsection
