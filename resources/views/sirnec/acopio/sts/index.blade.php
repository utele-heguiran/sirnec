@extends('layouts.sirnec')
@section('guia') STS @endsection
@section('linkencabezado') @endsection


@section('titulo') 

@if (count($data) > 0)
    @foreach($data as $row)@endforeach
    LISTADO DE STS GENERADOS CENTRO DE ACOPIO - {{ $row->nombredepartamento }}
    @else
    LISTADO DE STS GENERADOS CENTRO DE ACOPIO 
@endif

    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="#" onclick="recogevalidadossts()"><img class="img-responsiveid float-right"  style="width: 3.5%; height: 3.5%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/validar.png')}}"  title="Validar Cargue Web Service" /></a>
    <a href="" data-toggle="modal" data-target="#crearsts"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/sts.png')}}" title="Crear STS" /></a>
    <a href="" data-toggle="modal" data-target="#reporteraft08"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 08" /></a>
     
    
@endsection

@section('contenido')

        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                        <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%;" >
                            <thead>
                                <tr>
                                    <th>Sts No.</th>
                                    <th>Creacion</th>
                                    <th>Envio</th>
                                    <th>Tramite</th>
                                    <th>No. Solicitudes</th>
                                    <th>Observaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:14px;">
                                @foreach($data as $row)
                                    <tr >
                                        <td>
                                            {{ $row->codpmt }}
                                            {{ Carbon\Carbon::parse($row->feccreasts)->formatLocalized('%Y') }}
                                            {{ Carbon\Carbon::parse($row->feccreasts)->formatLocalized('%m') }} 
                                            {{ Carbon\Carbon::parse($row->feccreasts)->formatLocalized('%d') }} 
                                            {{ $row->numsts }}</td>                              
                                        <td>{{ $row->feccreasts }}</td>                              
                                        <td>{{ $row->fecenvsts }}</td>                              
                                        <td>{{ $row->nombretipotramite }}</td>  
                                        <td>{{ $row->cantidadsts }}</td>                              
                                        <td>{{ $row->observaciones}}</td>                              
                                        <td>
                                            {{-- <a href="" data-toggle="modal" data-target="#mostrarlote" onclick="agregadatos('{{ $row->id }}')"><img src="{{ asset('images/visualizarpdf.png') }}" title="Informacion del Lote" width="30" height="30" ></a> --}}
                                            @if ($row->estado_id == 1 )
                                                {!!  Form::checkbox('stsvalidados', $row->id, false,  ['id' => 'stsvalidados']) !!} 
                                            @else
                                                <span style="color: green;">
                                                    <i class="fas fa-check-double"></i>
                                                </span>
                                            @endif 
                                        </td>                                
                                    </tr>
                                @endforeach  
                            </tbody>
                       </table>
                </div>
            </div> 
        </div>
    
        {{-- modal crear sts --}}
        <div class="modal fade bd-example-modal-lg" name='crearsts' id="crearsts" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE STS</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'stsacopio_guardar', 'method'=>'POST', 'autocomplete'=> 'off', 'id' => 'stscrear', 'name' => 'stscrear' ]) !!}
                    <div class="modal-body">
                        
                        <div class="row" >
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                               <div class="row">
                                    <div class="col md-2"></div>
                                    <div class="col-md-8">
                                        {!! Form::number('numsts', null, ['class' => 'form-control', 'id' => 'numsts', 'placeholder' => 'No. STS']) !!}
                                    </div>
                                    <div class="col md-2"></div>
                               </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><center><span style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">FECHA CREACION STS</span></center>{!! Form::date('feccreasts', \Carbon\Carbon::now(), ['class'=>'form-control','id' => 'feccreasts' ]) !!}</div>
                            <div class="col-md-3"><center><span style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">FECHA ENVIO STS</span></center> {!! Form::date('fecenvsts', \Carbon\Carbon::now(),  ['class'=>'form-control', 'id' => 'fecenvsts']) !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-5">
                                {!! Form::select ('clasetramites_id', $clasetramites, null, ['class'=>'form-control', 'id' => 'clasetramites_id', 'placeholder' => 'Seleccione el Documento']) !!}
                            </div>
                            <div class="col-md-5">
                                {!! Form::select ('tipotramite_id', $tipotramite, null, ['class'=>'form-control', 'id' => 'tipotramite_id', 'placeholder' => 'Seleccione el Tramite']) !!}
                            </div>
                            <div class="col-md-2">
                                {!! Form::number('cantidadsts', null, ['class' => 'form-control', 'id' => 'cantidadsts', 'placeholder' => 'Cantidad']) !!}
                            </div>
                        </div>   
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Observaciones al STS</span>
                                    </div>
                                    <textarea class="form-control" name="observaciones" id="observaciones" aria-label="With textarea" ></textarea>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12" style="padding: 10px; text-align: center;">
                                <a class="btn btn-info" href="{{ route('stsacopio')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info" id="enviarsts">Crear Sts</button>
                            </div>
                        </div>
                        
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div> 
        {{-- fin modal crear sts --}}

        {{-- modal generar raft 08 --}}
        <div class="modal fade bd-example-modal-lg" name='reporteraft08' id="reporteraft08" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR RAFT - 08</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'raft08pdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
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
                                <a class="btn btn-info" href="{{ route('stsacopio')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
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
                $('#crearsts').on('shown.bs.modal', function () {
                    $('#numsts').focus();
                });

            //trae el municipio dependiendo del departamento escogido
                $('select[name="clasetramites_id"]').on('change', function(){
                    //console.log('escuchando')
                    var clasetramites_id = $(this).val();
                    if(clasetramites_id){
                        //console.log(clasetramites_id);
                        $.ajax({
                            url:        '/getTipotramite/'+clasetramites_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="tipotramite_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="tipotramite_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            } 
                        });
                    }
                    else{
                        $('select[name="tipotramite_id"]').empty();
                    }
                });


            //valida el formulario antes de envio id del boton enviarcierredevolucion y id del formulario es cierredefinitivo
            $('#enviarsts').click(function(){

                var numsts = $('#numsts').val();
                var feccreasts = $('#feccreasts').val();
                var fecenvsts =$('#fecenvsts').val();
                var clasetramites_id =$('#clasetramites_id').val();
                var tipotramite_id =$('#tipotramite_id').val();
                var cantidadsts =$('#cantidadsts').val();

                if(numsts == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor Ingrese el Numero del Set Transfer Set "STS" Generado ..' })
                    return false;
                }
                if(feccreasts == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ingrese la fecha de creacion del Set Transfer Set "STS" ..' })
                    return false;
                }
                if(fecenvsts == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Ingrese la fecha de envio a Oficinas Centrales del Set Transfer Set "STS" ...' })
                    return false;
                }
                if(clasetramites_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor indique la clase de tramite a enviar en el  Set Transfer Set "STS" ...' })
                    return false;
                }
                if(tipotramite_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor indique el tipo de tramite a enviar en el  Set Transfer Set "STS" ...' })
                    return false;
                }
                if(cantidadsts == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor indique la cantidad de solicitudes que contiene el Set Transfer Set "STS" Generado ...' })
                    return false;
                }
                
                document.getElementById('stscrear').submit();
            });


        });

            // lleva al modal los datos de las anulaciones a destruir
                function recogevalidadossts(){
                    var id = [];
                    $('#stsvalidados:checked').each(function(){
                        id.push($(this).val());
                    });
                    if(id != ''){
                        //console.log('esta lleno');
                        $.ajax({
                            url:        '/getValidadossts/',
                            type:       'GET',
                            dataType:   'json',
                            data:       {id:id},
                            success:    function(data){
                                console.log(data);
                                if(data=1){
                                    Swal.fire({ icon: 'success', title:  'Oops...', text: 'Han sido validados correctamente ..' });
                                    location.reload();  
                                }else{
                                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Seleccione el los STS a Validar ..' })
                                }
                            }
                        });
                    }else{
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Seleccione el Material de Identificacion que sera Destruido por el Centro de Acopio ..' })
                    }  
                };  

           
    </script>   
@endsection
