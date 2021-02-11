@extends('layouts.sirnec')
@section('guia') Contratos @endsection
@section('linkencabezado') @endsection


@section('titulo')
    CONTRATACION ACTIVA DE LA DELEGACION DEL {{ $depart[0]->name }}
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#generarresolucion"><img class="img-responsiveid float-right"  style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/descargarpdf.png')}}"  title="Generar Resolucion" /></a>
    <a href="" data-toggle="modal" data-target="#crearcontrato"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/crearraft.png')}}" title="Crear Contrato" /></a>
@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Funcionario</th>
                            <th>Oficina</th>
                            <th>Cargo</th>
                            <th>Res_No</th>
                            <th>Contrato</th>
                            <th>Fecha Inicial</th>
                            <th>Fecha Terminacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 14px">
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->namefuncionario }} </td>
                                <td> {{ $row->nameoficina }} </td>
                                <td> {{ $row->namecargo }} {{ $row->codigocargo }}-{{ $row->gradocargo }}</td>
                                <td> {{ $row->numresolucion }} </td>
                                <td> @if ($row->clascontrato_id == 1) Prov @endif  @if ($row->clascontrato_id == 2) Carrera @endif @if ($row->clascontrato_id == 3) Super @endif </td>
                                <td> {{ $row->fechainicial }} </td>
                                <td> {{ $row->fechaterminacion }} </td>
                                <td>
                                    <?php $id=$row->id;?>
                                    <center>

                                        @if($row->numactaposecion != '' )
                                            <a href="{{ route ('imprimir_acta', ['id' => $row->id ]) }}"><img src="{{ asset('images/descargarpdf.png') }}" title="Descargar Acta de Posesion {{$row->numactaposecion}}" width="32" height="32" ></a>

                                            {!! Form::model($row, ['method' => 'delete', 'route' => ['contrato_cancelar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                                {!! Form::hidden('id', $row->id) !!}
                                                <img src="{{ asset('images/borrar.png') }}" title="Cancelar Contrato" width="32" height="32" >
                                            {!! Form::close() !!}
                                        @else
                                            <a href="#" title="Generar Acta de Posesion" data-toggle="modal" data-target="#crearactaposesion" onclick="agregamodalactaposesion(<?php echo $id ?>)" ><img class="img-responsiveid float-right"><span style="color: #008080;"><i class="fas fa-file-contract" style="font-size:30px;"></i></span></a>
                                            <a href="{{ route('contrato_borrar', ['id' => $row->id ]) }}" title="Eliminar Contrato"><span style="color:#8B0000;"><i class="fa fa-eraser fa-2x " ></i></span></a>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal crear acta de posesion --}}
    <div class="modal fade bd-example-modal-lg" name='crearactaposesion' id="crearactaposesion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR ACTA DE POSESION</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => ['actasdeposesion'], 'method' => 'post', 'id' => 'creciondelacta', 'name' => 'creciondelacta' ]) !!}

                        <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">{!! Form::number('numactaposecion', null, ['class' => 'form-control', 'id' => 'numactaposecion', 'placeholder'=>"Acta Posesion No." , 'style' => 'margin-top:5px']) !!} </div>
                                    <div class="col-md-3">{!! Form::date ('fechaactaposesion', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:5px', 'id' => 'fechaactaposesion']) !!} </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">{!! Form::number('numcertificacion', null, ['class' => 'form-control', 'id' => 'numcertificacion', 'placeholder'=>"Certificacion No." , 'style' => 'margin-top:5px']) !!} </div>
                                    <div class="col-md-3">{!! Form::date ('fechacertificacion', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:5px', 'id' => 'fechacertificacion']) !!} </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">{!! Form::text('certdiciplinariosprocuraduria', null, ['class' => 'form-control', 'id' => 'certdiciplinariosprocuraduria', 'placeholder'=>"Certificacion Procuraduria No." , 'style' => 'margin-top:5px']) !!} </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">{!! Form::text('certantecedentespolicia', null, ['class' => 'form-control', 'id' => 'certantecedentespolicia', 'placeholder'=>"Certificacion Antecedentes de la Policia No." , 'style' => 'margin-top:5px']) !!} </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">{!! Form::text('certresponsabilidadfiscalcontraloria', null, ['class' => 'form-control', 'id' => 'certresponsabilidadfiscalcontraloria', 'placeholder'=>"Certificacion Contraloria No." , 'style' => 'margin-top:5px']) !!} </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">{!! Form::text('certmedidascorrectivaspolicia', null, ['class' => 'form-control', 'id' => 'certmedidascorrectivaspolicia', 'placeholder'=>"Certificacion Acciones Correctivas Policia No." , 'style' => 'margin-top:5px']) !!} </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <br>
                                {!! Form::number('identificador', null,['id' => 'identificador', 'hidden'] ) !!}
                                <div class="modal-footer">
                                    <a class="btn btn-info" href="{{ route('contratos')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                    <button type="submit" id="generaractapdf" class="btn btn-info">Generar</button>
                                </div>
                        </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
    {{-- fin modal crear acta de posesion --}}



    {{-- modal creacion de contratos--}}
    <div class="modal fade bd-example-modal-lg" name='crearcontrato' id="crearcontrato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            {!! Form::open(['method'=>'GET']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Creacion de Contratos </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">{!! Form::number('numresolucion', null, ['class' => 'form-control', 'id' => 'numresolucion', 'placeholder'=>"No. Resolucion" , 'style' => 'margin-top:5px']) !!} </div>
                            <div class="col-md-3">{!! Form::date ('fecharesolucion', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:5px', 'id' => 'fecharesolucion']) !!} </div>
                            <div class="col-md-3"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">{!! Form::select ('funcionario_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'funcionario_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Funcionario']) !!}</div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">{!! Form::select ('clascontrato_id', $clascontratos, null, ['class'=>'form-control', 'id' => 'clascontrato_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Tipo de Contrato']) !!}</div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><hr style="border: 0; height: 0; box-shadow: 0 1px 5px 1px #006400;"></div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><center>{!! Form::label ('fechaviavilidad', 'Fecha Viabilidad', ['style' => 'margin-top: 5px']) !!}</center>{!! Form::date ('fechaviavilidad', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:-5px', 'id' => 'fechaviavilidad']) !!}</div>
                            <div class="col-md-8" style="margin-top: 27px" id="adicional1">{!! Form::select ('funcionario2_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'funcionario2_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Funcionario que origina el Acto Administrativo']) !!}</div>
                            <div class="col-md-4" id="adicional3" style="display:none">
                                {!! Form::number('oficpostulacion', null, ['class' => 'form-control', 'id' => 'oficpostulacion', 'placeholder'=>"Ofic. Postulacion" , 'style' => 'margin-top:31px']) !!}
                            </div>
                            <div class="col-md-4" id="adicional4" style="display:none">
                                {!! Form::label ('fechaoficiopostulacion', 'Fecha Postulacion', ['style' => 'margin-top: 5px']) !!}{!! Form::date ('fechaoficiopostulacion', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:-5px', 'id' => 'fechaoficiopostulacion']) !!}
                            </div>
                        </div>


                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td width="200">{!!Form::radio('clase_id', 1, true )!!} Resolucion</td>
                                            <td width="200">{!!Form::radio('clase_id', 2 )!!} Encargo</td>
                                            <td width="200">{!!Form::radio('clase_id', 3 )!!} Libre Nombramiento</td>
                                        </tr>
                                        <tr>
                                            <td>{!!Form::radio('clase_id', 4 )!!} Licencia No remunerada</td>
                                            <td>{!!Form::radio('clase_id', 5 )!!} Licencia de Maternidad</td>
                                            <td>{!!Form::radio('clase_id', 6 )!!} Incapacidad</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><hr style="border: 0; height: 0; box-shadow: 0 1px 5px 1px #006400;"></div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><center>{!! Form::label ('fechainicial', 'Fecha Inicial') !!}</center> {!! Form::date ('fechainicial', null, ['class' => 'form-control ', 'required', 'id' => 'fechainicial']) !!} </div>
                            <div class="col-md-3"><center>{!! Form::label ('fechaterminacion', 'Fecha Terminacion') !!}</center>{!! Form::date ('fechaterminacion', null, ['class' => 'form-control ', 'required', 'id' => 'fechaterminacion']) !!} </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row" id="ubicacionesdependeclase" style="display:none">
                            <div class="col-md-6">{!! Form::select ('oficina_id', $oficinas, null, ['class'=>'form-control', 'id' => 'oficina_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione la Oficina']) !!}</div>
                            <div class="col-md-6">{!! Form::select ('ubicacioncargo_id', $ubicacioncargos, null, ['class'=>'form-control', 'id' => 'ubicacioncargo_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Cargos']) !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><hr style="border: 0; height: 0; box-shadow: 0 1px 5px 1px #006400;"></div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-12">
                                <center>{!!Form::radio('dele', 1, true)!!}&nbsp&nbspAmbos Delegados &nbsp&nbsp&nbsp&nbsp{!!Form::radio('dele', 2)!!}&nbsp&nbspUn Solo Delegado</center>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">{!! Form::select ('delegado1_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'delegado1_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Primer Delegado']) !!}</div>
                            <div class="col-md-5">{!! Form::select ('delegado2_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'delegado2_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Segundo Delegado']) !!}</div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><hr style="border: 0; height: 0; box-shadow: 0 1px 5px 1px #006400;"></div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">{!! Form::select ('cordinador_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'cordinador_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Cord. de Talento Humano']) !!}</div>
                            <div class="col-md-5">{!! Form::select ('registrador_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'registrador_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Registrador del Municipio']) !!}</div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row" id="adicional5"  style="display:none" >
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <center>{!! Form::label ('notaencargodespachos', 'Nota de Encargo Despachos', ['style' => 'margin-top: 5px']) !!}</center> <textarea style="margin-top: -5px" class="form-control" name="notaencargodespachos" id="notaencargodespachos" aria-label="With textarea" ></textarea>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">{!! Form::number('cargo2_id', null, ['class' => 'form-control', 'id' => 'cargo2_id', 'hidden']) !!} </div>
                        </div>

                    </div>
                    <div class="alert alert-primary" id="divmsg" style="display: none" role="alert" ></div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" style="color:White;text-decoration:none;" href="{{ route('contratos') }}">Close</a>
                        <input type="button" id="botonenviar" class="btn btn-primary" value="Guardar">
					</div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- fin modal creacion de contratos --}}

    <div class="alert alert-primary" id="divmsg" style="display: none" role="alert" ></div>


    {{-- modal crear resolucion --}}
    <div class="modal fade bd-example-modal-lg" name='generarresolucion' id="generarresolucion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">GENERAR RESOLUCION</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['route' => 'resolucionnombramientopdf', 'id'=>'generapdf', 'name' => 'generapdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                        <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">{!! Form::number('resolucionnumero', null, ['class' => 'form-control', 'id' => 'resolucionnumero', 'placeholder'=>"No. Resolucion" , 'style' => 'margin-top:5px']) !!} </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <a class="btn btn-info" href="{{ route('contratos')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                    <button type="submit" id="generarpdf" class="btn btn-info">Generar</button>
                                </div>
                        </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
    {{-- fin modal crear resolucion --}}

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){


            //me busca el funcionario2 y verifica que tenga un contrato activo
            $('select[name="funcionario2_id"]').on('change', function(){
                //console.log('escuchando')
                var funcionario2_id = $(this).val();
                if(funcionario2_id){
                    //console.log(funcionario_id);
                    $.ajax({
                        url:        '/getFuncionariocontratoactivo/'+funcionario2_id,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            //console.log(data);

                            if (data == 0) {
                                Swal.fire({ icon: 'error', title:  'Oops...', text: 'Para poder Efectuar esta Posesion, la vacante de Este Funcionario debera Tener un contrato Activo ..' })
                                $('select[name="funcionario2_id"]').val($('select[name="funcionario2_id"]').data("default-value")); //resetea el selec
                                //console.log( $('select[name="funcionario_id"]').val());
                            }else {
                                //console.log(data[0].cargo_id);
                                document.getElementById("cargo2_id").value=data[0].cargo_id;
                            }
                        }
                    });
                }

            });

            //valida el formulario antes de envio id del boton
            $('#generarpdf').click(function(){

                var resolucionnumero = $('#resolucionnumero').val();
                if(resolucionnumero == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Numero de Resolucion a Generar ..' })
                    return false;
                }

                document.getElementById('generapdf').submit();
            });

            //valida el formulario antes de envio id del boton
            $('#generaractapdf').click(function(){

                var numactaposecion = $('#numactaposecion').val();
                if(numactaposecion == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Numero de la Posesion a Generar ..' })
                    return false;
                    }

                var fechaactaposesion = $('#fechaactaposesion').val();
                if(fechaactaposesion == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la Fecha en que se Genera la Posesion ..' })
                    return false;
                    }

                var numcertificacion= $('#numcertificacion').val();
                if(numcertificacion == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Numero de Certificacion a Generar ..' })
                    return false;
                    }

                var fechacertificacion= $('#fechacertificacion').val();
                if(fechacertificacion == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la Fecha en que se Genera la Certificacion ..' })
                    return false;
                    }

                var certdiciplinariosprocuraduria= $('#certdiciplinariosprocuraduria').val();
                    if(certdiciplinariosprocuraduria == ""){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el No. de la Certificacion de la Procuraduria ..' })
                        return false;
                    }

                var certantecedentespolicia= $('#certantecedentespolicia').val();
                    if(certantecedentespolicia == ""){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el No. de la Certificacion de Antecedentes de la Policia ..' })
                        return false;
                    }

                var certresponsabilidadfiscalcontraloria= $('#certresponsabilidadfiscalcontraloria').val();
                    if(certresponsabilidadfiscalcontraloria == ""){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el No. de la Certificacion de la Contraloria ..' })
                        return false;
                    }

                var certmedidascorrectivaspolicia= $('#certmedidascorrectivaspolicia').val();
                    if(certmedidascorrectivaspolicia == ""){
                        Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el No. de la Certificacion de Medidas Correctivas de la Policia ..' })
                        return false;
                    }

                document.getElementById('creciondelacta').submit();
            });

            //funcion que valida los campos
            function validaForm(){

                if($("#numresolucion").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa el Numero de Resolucion ..' }); return false; }
                if($("#fecharesolucion").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa la Fecha de la Resolucion ..' }); return false; }
                if($("#funcionario_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Selecciona el Funcionario a Contratar ..' }); return false; }
                if($("#clascontrato_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Selecciona el Tipo de Contrato a Efectuarse ..' }); return false; }
                if($("#fechaviavilidad").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa la Fecha de Viabilidad..' }); return false; }
                if($('input[name="clase_id"]:checked').val() == 3){
                    if($("#oficpostulacion").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor ingrese el No. de Oficio de Postulacion ..' }); return false; }
                    if($("#fechaoficiopostulacion").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor ingrese la Fecha del Oficio de Postulacion ..' }); return false; }
                }
                if($('input[name="clase_id"]:checked').val() == 4){if($("#funcionario2_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Selecciona el Funcionario que Solicito la Licencia No Remunerada ..' }); return false; }}
                if($('input[name="clase_id"]:checked').val() == 5){if($("#funcionario2_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Selecciona el Funcionario que se encuentra en Licencia de Maternidad  ..' }); return false; }}
                if($('input[name="clase_id"]:checked').val() == 6){if($("#funcionario2_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Selecciona el Funcionario que se encuentra en Incapacidad ..' }); return false; }}
                if($("#fechainicial").val() == "" ){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor ingrese la Fecha Inicial del Contrato a Efectuarse..' }); return false; }
                if($("#fechaterminacion").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor ingrese la Fecha de Terminacion del Contrato a Efectuarse..' }); return false; }
                if($("#oficina_id").val() == "" && $('input[name="clase_id"]:checked').val() == 1 ){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione la Oficina a la Cual sera contratado el Funcionario..' }); return false; }
                if($("#oficina_id").val() == "" && $('input[name="clase_id"]:checked').val() == 2 ){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione la Oficina a la Cual sera contratado el Funcionario..' }); return false; }
                if($("#oficina_id").val() == "" && $('input[name="clase_id"]:checked').val() == 3 ){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione la Oficina a la Cual sera contratado el Funcionario..' }); return false; }

                if($("#ubicacioncargo_id").val() == "" && $('input[name="clase_id"]:checked').val() == 1){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Cargo que tendra el Funcionario a contratarse..' }); return false; }
                if($("#ubicacioncargo_id").val() == "" && $('input[name="clase_id"]:checked').val() == 2){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Cargo que tendra el Funcionario a contratarse..' }); return false; }
                if($("#ubicacioncargo_id").val() == "" && $('input[name="clase_id"]:checked').val() == 3){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Cargo que tendra el Funcionario a contratarse..' }); return false; }

                if($('input[name="dele"]:checked').val() == 1){
                    if($("#delegado1_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Primer Delegado que Firmara la Resolucion  ..' }); return false; }
                    if($("#delegado2_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Selecciona el Segundo Delegado que Firmara la Resolucion ..' }); return false; }
                    if ($("#delegado1_id").val() == $("#delegado2_id").val()) { Swal.fire({ icon: 'error', title:  'Oops...', text: 'Los dos Delegados Departamentales no pueden ser la Misma Persona por Favor Revise ..' }); return false;

                    }
                }
                if($('input[name="dele"]:checked').val() == 2){
                    if($("#delegado1_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Primer Delegado que Firmara la Resolucion  ..' }); return false; }
                    if($("#notaencargodespachos").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Numero de la resolucion de Asdignacion de Ambos Despachos ..' }); return false; }
                }
                if($("#cordinador_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Cordinador de Talento Humano  ..' }); return false; }
                if($("#clascontrato_id").val() == 3){
                    if($("#registrador_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Registrador Encargado de Firmar la Posesiones ..' }); return false; }
                }

                return true; // Si todo está correcto

            }

            //debe estar para enviar peticiones ajax
            $.ajaxSetup({ headers: {'X-CRFT-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

            $("#botonenviar").click( function() { //envia por ajax los datos
                if(validaForm()){
                    var numresolucion = $('#numresolucion').val();
                    var fecharesolucion = $('#fecharesolucion').val();
                    var funcionario_id = $('#funcionario_id').val();
                    var clascontrato_id = $('#clascontrato_id').val();
                    var fechaviavilidad = $('#fechaviavilidad').val();
                    var clase_id = $('input[name="clase_id"]:checked').val();
                    var funcionario2_id = $('#funcionario2_id').val();
                    var oficpostulacion = $('#oficpostulacion').val();
                    var fechaoficiopostulacion = $('#fechaoficiopostulacion').val();
                    var fechainicial = $('#fechainicial').val();
                    var fechaterminacion = $('#fechaterminacion').val();
                    var oficina_id = $('#oficina_id').val();
                    var ubicacioncargo_id = $('#ubicacioncargo_id').val();
                    var delegado1_id = $('#delegado1_id').val();
                    var delegado2_id = $('#delegado2_id').val();
                    var cordinador_id = $('#cordinador_id').val();
                    var registrador_id = $('#registrador_id').val();
                    var notaencargodespachos = $('#notaencargodespachos').val();
                    var cargo2_id = $('#cargo2_id').val();
                    var funcio_id = $('#funcio_id').val();

                    $.ajax({
                        url:        '/getGuardarcontrato/',
                        type:       'GET',
                        data:   {   numresolucion:numresolucion,
                                    fecharesolucion:fecharesolucion,
                                    funcionario_id:funcionario_id,
                                    clascontrato_id:clascontrato_id,
                                    fechaviavilidad:fechaviavilidad,
                                    clase_id:clase_id,
                                    funcionario2_id:funcionario2_id,
                                    cargo2_id:cargo2_id,
                                    funcio_id:funcio_id,
                                    oficpostulacion:oficpostulacion,
                                    fechaoficiopostulacion:fechaoficiopostulacion,
                                    fechainicial:fechainicial,
                                    fechaterminacion:fechaterminacion,
                                    oficina_id:oficina_id,
                                    ubicacioncargo_id:ubicacioncargo_id,
                                    delegado1_id:delegado1_id,
                                    delegado2_id:delegado2_id,
                                    cordinador_id:cordinador_id,
                                    registrador_id:registrador_id,
                                    notaencargodespachos:notaencargodespachos},
                        success:    function(data){
                            console.log(data);
                            mostrarMensaje(data.mensaje);
                            limpiarCampos();

                        }
                    });
                }
            });

            $("#registrador_id").hide();
            $('select[name="clascontrato_id"]').on('change', function(){
                var clascontrato_id = $(this).val();
                if (clascontrato_id == 3) {
                    $("#registrador_id").show();
                } else {
                    $("#registrador_id").hide();
                }
            });

            $("#adicional1").hide();
            $("#ubicacionesdependeclase").show();
            $('input[name="clase_id"]').change(function () {

                var claseselec = $(this).val();

                if (claseselec == 1) {
                    $("#adicional1").hide();
                    $("#ubicacionesdependeclase").show();
                    $("#adicional3").hide();
                    $("#adicional4").hide();
                }
                if (claseselec == 2) {
                    $("#adicional1").show();
                    $("#ubicacionesdependeclase").show();
                    $("#adicional3").hide();
                    $("#adicional4").hide();
                }
                if (claseselec == 3) {
                    $("#adicional1").hide();
                    $("#ubicacionesdependeclase").show();
                    $("#adicional3").show();
                    $("#adicional4").show();
                }
                if (claseselec == 4) {
                    $("#adicional1").show();
                    $("#ubicacionesdependeclase").hide();
                    $("#adicional3").hide();
                    $("#adicional4").hide();
                }
                if (claseselec == 5) {
                    $("#adicional1").show();
                    $("#ubicacionesdependeclase").hide();
                    $("#adicional3").hide();
                    $("#adicional4").hide();
                }
                if (claseselec == 6) {
                    $("#adicional1").show();
                    $("#ubicacionesdependeclase").hide();
                    $("#adicional3").hide();
                    $("#adicional4").hide();
                }

            });

            $('input[name="dele"]').change(function () {
                var dele = $(this).val();

                if (dele == 1) {
                    $("#adicional5").hide();
                    $("#delegado1_id").show();
                    $("#delegado2_id").show();
                }
                if (dele == 2 ) {
                    $("#adicional5").show();
                    $("#delegado1_id").show();
                    $("#delegado2_id").hide();
                }
            });

            //pone dentro de la ventana modal el focus en el input id numoficio
            $('#generarresolucion').on('shown.bs.modal', function () {
                $('input[name="resolucionnumero"]').focus();
            })

            $('#crearactaposesion').on('shown.bs.modal', function () {
                $('input[name="numactaposecion"]').focus();
            })

            $('#crearcontrato').on('shown.bs.modal', function () {
                $('input[name="numresolucion"]').focus();
            })

            //me busca el funcionario y si esta me avisa
            $('select[name="funcionario_id"]').on('change', function(){
                //console.log('escuchando')
                var funcionario_id = $(this).val();
                if(funcionario_id){
                    //console.log(funcionario_id);
                    $.ajax({
                        url:        '/getFuncionariocontrato/'+funcionario_id,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            //console.log(data);
                            if (data > 0) {
                                Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por Favor Selecciona un Funcionario diferente ya que el que elejiste tiene un contrato activo ..' })
                                $('select[name="funcionario_id"]').val($('select[name="funcionario_id"]').data("default-value")); //resetea el selec
                                //console.log( $('select[name="funcionario_id"]').val());
                            }
                        }
                    });
                }

            });

            //trae el los cargos disponibles de la oficina dependiendo de la ofifina escogida
            $('select[name="oficina_id"]').on('change', function(){
                //console.log('escuchando')
                var oficina_id = $(this).val();
                if(oficina_id){
                    //console.log(oficina_id);
                    $.ajax({
                        url:        '/getCargos/'+oficina_id,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            //console.log(data);
                            $('select[name="ubicacioncargo_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="ubicacioncargo_id"]')
                                .append('<option value="'+key+'">'+ value + '</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="ubicacioncargo_id"]').empty();

                }
            });


            function mostrarMensaje(mensaje){
                $("#divmsg").empty(); // limpia el contenido
                $("#divmsg").append("<p>"+mensaje+"</p>");
                $("#divmsg").show(500);
                $("#divmsg").hide(5000);
            }

            function limpiarCampos(){
                $('select[name="funcionario_id"]').val($('select[name="funcionario_id"]').data("default-value"));
                $('select[name="funcionario2_id"]').val($('select[name="funcionario2_id"]').data("default-value"));
                $('select[name="clascontrato_id"]').val($('select[name="clascontrato_id"]').data("default-value"));
                $('#fechainicial').val('');
                $('#fechaterminacion').val('');
                $('#oficpostulacion').val('');
                $('#fechaoficiopostulacion').val('');
                $('select[name="oficina_id"]').val($('select[name="oficina_id"]').data("default-value"));
                $('select[name="ubicacioncargo_id"]').val($('select[name="ubicacioncargo_id"]').data("default-value"));
            }


            // ventana de confirmacion de eliminado de registros
            $('table[data-form="formulario"]').on('click', '.form-delete', function(e){
                    e.preventDefault();
                    var $form=$(this);

                    Swal.fire({
                        title: 'Desea Cancelar el Contrato?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si!!',
                        cancelButtonText: 'No!!',
                        }).then((result) => {
                        if (result.value) {
                            $form.submit(),
                            Swal.fire(
                            // 'Eliminado!',
                            // 'El Usuario Ha sido Eliminado.',
                            // 'success'
                            )
                        }
                    })
                });




        });

        //funcion que carga el id en la modal de raft30
        function agregamodalactaposesion(id){
            $('#identificador').val(id);
        }
    </script>
@endsection
