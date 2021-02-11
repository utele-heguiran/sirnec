@extends('layouts.sirnec')
@section('guia') Despachos @endsection
@section('linkencabezado') @endsection

@section('titulo') 
    LISTADO DE DESPACHOS EFECTUADOS 
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#creardespacho"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/despacho.png')}}" title="Crear Despachos de Material" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Municipio</th>
                            <th>Oficina de Despacho</th>
                            <th>Destinatario</th>
                            <th>Fecha</th>
                            <th>Oficio No.</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->nombremunicipio }} </td>                              
                                <td> {{ $row->nombreoficina }} </td>                              
                                <td> {{ $row->nombrefuncionario }} </td>
                                <td> {{ $row->feccreacion  }} </td>
                                <td> {{ $row->numoficio }} </td>
                                <td><center><a href="{{route ('despachomaterial', ['id' => $row->id ]) }}"><img src="{{ asset('images/descargarpdf.png') }}" title="Generar Oficio Remisorio" width="30" height="30" ></a>
                                    {{-- <a href="{{ route('barrios_editar', ['id' => $row->id ]) }}" title="Editar el Barrio"><span style="color: #007BFF;"><i class="fas fa-pencil-alt" ></i></span></a> 
                                    &nbsp;&nbsp;&nbsp;
                                    {!! Form::model($row, ['method' => 'delete', 'route' => ['barrios_eliminar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $row->id) !!}
                                        <button  style="background-color:#FFFFFF;border: none;" title="Eliminar este Barrio"><span style="color: red;"><i class="fas fa-trash-alt"></i></span></button>
                                    {!! Form::close() !!} --}}
                                
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    {{-- modal crear despacho --}}
    <div class="modal fade bd-example-modal-xl" name='creardespacho' id="creardespacho" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE DESPACHOS DE MATERIAL</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
         
                    {!! Form::open(['route' => 'despmaterial_guardar', 'id'=>'despacho', 'name' => 'despacho', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                    <div class="modal-body">
                        <br>
                        {!! Form::date('feccreacion', \Carbon\Carbon::now(), ['hidden' => 'hidden']) !!}

                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-2">
                                <center>
                                    <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">OFICIO No.</h6>
                                    {!! Form::text('numoficio', null, ['class' => 'form-control', 'id' => 'numoficio',]) !!} 
                                </center>     
                            </div>
                            <div class="col-5"></div>
                        </div>
                      

                        <div class="row">
                            <div class="col-md-3">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                            <div class="col-md-4">{!! Form::select ('oficina_id', $oficina, null, ['class'=>'form-control', 'id' => 'oficina_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione la Oficina']) !!}</div>
                            <div class="col-md-5">{!! Form::select ('funcionario_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'funcionario_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Funcionarios en la Oficina']) !!}</div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6"> {!! Form::number('claseoficina_id', null, ['hidden', 'id' => 'claseoficina_id']) !!} </div>
                        </div>

                        <br>

                        <div class="row" style="font-size:13px ; margin-top:-20px;">
                            <div class="col-4">
                                <br>
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE NACIMIENTO</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcni1',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcni1']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcnf1',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcnf1']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="botonrcn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1n" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcnrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcni2',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcni2']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcnf2',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcnf2']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <a href="#" id="rcn2"></a><div id="totalrango2n" style="font-size: 12px"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <br>
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE MATRIMONIO</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcmi1',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcmi1']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcmf1',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcmf1']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="botonrcm"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1m" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcmrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcmi2',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcmi2']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcmf2',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcmf2']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <a href="#" id="rcm2"></a><div id="totalrango2m" style="font-size: 12px"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <br>
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">REGISTRO CIVIL DE DEFUNCION</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcdi1',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcdi1']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcdf1',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcdf1']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="botonrcd"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1d" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="rcdrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('rcdi2',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'rcdi2']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('rcdf2',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'rcdf2']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <a href="#" id="rcd2"></a><div id="totalrango2d" style="font-size: 12px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row" style="font-size:13px ; margin-top:-20px;">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <br>
                                <div class="row">
                                    <div class="col-12" >
                                        <center>
                                            <h6 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">DECADACTILARES</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 3px">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('decasi1',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'decasi1']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('decasf1',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'decasf1']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <div>
                                            <a href="#" id="botondecas"><i class="fa fa-plus-circle" aria-hidden="true"></i></a><div id="totalrango1decas" style="font-size: 12px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="decasrango2" style="margin-top: 3px;display:none;">
                                    <div class="col-2"></div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <strong >No.</strong>    
                                    </div>
                                    <div class="col-4">
                                        {!! Form::number('decasi2',null, ['class'=>'form-control', 'placeholder' => 'Inicial','id'=>'decasi2']) !!}
                                    </div>
                                        <div class="col-4">
                                        {!! Form::number('decasf2',null, ['class'=>'form-control', 'placeholder' => 'Final','id'=>'decasf2']) !!}
                                    </div>
                                    <div class="col-1" style="margin-top: 10px">
                                        <a href="#" id="rcn2"></a><div id="totalrango2decas" style="font-size: 12px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </div>


                    {!! Form::number('totalrcn1',null, ['hidden', 'id'=>'totalrcn1']) !!}{!! Form::number('totalrcn2',null, ['hidden', 'id'=>'totalrcn2']) !!}
                    {!! Form::number('totalrcm1',null, ['hidden', 'id'=>'totalrcm1']) !!}{!! Form::number('totalrcm2',null, ['hidden','id'=>'totalrcm2']) !!}
                    {!! Form::number('totalrcd1',null, ['hidden', 'id'=>'totalrcd1']) !!}{!! Form::number('totalrcd2',null, ['hidden', 'id'=>'totalrcd2']) !!}
                    {!! Form::number('totaldecas1',null, ['hidden', 'id'=>'totaldecas1']) !!}{!! Form::number('totaldecas2',null, ['hidden', 'id'=>'totaldecas2']) !!}
                   
                    {!! Form::number('user_id', $user->id, ['hidden'] ) !!}{!! Form::number('user_departamento', $user->departamento_id, ['hidden'] ) !!} {!! Form::number('user_oficina', $user->oficina_id, ['hidden'] ) !!}

                    <div class="row" >
                        <div class="col-12" style="padding: 10px; text-align: center" > 
                            <button type="button" class="btn btn-info" id="enviar">Guardar</button>
                            <button type="button" class="btn btn-info" id="limpiar">Limpiar</button>
                            <button type="button" href="{{ route('despmaterial')}}" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>  
                    <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    {{-- fin modal crear despachos  --}}


    

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

            //pone dentro de la ventana modal el focus en el input id numoficio
            $('#creardespacho').on('shown.bs.modal', function () {
                $('#numoficio').focus();
            }) 

            $("#botonrcn").on("click", function(){ $("#rcnrango2").show(); });
            $("#botonrcm").on("click", function(){ $("#rcmrango2").show(); });
            $("#botonrcd").on("click", function(){ $("#rcdrango2").show(); }); 
            $("#botondecas").on("click", function(){ $("#decasrango2").show(); });

            //trae la oficina dependiendo del municipio escogido
            $('select[name="municipio_id"]').on('change', function(){
                //console.log('escuchando')
                var municipio_id = $(this).val();
                if(municipio_id){
                    //console.log(municipio_id);
                    $.ajax({
                        url:        '/getOficinas/'+municipio_id,
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

            //trae la clase de oficina dependiendo de la oficina escogida
            $('select[name="oficina_id"]').on('change', function(){
                //console.log('escuchando')
                var oficina_id = $(this).val();
                if(oficina_id){
                    //console.log(oficina_id);
                    $.ajax({
                        url:        '/getClaseoficinas/'+oficina_id,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            //console.log(data.claseoficina_id);
                            $("#claseoficina_id").val(data.claseoficina_id);
                        } 
                    });
                }
                else{
                    $("#claseoficina_id").empty();
                }
            });


            //trae los funcionariosde la oficina dependiendo de la oficina escogida
            $('select[name="oficina_id"]').on('change', function(){
                //console.log('escuchando')
                var oficina_id = $(this).val();
                if(oficina_id){
                    //console.log(oficina_id);
                    $.ajax({
                        url:        '/getFuncionariosofic/'+oficina_id,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            //console.log(data);
                            $('select[name="funcionario_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="funcionario_id"]')
                                .append('<option value="'+key+'">'+ value + '</option>');
                            });
                        } 
                    });
                }
                else{
                    $('select[name="funcionario_id"]').empty();
                }
            });


               
            $("#rcnf1").focusout(function() { rcnf1(); });
            $("#rcnf2").focusout(function() { rcnf2(); });

            function  rcnf1() {
                var $rcni1 = document.getElementById('rcni1').value;
                var $rcnf1 = document.getElementById('rcnf1').value;
                if($rcni1 == ''){ $rcni1 = 0;} 
                if($rcnf1 == ''){ $rcnf1 = 0;} 
                var $totalrango1n=parseInt($rcnf1)-parseInt($rcni1)+1;

                if ($rcnf1 == '' &&  $rcni1 == '' ) {
                    $totalrango1n = 0;
                    document.getElementById("totalrango1n").innerHTML = $totalrango1n;
                    $("#totalrango1n").css({'color':'green'});
                } else if ($rcnf1 == 0 &&  $rcni1 == 0 ) {
                    $totalrango1n = 0;
                    document.getElementById("totalrango1n").innerHTML = $totalrango1n;
                    $("#totalrango1n").css({'color':'green'});
                } else if (parseInt($rcnf1) >= parseInt($rcni1) || parseInt($rcnf1) == parseInt($rcni1)) {
                    document.getElementById("totalrango1n").innerHTML = $totalrango1n;
                    $("#totalrango1n").css({'color':'green'});
                } else if (parseInt($totalrango1n) < 0 ) {
                    $totalrango1n = $totalrango1n - 2;
                    document.getElementById("totalrango1n").innerHTML = $totalrango1n;
                    $("#totalrango1n").css({'color':'red'});
                }
                $("#totalrcn1").val($totalrango1n);
            }

            function  rcnf2() {
                var $rcni2 = document.getElementById('rcni2').value;
                var $rcnf2 = document.getElementById('rcnf2').value;
                if($rcni2 == ''){ $rcni2 = 0;} 
                if($rcnf2 == ''){ $rcnf2 = 0;} 
                var $totalrango2n=parseInt($rcnf2)-parseInt($rcni2)+1;

                if ($rcnf2 == '' &&  $rcni2 == '' ) {
                    $totalrango2n = 0;
                    document.getElementById("totalrango2n").innerHTML = $totalrango2n;
                    $("#totalrango2n").css({'color':'green'});
                } else if ($rcnf2 == 0 &&  $rcni2 == 0 ) {
                    $totalrango2n = 0;
                    document.getElementById("totalrango2n").innerHTML = $totalrango2n;
                    $("#totalrango2n").css({'color':'green'});
                } else if (parseInt($rcnf2) >= parseInt($rcni2) || parseInt($rcnf2) == parseInt($rcni2)) {
                    document.getElementById("totalrango2n").innerHTML = $totalrango2n;
                    $("#totalrango2n").css({'color':'green'});
                } else if (parseInt($totalrango2n) < 0 ) {
                    $totalrango2n = $totalrango2n - 2;
                    document.getElementById("totalrango2n").innerHTML = $totalrango2n;
                    $("#totalrango2n").css({'color':'red'});
                }
                $("#totalrcn2").val($totalrango2n);
            } 

            $("#rcmf1").focusout(function() { rcmf1(); });
            $("#rcmf2").focusout(function() { rcmf2(); });

            function  rcmf1() {
                var $rcmi1 = document.getElementById('rcmi1').value;
                var $rcmf1 = document.getElementById('rcmf1').value;
                if($rcmi1 == ''){ $rcmi1 = 0;} 
                if($rcmf1 == ''){ $rcmf1 = 0;} 
                var $totalrango1m=parseInt($rcmf1)-parseInt($rcmi1)+1;

                if ($rcmf1 == '' &&  $rcmi1 == '' ) {
                    $totalrango1m = 0;
                    document.getElementById("totalrango1m").innerHTML = $totalrango1m;
                    $("#totalrango1m").css({'color':'green'});
                } else if ($rcmf1 == 0 &&  $rcmi1 == 0 ) {
                    $totalrango1m = 0;
                    document.getElementById("totalrango1m").innerHTML = $totalrango1m;
                    $("#totalrango1m").css({'color':'green'});
                } else if (parseInt($rcmf1) >= parseInt($rcmi1) || parseInt($rcmf1) == parseInt($rcmi1)) {
                    document.getElementById("totalrango1m").innerHTML = $totalrango1m;
                    $("#totalrango1m").css({'color':'green'});
                } else if (parseInt($totalrango1m) < 0 ) {
                    $totalrango1m = $totalrango1m - 2;
                    document.getElementById("totalrango1m").innerHTML = $totalrango1m;
                    $("#totalrango1m").css({'color':'red'});
                }
                $("#totalrcm1").val($totalrango1m);
            }

            function  rcmf2() {
                var $rcmi2 = document.getElementById('rcmi2').value;
                var $rcmf2 = document.getElementById('rcmf2').value;
                if($rcmi2 == ''){ $rcmi2 = 0;} 
                if($rcmf2 == ''){ $rcmf2 = 0;} 
                var $totalrango2m=parseInt($rcmf2)-parseInt($rcmi2)+1;

                if ($rcmf2 == '' &&  $rcmi2 == '' ) {
                    $totalrango2m = 0;
                    document.getElementById("totalrango2m").innerHTML = $totalrango2m;
                    $("#totalrango2m").css({'color':'green'});
                } else if ($rcmf2 == 0 &&  $rcmi2 == 0 ) {
                    $totalrango2m = 0;
                    document.getElementById("totalrango2m").innerHTML = $totalrango2m;
                    $("#totalrango2m").css({'color':'green'});
                } else if (parseInt($rcmf2) >= parseInt($rcmi2) || parseInt($rcmf2) == parseInt($rcmi2)) {
                    document.getElementById("totalrango2m").innerHTML = $totalrango2m;
                    $("#totalrango2m").css({'color':'green'});
                } else if (parseInt($totalrango2m) < 0 ) {
                    $totalrango2m = $totalrango2m - 2;
                    document.getElementById("totalrango2m").innerHTML = $totalrango2m;
                    $("#totalrango2m").css({'color':'red'});
                }
                $("#totalrcm2").val($totalrango2m);
            } 

            $("#rcdf1").focusout(function() { rcdf1(); });
            $("#rcdf2").focusout(function() { rcdf2(); });

            function  rcdf1() {
                var $rcdi1 = document.getElementById('rcdi1').value;
                var $rcdf1 = document.getElementById('rcdf1').value;
                if($rcdi1 == ''){ $rcdi1 = 0;} 
                if($rcdf1 == ''){ $rcdf1 = 0;} 
                var $totalrango1d=parseInt($rcdf1)-parseInt($rcdi1)+1;

                if ($rcdf1 == '' &&  $rcdi1 == '' ) {
                    $totalrango1d = 0;
                    document.getElementById("totalrango1d").innerHTML = $totalrango1d;
                    $("#totalrango1d").css({'color':'green'});
                } else if ($rcdf1 == 0 &&  $rcdi1 == 0 ) {
                    $totalrango1d = 0;
                    document.getElementById("totalrango1d").innerHTML = $totalrango1d;
                    $("#totalrango1d").css({'color':'green'});
                } else if (parseInt($rcdf1) >= parseInt($rcdi1) || parseInt($rcdf1) == parseInt($rcdi1)) {
                    document.getElementById("totalrango1d").innerHTML = $totalrango1d;
                    $("#totalrango1d").css({'color':'green'});
                } else if (parseInt($totalrango1d) < 0 ) {
                    $totalrango1d = $totalrango1d - 2;
                    document.getElementById("totalrango1d").innerHTML = $totalrango1d;
                    $("#totalrango1d").css({'color':'red'});
                }
                $("#totalrcd1").val($totalrango1d);
            }

            function  rcdf2() {
                var $rcdi2 = document.getElementById('rcdi2').value;
                var $rcdf2 = document.getElementById('rcdf2').value;
                if($rcdi2 == ''){ $rcdi2 = 0;} 
                if($rcdf2 == ''){ $rcdf2 = 0;} 
                var $totalrango2d=parseInt($rcdf2)-parseInt($rcdi2)+1;

                if ($rcdf2 == '' &&  $rcdi2 == '' ) {
                    $totalrango2d = 0;
                    document.getElementById("totalrango2d").innerHTML = $totalrango2d;
                    $("#totalrango2d").css({'color':'green'});
                } else if ($rcdf2 == 0 &&  $rcdi2 == 0 ) {
                    $totalrango2d = 0;
                    document.getElementById("totalrango2d").innerHTML = $totalrango2d;
                    $("#totalrango2d").css({'color':'green'});
                } else if (parseInt($rcdf2) >= parseInt($rcdi2) || parseInt($rcdf2) == parseInt($rcdi2)) {
                    document.getElementById("totalrango2d").innerHTML = $totalrango2d;
                    $("#totalrango2d").css({'color':'green'});
                } else if (parseInt($totalrango2d) < 0 ) {
                    $totalrango2d = $totalrango2d - 2;
                    document.getElementById("totalrango2d").innerHTML = $totalrango2d;
                    $("#totalrango2d").css({'color':'red'});
                }
                $("#totalrcd2").val($totalrango2d);
            } 

            $("#decasf1").focusout(function() { decasf1(); });
            $("#decasf2").focusout(function() { decasf2(); });

            function  decasf1() {
                var $decasi1 = document.getElementById('decasi1').value;
                var $decasf1 = document.getElementById('decasf1').value;
                if($decasi1 == ''){ $decasi1 = 0;} 
                if($decasf1 == ''){ $decasf1 = 0;} 
                var $totalrango1decas=parseInt($decasf1)-parseInt($decasi1)+1;

                if ($decasf1 == '' &&  $decasi1 == '' ) {
                    $totalrango1decas = 0;
                    document.getElementById("totalrango1decas").innerHTML = $totalrango1decas;
                    $("#totalrango1decas").css({'color':'green'});
                } else if ($decasf1 == 0 &&  $decasi1 == 0 ) {
                    $totalrango1decas = 0;
                    document.getElementById("totalrango1decas").innerHTML = $totalrango1decas;
                    $("#totalrango1decas").css({'color':'green'});
                } else if (parseInt($decasf1) >= parseInt($decasi1) || parseInt($decasf1) == parseInt($decasi1)) {
                    document.getElementById("totalrango1decas").innerHTML = $totalrango1decas;
                    $("#totalrango1decas").css({'color':'green'});
                } else if (parseInt($totalrango1decas) < 0 ) {
                    $totalrango1decas = $totalrango1decas - 2;
                    document.getElementById("totalrango1decas").innerHTML = $totalrango1decas;
                    $("#totalrango1decas").css({'color':'red'});
                }
                $("#totaldecas1").val($totalrango1decas);
            }

            function  decasf2() {
                var $decasi2 = document.getElementById('decasi2').value;
                var $decasf2 = document.getElementById('decasf2').value;
                if($decasi2 == ''){ $decasi2 = 0;} 
                if($decasf2 == ''){ $decasf2 = 0;} 
                var $totalrango2decas=parseInt($decasf2)-parseInt($decasi2)+1;

                if ($decasf2 == '' &&  $decasi2 == '' ) {
                    $totalrango2decas = 0;
                    document.getElementById("totalrango2decas").innerHTML = $totalrango2decas;
                    $("#totalrango2decas").css({'color':'green'});
                } else if ($decasf2 == 0 &&  $decasi2 == 0 ) {
                    $totalrango2decas = 0;
                    document.getElementById("totalrango2decas").innerHTML = $totalrango2decas;
                    $("#totalrango2decas").css({'color':'green'});
                } else if (parseInt($decasf2) >= parseInt($decasi2) || parseInt($decasf2) == parseInt($decasi2)) {
                    document.getElementById("totalrango2decas").innerHTML = $totalrango2decas;
                    $("#totalrango2decas").css({'color':'green'});
                } else if (parseInt($totalrango2decas) < 0 ) {
                    $totalrango2decas = $totalrango2decas - 2;
                    document.getElementById("totalrango2decas").innerHTML = $totalrango2decas;
                    $("#totalrango2decas").css({'color':'red'});
                }
                $("#totaldecas2").val($totalrango2decas);
            } 

            //valida el formulario antes de envio 
            $("#enviar").on("click", function(){
                
                var $decasi1 = document.getElementById('decasi1').value;
                var $decasf1 = document.getElementById('decasf1').value;
                var $decasi2 = document.getElementById('decasi2').value;
                var $decasf2 = document.getElementById('decasf2').value;
                if($decasi1 == ''){ $decasi1 = 0; $("#decasi1").val($decasi1);}
                if($decasf1 == ''){ $decasf1 = 0; $("#decasf1").val($decasf1);} 
                if($decasi2 == ''){ $decasi2 = 0; $("#decasi2").val($decasi2);} 
                if($decasf2 == ''){ $decasf2 = 0; $("#decasf2").val($decasf2);} 

                var $rcni1 = document.getElementById('rcni1').value;
                var $rcnf1 = document.getElementById('rcnf1').value;
                var $rcni2 = document.getElementById('rcni2').value;
                var $rcnf2 = document.getElementById('rcnf2').value;
                if($rcni1 == ''){ $rcni1 = 0; $("#rcni1").val($rcni1);}
                if($rcnf1 == ''){ $rcnf1 = 0; $("#rcnf1").val($rcnf1);} 
                if($rcni2 == ''){ $rcni2 = 0; $("#rcni2").val($rcni2);} 
                if($rcnf2 == ''){ $rcnf2 = 0; $("#rcnf2").val($rcnf2);}  

                var $rcmi1 = document.getElementById('rcmi1').value;
                var $rcmf1 = document.getElementById('rcmf1').value;
                var $rcmi2 = document.getElementById('rcmi2').value;
                var $rcmf2 = document.getElementById('rcmf2').value;
                if($rcmi1 == ''){ $rcmi1 = 0; $("#rcmi1").val($rcmi1);}
                if($rcmf1 == ''){ $rcmf1 = 0; $("#rcmf1").val($rcmf1);} 
                if($rcmi2 == ''){ $rcmi2 = 0; $("#rcmi2").val($rcmi2);} 
                if($rcmf2 == ''){ $rcmf2 = 0; $("#rcmf2").val($rcmf2);}  

                var $rcdi1 = document.getElementById('rcdi1').value;
                var $rcdf1 = document.getElementById('rcdf1').value;
                var $rcdi2 = document.getElementById('rcdi2').value;
                var $rcdf2 = document.getElementById('rcdf2').value;
                if($rcdi1 == ''){ $rcdi1 = 0; $("#rcdi1").val($rcdi1);}
                if($rcdf1 == ''){ $rcdf1 = 0; $("#rcdf1").val($rcdf1);} 
                if($rcdi2 == ''){ $rcdi2 = 0; $("#rcdi2").val($rcdi2);} 
                if($rcdf2 == ''){ $rcdf2 = 0; $("#rcdf2").val($rcdf2);}  

                if(despacho.municipio_id.value == ''){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger el Municipio a donde se enviara el material de Identificacion!', })
                    return false;
                }
                if(despacho.oficina_id.value == ''){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera escoger la Oficina Destinataria del Material de Identificacion a Enviar!', })
                    return false;
                }
                if(despacho.funcionario_id.value == ''){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Debera Seleccionar el Funcionario al Cual se le Hara Cadena de Custodia del Material de Identificacion a enviar !', })
                    return false;
                }
                if(document.getElementById('totalrcn1').value < 0){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Rango No. 01 de los RCN no puede ser Negativo Por Favor Verifica la Informacion Ingresada', })
                    return false;
                }
                if(document.getElementById('totalrcn2').value < 0){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Rango No. 02 de los RCN no puede ser Negativo Por Favor Verifica la Informacion Ingresada', })
                    return false;
                }
                if(document.getElementById('totalrcm1').value < 0){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Rango No. 01 de los RCM no puede ser Negativo Por Favor Verifica la Informacion Ingresada', })
                    return false;
                }
                if(document.getElementById('totalrcm2').value < 0){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Rango No. 02 de los RCM no puede ser Negativo Por Favor Verifica la Informacion Ingresada', })
                    return false;
                }
                if(document.getElementById('totalrcd1').value < 0){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Rango No. 01 de los RCD no puede ser Negativo Por Favor Verifica la Informacion Ingresada', })
                    return false;
                }
                if(document.getElementById('totalrcd2').value < 0){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Rango No. 02 de los RCD no puede ser Negativo Por Favor Verifica la Informacion Ingresada', })
                    return false;
                }
                if(document.getElementById('totaldecas1').value < 0){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Rango No. 01 de las Decas no puede ser Negativo Por Favor Verifica la Informacion Ingresada', })
                    return false;
                }
                if(document.getElementById('totaldecas2').value < 0){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'El Rango No. 02 de las Decas no puede ser Negativo Por Favor Verifica la Informacion Ingresada', })
                    return false;
                }

            despacho.submit();
            });

            $("#limpiar").on("click", function(){
                $("#creardespacho").find("input,textarea,select").val("");
            });
            


        });

    </script>   
@endsection
