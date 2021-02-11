@extends('layouts.sirnec')
@section('guia') Destruccion Material @endsection
@section('linkencabezado') @endsection


@section('titulo') 
    LISTADO DE MATERIAL PARA DESTRUCCION 
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#generaractadestruccion" onclick="generaacta()"><img class="img-responsiveid float-right"  style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/descargarpdf.png')}}"  title="Generar Acta de Destruccion" /></a>
    <a href="" data-toggle="modal" data-target="#crearreporteraft07"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 07" /></a>
@endsection

@section('contenido')
    {{-- modal crear RAFT07 de Destruccion --}}
        <div class="modal fade bd-example-modal-lg" name='crearreporteraft07' id="crearreporteraft07" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR RAFT - 07</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'raft07pdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
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
                                <a class="btn btn-info" href="{{ route('destruccionacopio')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info">Generar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    {{-- fin modal crear RAFT07 de Destruccion --}}







        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                        <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:80%" >
                            <thead>
                                <tr>
                                    <th></i></span></center></th>
                                    <th>PMT</th>
                                    <th>Oficina</th>
                                    <th>Nº Preparacion</th>
                                    <th>Formato</th>
                                    <th>Fecha Creacion</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($data as $row)
                                    <tr >
                                        <td style="width: 2%;">
                                            {!!  Form::checkbox('anuladosselecionados', $row->id, false,  ['id' => 'anuladosselecionados']) !!} 
                                        </td>                           
                                        <td>{{ $row->codpmt }}</td>                              
                                        <td>{{ $row->nombreoficina }}</td>                              
                                        <td>{{ $row->numpreparacion }}</td>
                                        <td>{{ $row->formato }}</td> 
                                        <td>{{ $row->feccrealote }}</td>                              
                                    </tr> 
                                @endforeach
                                
                            </tbody>
                       </table>
                </div>
            </div> 
        </div>

        {{-- modal crear acta de destruccion de material --}}
        <div class="modal fade bd-example-modal-lg" name='generaractadestruccion' id="generaractadestruccion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR ACTA DE DESTRUCCION DE MATERIAL</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => 'destruccionacopio_actualizar','id'=>'actadestruccionmaterial', 'name' => 'actadestruccionmaterial','method'=>'post', 'autocomplete'=> 'off']) !!} 
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">{!! Form::text('actadestruccion', null, ['class' => 'form-control', 'id' => 'actadestruccion', 'placeholder'=>"No. del Acta de Destruccion", 'required']) !!}</div>
                                <div class="col-md-4"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                    <div class="table-responsive">
                                        <table  class="table table-hover text-center" data-toggle="dataTable" style="width:80%"  >
                                            <thead>
                                                <tr>
                                                    <th>Nº Preparacion</th>
                                                    <th>Nuip</th>
                                                    <th>Motivo Destruccion</th>
                                                </tr>
                                            </thead>
                                            <tbody id="destrucciones-tabla"  style="font-size: 12px;">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </center>
                                </div>
                            </div>
                            <div id="variables"></div>
                            <div class="modal-footer">
                                <a class="btn btn-info" href="{{ route('destruccionacopio')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                <button type="submit" class="btn btn-info" formtarget="_blank">Generar</button>
                            </div>
                        {!! Form::close() !!}   
                    </div>
                </div>
            </div>
        </div>
        {{-- fin modal crear acta de destruccion de material --}}     
          


    
@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){
            
            //pone dentro de la ventana modal el focus en el input id numoficio
            $('#generaractadestruccion').on('shown.bs.modal', function () {
                $('#actadestruccion').focus();
            });

           
        });

        // lleva al modal los datos de las anulaciones a destruir
        function generaacta(){
            var id = [];
            $('#anuladosselecionados:checked').each(function(){
                id.push($(this).val());
            });
            if(id != ''){
                //console.log('esta lleno');
                $.ajax({
                    url:        '/getAnuladosacta/',
                    type:       'GET',
                    dataType:   'json',
                    data:       {id:id},
                    success:    function(data){
                        //console.log(data);
                        var cuerpoTabla = document.getElementById("destrucciones-tabla");
                        var variables = document.getElementById("variables");
                            for( var i = 0; i<data.length; i++){
                                cuerpoTabla.innerHTML += "<tr><td>"+data[i][0].numpreparacion+"</td><td><input class='form-control' name='nuip[]' type='number'></td><td><select name='motivosdestrucciones_id[]'required class= 'form-control'><option value='' id='motivosdestrucciones_id' >Selecione el Motivo Destruccion</option><option value=1>Anulación De Material Por Error En Preparación</option><option value=2>Atasco De Papel</option><option value=3>Fallo De Impresora</option><option value=4>Mala Calidad En La Toma De La Firma</option><option value=5>Mala Calidad En La Toma De La Reseña</option><option value=6>Mala Impresión</option><option value=7>Cumplido Los 8 Meses De Custodia</option></select></td></tr>";
                                variables.innerHTML += "<input name='id[]' value="+data[i][0].id+" hidden >";
                                //console.log(data[i][0].numpreparacion);
                            }
                    }
                });
            }else{
                Swal.fire({ icon: 'error', title:  'Oops...', text: 'Seleccione el Material de Identificacion que sera Destruido por el Centro de Acopio ..' })
            }  
        };
       
        
       
    </script>   
@endsection
