@extends('layouts.sirnec')
@section('guia') Funcionarios @endsection
@section('linkencabezado') @endsection

@section('titulo')
    LISTADO DE FUNCIONARIOS
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    <a href="" data-toggle="modal" data-target="#crearfuncionario"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/agregar2.png')}}" title="Crear Funcionarios" /></a>
    <a href="" data-toggle="modal" data-target="#crearcertificacion"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/descargarpdf.png')}}" title="Crear Certificacion Laboral" /></a>

@endsection

@section('contenido')
    <div class="row card-body">
        <div class="col-12">
            <div class="table-responsive">
                <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Departamento </th>
                            <th>Cedula </th>
                            <th>Nombre </th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr >
                                <td> {{ $row->nombredepartamento }} </td>
                                <td> {{ $row->cedula }} </td>
                                <td> {{ $row->name }} </td>
                                <td>
                                    @if ($row->estado_id == 1) Activo @else Inactivo @endif
                                </td>
                                <td>
                                    <center>
                                    <a href="{{ route('funcionarios_editar', ['id' => $row->id ]) }}" title="Editar el Funcionario"><span style="color: #008080;"><i class="fas fa-pencil-alt" ></i></span></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('funcionarios_estudios', ['id' => $row->id ]) }}" title="Cargar Estudios del Funcionario"><span style="color: #B8860B;"><i class="fa fa-graduation-cap" ></i></span></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('funcionarios_familia', ['id' => $row->id ]) }}" title="Cargar Familiares del Funcionario"><span style="color:#FFA500;"><i class="fa fa-child" ></i></span></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('funcionarios_historialab', ['id' => $row->id ]) }}" title="Cargar Historia Laboral del Funcionario"><span style="color:#006400;"><i class="fa fa-id-badge" ></i></span></a>
                                    &nbsp;&nbsp;&nbsp;
                                    {{-- {!! Form::model($row, ['method' => 'delete', 'route' => ['funcionarios_eliminar', $row->id], 'class' =>'d-inline form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $row->id) !!}
                                            <button  style="background-color:#FFFFFF;border: none;" title="Eliminar este Funcionario"><i class="fa fa-trash-o fa-lg text-danger"></i></button>
                                        {!! Form::close() !!} --}}
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal creacion funcionarios --}}
    <div class="modal fade bd-example-modal-xl" id="crearfuncionario" name='crearfuncionario' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">CREACION DE FUNCIONARIOS</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'funcionarios_guardar', 'id'=>'funcio', 'name' => 'Funcio', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><center>{!! Form::label ('cedula', 'Cedula de Ciudadania No.') !!}{!! Form::number('cedula', null, ['class' => 'form-control', 'required', 'style' => 'margin-top:-8px'],['id' => 'cedula']) !!} </center></div>
                            <div class="col-md-4"></div>
                        </div>

                        <div id="inforbasica" style="display:none">
                            <div class="row" >
                                <div class="col-md-1"></div>
                                <div class="col-md-4">{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required',  'placeholder' => 'Nombre del Funcionario', 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-3" style="margin-top: 13px"><center>Masculino &nbsp&nbsp {!!Form::radio('genero_id', 1, true)!!}&nbsp&nbsp Femenino  &nbsp&nbsp{!!Form::radio('genero_id', 2)!!}</center></div>
                                <div class="col-md-2">{!! Form::select ('estadocivil_id', $estadocivils, null, ['class'=>'form-control', 'id' => 'estadocivil_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Estado Civil']) !!}  </div>
                                <div class="col-md-1">{!! Form::select ('rh_id', $rhs, null, ['class'=>'form-control', 'id' => 'rh_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'RH']) !!}  </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"><hr style="border: 0; height: 0; box-shadow: 0 1px 5px 1px #006400;"></div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="row" style="display:none">
                                <div class="col-md-3">{!! Form::select ('departamento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamento_id', 'style' => 'margin-top:-5px;',  'placeholder' => 'Departamento de Ubicacion']) !!}  </div>
                                <div class="col-md-3">{!! Form::select ('municipio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipio_id', 'style' => 'margin-top:-5px;',  'placeholder' => 'Municipio de Ubicacion ']) !!}</div>
                                <div class="col-md-4">{!! Form::select ('oficina_id', $oficina, null, ['class'=>'form-control', 'id' => 'oficina_id', 'style' => 'margin-top:-5px;',  'placeholder' => 'Seleccione la Oficina de Ubicacion']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">{!! Form::label ('expedicion', 'Fecha de Expedicion') !!}{!! Form::date ('expedicion', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:-5px'],['id' => 'expedicion']) !!} </div>
                                <div class="col-md-3">{!! Form::select ('deparcedula_id', $departamentos, null, ['class'=>'form-control', 'id' => 'deparcedula_id', 'style' => 'margin-top:27px;',  'placeholder' => 'Departamento de Expedicion']) !!}  </div>
                                <div class="col-md-3">{!! Form::select ('municcedula_id', $municipios, null, ['class'=>'form-control', 'id' => 'municcedula_id', 'style' => 'margin-top:27px;',  'placeholder' => 'Municipio de Expedicion']) !!}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">{!! Form::label ('nacimiento', 'Fecha de Nacimiento') !!}{!! Form::date ('nacimiento', null, ['class' => 'form-control ', 'required', 'style' => 'margin-top:-5px'],['id' => 'nacimiento']) !!} </div>
                                <div class="col-md-3">{!! Form::select ('paisnacimiento_id', $paises, null, ['class'=>'form-control', 'id' => 'paisnacimiento_id', 'required', 'style' => 'margin-top:27px', 'placeholder' => 'Pais de Nacimiento']) !!}  </div>
                                <div class="col-md-3">{!! Form::select ('deparnacimiento_id', $departamentos, null, ['class'=>'form-control', 'id' => 'deparnacimiento_id', 'required', 'style' => 'margin-top:27px', 'placeholder' => 'Departamento de Nacimiento']) !!}  </div>
                                <div class="col-md-3">{!! Form::select ('municnacimiento_id', $municnacimiento, null, ['class'=>'form-control', 'id' => 'municnacimiento_id', 'style' => 'margin-top:27px', 'placeholder' => 'Municipio de Nacimiento']) !!}</div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"> {!! Form::text('direccion', null, ['placeholder' => 'Direccion de Domicilio','class' => 'form-control ', 'id' => 'direccion', 'required', 'style' => 'margin-top:5px']) !!}  </div>
                                <div class="col-md-3">{!! Form::select ('barrio_id', $barrios, null, ['class'=>'form-control', 'id' => 'barrio_id', 'style' => 'margin-top:5px', 'placeholder' => 'Barrio']) !!} </div>
                                <div class="col-md-1"><a href="#" data-toggle="modal" data-target="#crearbarrio" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></div>
                                <div class="col-md-2"> {!! Form::text('telefono_fijo', null, ['placeholder' => 'Telefono No.','class' => 'form-control ', 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-2"> {!! Form::tel('movil', null, ['class' => 'form-control', 'id' => 'movil', 'placeholder' => 'Movil', 'style' => 'margin-top:5px']) !!} </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">{!! Form::select ('clasmilitar_id', $clasmils, null, ['class'=>'form-control', 'id' => 'clasmilitar_id', 'style' => 'margin-top:5px', 'placeholder' => 'Clase de Libreta']) !!}</div>
                                <div class="col-md-2" id="informilitar" style="display:none">
                                    <div class="col-md-12">{!! Form::number('libreta_militar', null, ['class' => 'form-control', 'placeholder'=>"No. Libreta" , 'style' => 'margin-top:5px']) !!} </div>
                                    <div class="col-md-10">{!! Form::text('distrito', null, ['placeholder' => 'No. Distrito','class' => 'form-control', 'style' => 'margin-top:5px']) !!} </div>
                                </div>
                                <div class="col-md-5"> {!! Form::email('emailpersonal', null, [ 'placeholder' => 'Email Personal','class' => 'form-control', 'id' => 'emailpersonal', 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-5"> {!! Form::email('emailcorporativo', null, ['placeholder' => 'Email Corporativo','class' => 'form-control','id' => 'emailcorporativo', 'style' => 'margin-top:5px']) !!} </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">{!! Form::text('name_contacto', null, ['class' => 'form-control', 'id' => 'name_contacto', 'required',  'placeholder' => 'Nombre del Contacto Emergencia', 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-2"> {!! Form::tel('movil_contacto', null, ['class' => 'form-control', 'id' => 'movil_contacto', 'placeholder' => 'Movil', 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-2">{!! Form::number('personasacargo', null, ['class' => 'form-control', 'id' => 'personasacargo', 'placeholder'=>"Personas a Cargo" , 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"><hr style="border: 0; height: 0; box-shadow: 0 1px 5px 1px #006400;"></div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-2">{!! Form::number('incrementoantiguedad', null, ['class' => 'form-control', 'id' => 'incrementoantiguedad', 'placeholder'=>"Incremento Antiguedad" , 'style' => 'margin-top:20px']) !!} </div>
                                <div class="col-md-2">{!! Form::number('auxiliotrasporte', null, ['class' => 'form-control', 'id' => 'auxiliotrasporte', 'placeholder'=>"Aux Trasporte" , 'style' => 'margin-top:20px']) !!} </div>
                                <div class="col-md-2">{!! Form::number('ley4ta', null, ['class' => 'form-control', 'id' => 'ley4ta', 'placeholder'=>"Ley 4" , 'style' => 'margin-top:20px']) !!} </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">{!! Form::number('primatecnicafs', null, ['class' => 'form-control', 'id' => 'primatecnicafs', 'placeholder'=>"Prima Fac Salarial" , 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-2">{!! Form::number('primatecnicanfs', null, ['class' => 'form-control', 'id' => 'primatecnicanfs', 'placeholder'=>"Prima No Fac Salarial" , 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-2">{!! Form::number('primageografica', null, ['class' => 'form-control', 'id' => 'primageografica', 'placeholder'=>"Prima Geografica" , 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-2">{!! Form::number('auxilioalimentacion', null, ['class' => 'form-control', 'id' => 'auxilioalimentacion', 'placeholder'=>"Aux Alimentacion" , 'style' => 'margin-top:5px']) !!} </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"><hr style="border: 0; height: 0; box-shadow: 0 1px 5px 1px #006400;"></div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">{!! Form::select ('banco_id', $bancos, null, ['class'=>'form-control', 'id' => 'banco_id', 'required', 'style' => 'margin-top:20px', 'placeholder' => 'Seleccione el Banco']) !!}  </div>
                                <div class="col-md-2">{!! Form::select ('tipocuenta_id', $tipocuentas, null, ['class'=>'form-control', 'id' => 'tipocuenta_id', 'required', 'style' => 'margin-top:20px', 'placeholder' => 'Tipo Cuenta']) !!}  </div>
                                <div class="col-md-3">{!! Form::number('numcuentabanco', null, ['class' => 'form-control', 'id' => 'numcuentabanco', 'placeholder'=>"Cuenta No." , 'style' => 'margin-top:20px']) !!} </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">{!! Form::select ('eps_id', $eps, null, ['class'=>'form-control', 'id' => 'eps_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Seleccione la EPS']) !!}  </div>
                                <div class="col-md-4">{!! Form::select ('pension_id', $pension, null, ['class'=>'form-control', 'id' => 'pension_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Seleccione el Fondo de Pensiones']) !!}  </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">{!! Form::select ('caja_id', $caja, null, ['class'=>'form-control', 'id' => 'caja_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Seleccione la Caja de Compensacion']) !!}  </div>
                                <div class="col-md-4">{!! Form::select ('arl_id', $arl, null, ['class'=>'form-control', 'id' => 'arl_id', 'required', 'style' => 'margin-top:5px', 'placeholder' => 'Seleccione la ARL']) !!}  </div>
                                <div class="col-md-2"></div>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    {{-- fin modal creacion funcionarios  --}}

    {{-- modal creacion barrios --}}
    <div class="modal fade bd-example-modal-lg" name='crearbarrio' id="crearbarrio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            {!! Form::open(['method'=>'GET']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Crear Barrio </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">{!! Form::select ('departamentobarrio_id', $departamentos, null, ['class'=>'form-control', 'id' => 'departamentobarrio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Departamento']) !!}  </div>
                            <div class="col-md-4">{!! Form::select ('municipiobarrio_id', $municipios, null, ['class'=>'form-control', 'id' => 'municipiobarrio_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Municipio']) !!}</div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6"> {!! Form::text('namebarrio', null, ['class' => 'form-control', 'id' => 'namebarrio', 'placeholder' => 'Nombre del Barrio', 'style' => 'margin-top:5px']) !!} </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>

                    <div class="alert alert-primary" id="divmsg" style="display: none" role="alert" ></div>

                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" style="color:White;text-decoration:none;" href="{{ route('funcionarios') }}">Close</a>
                        <button type="submit" id="guardar" class="btn btn-primary btnenviar">Guardar</button>
                    </div>

                </div>

            {!! Form::close() !!}

        </div>
    </div>
    {{-- fin modal creacion barrios  --}}

    {{-- modal creacion de certificacion Laboral --}}
    <div class="modal fade bd-example-modal-lg" name='crearcertificacion' id="crearcertificacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">


            {!! Form::open(['route' => 'funcionarios_certificacion', 'id'=>'certificacion', 'name' => 'certificacion', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Crear Certificacion Laboral </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" style="margin-top: 13px"><center>{!!Form::radio('certi_id', 1, true)!!}&nbsp&nbsp&nbsp&nbspCertificacion Laboral&nbsp&nbsp&nbsp&nbsp{!!Form::radio('certi_id', 2)!!}&nbsp&nbsp&nbsp&nbspConstancia de tiempo de Servicio </center></div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">{!! Form::number('numcertificacion', null, ['class' => 'form-control', 'id' => 'numcertificacion', 'placeholder'=>"Numero de Certificacion" , 'style' => 'margin-top:5px']) !!} </div>
                            <div class="col-md-6">{!! Form::select ('id', $funcionarios, null, ['class'=>'form-control', 'id' => 'id', 'style' => 'margin-top:5px;',  'placeholder' => 'Funcionario']) !!}  </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><hr style="border: 0; height: 0; box-shadow: 0 1px 5px 1px #006400;"></div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-12 c"><center><strong>Firmantes del Tiempo de Servicio</strong></center></div>
                        </div>



                        <div class="row" style="margin-top: 10px"  >
                            <div class="col-md-12" id="escogerdelegados"  style="display:none">
                                <center>{!!Form::radio('dele', 1, true)!!}&nbsp&nbspAmbos Delegados &nbsp&nbsp&nbsp&nbsp{!!Form::radio('dele', 2)!!}&nbsp&nbspUn Solo Delegado</center>
                            </div>
                        </div>
                        <div class="row" id="delegados"  style="display:none">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">{!! Form::select ('delegado1_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'delegado1_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Primer Delegado']) !!}</div>
                            <div class="col-md-5">{!! Form::select ('delegado2_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'delegado2_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Segundo Delegado']) !!}</div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row" style="margin-top: 10px" id="cordi">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">{!! Form::select ('cordinador_id', $funcionarios, null, ['class'=>'form-control', 'id' => 'cordinador_id', 'style' => 'margin-top:5px;',  'placeholder' => 'Seleccione el Cord. de Talento Humano']) !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row" id="nota"  style="display:none" >
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <center>{!! Form::label ('notaencargodespachos', 'Nota de Encargo Despachos', ['style' => 'margin-top: 5px']) !!}</center> <textarea style="margin-top: -5px" class="form-control" name="notaencargodespachos" id="notaencargodespachos" aria-label="With textarea" ></textarea>
                            </div>
                            <div class="col-md-3"></div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" style="color:White;text-decoration:none;" href="{{ route('funcionarios') }}">Close</a>
                        <button type="submit" id="btncertificar" class="btn btn-primary btncertificar">Crear</button>
                    </div>

                </div>

            {!! Form::close() !!}

        </div>
    </div>
    {{-- fin modal creacion certificacion Laboral  --}}




@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){

            $('input[name="certi_id"]').change(function () {
                var certi = $(this).val();

                if (certi == 1) {
                    $("#delegados").hide();
                    $("#escogerdelegados").hide();
                    $("#cordi").show();

                }
                if (certi == 2 ) {
                    $("#cordi").hide();
                    $("#delegados").show();
                    $("#escogerdelegados").show();
                }
            });


            $('input[name="dele"]').change(function () {
                var dele = $(this).val();

                if (dele == 1) {
                    $("#nota").hide();
                    $("#delegado1_id").show();
                    $("#delegado2_id").show();
                }
                if (dele == 2 ) {
                    $("#nota").show();
                    $("#delegado1_id").show();
                    $("#delegado2_id").hide();
                }
            });

            //trae el municipio dependiendo del departamento escogido
                $('select[name="departamentobarrio_id"]').on('change', function(){
                                    //console.log('escuchando')
                    var departamento_id = $(this).val();
                    if(departamento_id){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getMunucipios/'+departamento_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="municipiobarrio_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="municipiobarrio_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="municipiobarrio_id"]').empty();
                    }
                });

            //debe estar para enviar peticiones ajax
            $.ajaxSetup({ headers: {'X-CRFT-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

            $(".btnenviar").click(function(e){
                e.preventDefault();

                var departamentobarrio_id = $('#departamentobarrio_id').val();
                var municipiobarrio_id = $('#municipiobarrio_id').val();
                var namebarrio = $('#namebarrio').val();

                if(departamentobarrio_id == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Departamento en donde se ubica el Barrio!..' }) }
                if(municipiobarrio_id == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Municipio en donde se ubica el Barrio ! ..' }) }
                if(namebarrio == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa el Nombre del Barrio es Necesario y no puede ser vacio! ..' }) }

                $.ajax({
                    url:        '/getBarrios/',
                    type:       'GET',
                    data:   { departamentobarrio_id:departamentobarrio_id, municipiobarrio_id:municipiobarrio_id, namebarrio:namebarrio },
                    success:    function(data){
                        //console.log(data);
                        mostrarMensaje(data.mensaje);
                        limpiarCampos();
                    }
                });

            });

            function mostrarMensaje(mensaje){
                $("#divmsg").empty(); // limpia el contenido
                $("#divmsg").append("<p>"+mensaje+"</p>");
                $("#divmsg").show(500);
                $("#divmsg").hide(3000);
            }

            function limpiarCampos (){
                $('#departamentobarrio_id').val('');
                $('#municipiobarrio_id').val('');
                $('#namebarrio').val('');
            }

        //valida que se haya seleccionado un funcionario
        $('#btncertificar').click(function(){

            if($("#numcertificacion").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingresa el Numero de la Certificacion ..' }); return false; }
            if($("#id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Selecciona el Funcionario al Cual se le Generara la Certificacion  ..' }); return false; }

            if($('input[name="certi_id"]:checked').val() == 1){
                if($("#cordinador_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Cordinador de Talento Humano  ..' }); return false; }
            }

            if($('input[name="certi_id"]:checked').val() == 2){

                if($('input[name="dele"]:checked').val() == 2){
                    if($("#delegado1_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Primer Delegado que Firmara la Certificacion  ..' }); return false; }
                    if($("#notaencargodespachos").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Numero de la resolucion en la Cual se le Asignaron  Ambos Despachos ..' }); return false; }
                }
                if($('input[name="dele"]:checked').val() == 1){
                    if($("#delegado1_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Primer Delegado que Firmara la Certificacion   ..' }); return false; }
                    if($("#delegado2_id").val() == ""){ Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Selecciona el Segundo Delegado que Firmara la Certificacion  ..' }); return false; }
                    if ($("#delegado1_id").val() == $("#delegado2_id").val()) { Swal.fire({ icon: 'error', title:  'Oops...', text: 'Los dos Delegados Departamentales no pueden ser la Misma Persona por Favor Revise ..' }); return false;

                    }
                }
            }
            document.getElementById('certificacion').submit();
        });


        //valida el formulario antes de envio id del boton
        $('#guardar').click(function(){

            var cedula = $('#cedula').val();
                if(cedula == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Cargue el Numero de Cedula del Funcionario ..' })
                    return false;
                }
            var name = $('#name').val();
                if(name == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Nombre del Funcionario a Grabar ..' })
                    return false;
                }
            var estadocivil_id = $('#estadocivil_id').val();
                if(estadocivil_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el Estado Civil del Funcionario ..' })
                    return false;
                }
            var rh_id = $('#rh_id').val();
                if(rh_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione el RH del Funcionario ..' })
                    return false;
                }
            var fechaexpedicion = $('#expedicion').val();
                if(fechaexpedicion == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Cargue la Fecha de Expedicion de la Cedula de Ciudadania ..' })
                    return false;
                }
            var deparcedula_id = $('#deparcedula_id').val();
                if(	deparcedula_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor seleccione el Departamento de Expedicion de la Cedula de Ciudadania  ..' })
                    return false;
                }
            var nacimiento = $('#nacimiento').val();
                if(nacimiento == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Cargue la Fecha de Nacimiento del Funcionario ..' })
                    return false;
                }
            var paisnacimiento_id  = $('#paisnacimiento_id').val();
                if(paisnacimiento_id  == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor seleccione el Pais de Nacimiento ..' })
                    return false;
                }
            var deparnacimiento_id  = $('#deparnacimiento_id').val();
                if(deparnacimiento_id  == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor seleccione el Departamento de Nacimiento ..' })
                    return false;
                }
            var clasmilitar_id = $('#clasmilitar_id').val();
                if(clasmilitar_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Seleccione la Clase de Libreta Militar que Obtuvo el Funcionario  ..' })
                    return false;
                }
            var direccion = $('#direccion').val();
                if(direccion == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor ingrese la direccion del funcionario ..' })
                    return false;
                }
            var movil  = $('#movil').val();
                if(movil == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Numero de Celular del Funcionario ..' })
                    return false;
                }
            var emailpersonal  = $('#emailpersonal').val();
                if(emailpersonal == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Email Personal del Funcionario ..' })
                    return false;
                }

            //verifica que si sea un correo electronico
            emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                if (!emailRegex.test($('#emailpersonal').val())) {
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Email Correcto ..' })
                    return false;
                }

            var name_contacto   = $('#name_contacto').val();
                if( name_contacto == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Nombre del Contacto para Emergencias ..' })
                    return false;
                }
            var movil_contacto  = $('#movil_contacto').val();
                if( movil_contacto == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Movil del Contacto de Emergencias ..' })
                    return false;
                }
            var personasacargo  = $('#personasacargo').val();
                if( personasacargo == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Numero de Personas a Cargo ..' })
                    return false;
                }
            var banco_id  = $('#banco_id').val();
                if( banco_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Banco ..' })
                    return false;
                }
            var tipocuenta_id  = $('#tipocuenta_id').val();
                if( tipocuenta_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Tipo de Cuenta ..' })
                    return false;
                }
            var numcuentabanco  = $('#numcuentabanco').val();
                if( numcuentabanco == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Numero de la Cuenta ..' })
                    return false;
                }
            var eps_id  = $('#eps_id').val();
                if( eps_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la EPS del Funcionario..' })
                    return false;
                }
            var pension_id  = $('#pension_id').val();
                if( pension_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese el Fondo de Pension del Funcionario..' })
                    return false;
                }
            var caja_id  = $('#caja_id').val();
                if( caja_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la Caja de Compensacion del Funcionario..' })
                    return false;
                }
            var arl_id  = $('#arl_id').val();
                if( arl_id == ""){
                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'Por favor Ingrese la ARL del Funcionario ..' })
                    return false;
                }

            document.getElementById('funcio').submit();
        });


            //aparece el numero y distrito de la libreta militar dependiendo de la clase de libreta
            $('select[name="clasmilitar_id"]').on('change', function(){
                var clasmilitar_id = $(this).val();
                console.log(clasmilitar_id);

                if (clasmilitar_id == 1) {
                    $("#informilitar").show();
                } else {
                    $("#informilitar").hide();
                }
            });

            //mascaras de input
            jQuery(function($){
                    $("#movil_contacto").mask("(999) 999-9999");
                    $("#movil").mask("(999) 999-9999");
                });

            //trae el municipio dependiendo del departamento escogido
            $('select[name="departamento_id"]').on('change', function(){
                    //console.log('escuchando')
                    var departamento_id = $(this).val();
                    if(departamento_id){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getMunucipios/'+departamento_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="municipio_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="municipio_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="municipio_id"]').empty();
                    }
                });

            //trae la oficina dependiendo del municipio escogido
                $('select[name="municipio_id"]').on('change', function(){
                    //console.log('escuchando')
                    var municipio_id = $(this).val();
                    if(municipio_id){
                        //console.log(municipio_id);
                        $.ajax({
                            url:        '/getOficinasregistraduria/'+municipio_id,
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


                //trae el municipio dependiendo del departamento escogido
                $('select[name="deparcedula_id"]').on('change', function(){
                    //console.log('escuchando')
                    var departamento_id = $(this).val();
                    if(departamento_id){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getMunucipios/'+departamento_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="municcedula_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="municcedula_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="municcedula_id"]').empty();
                    }
                });


            //trae los departamentos dependiendo del pais escogido
            $('select[name="paisnacimiento_id"]').on('change', function(){
                //console.log('escuchando')
                var pais_id = $(this).val();
                if(pais_id){
                    console.log(pais_id);
                    $.ajax({
                        url:        '/getDepartamentos/'+pais_id,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            console.log(data);
                            $('select[name="deparnacimiento_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="deparnacimiento_id"]')
                                .append('<option value="'+key+'">'+ value + '</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="deparnaciento_id"]').empty();
                }
            });


            //trae el municipio dependiendo del departamento escogido
            $('select[name="deparnacimiento_id"]').on('change', function(){
                    //console.log('escuchando')
                    var departamento_id = $(this).val();
                    if(departamento_id){
                        //console.log(departamento_id);
                        $.ajax({
                            url:        '/getMunucipios/'+departamento_id,
                            type:       'GET',
                            dataType:   'json',
                            success:    function(data){
                                //console.log(data);
                                $('select[name="municnacimiento_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="municnacimiento_id"]')
                                    .append('<option value="'+key+'">'+ value + '</option>');
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="municnacimiento_id"]').empty();
                    }
                });



            //pone el focus en el modal
            $('#crearfuncionario').on('shown.bs.modal', function () {
                $('#cedula').focus();
            })

            //trae con el numero de cedula el registro encontrado en la tabla de funcionarios
            $('input[name="cedula"]').on('change', function(){
                var cedulafuncionario = $(this).val();
                console.log(cedulafuncionario);
                if(cedulafuncionario){
                    $.ajax({
                        url:        '/getFuncionario/'+cedulafuncionario,
                        type:       'GET',
                        dataType:   'json',
                        success:    function(data){
                            //console.log(data);
                            if(data != ''){
                                for( var i = 0; i<data.length; i++){
                                    Swal.fire({ icon: 'error', title:  'Oops...', text: 'La cedula de Ciudadania No. ' + cedulafuncionario + ' corresponde al Funcionario '+ data[i].name +' el cual ya se encuentra Registrad@ en la Base de Datos ..' })
                                    //console.log(data[i].name);
                                }
                                funcio.cedula.value = '';
                            }else {
                                //console.log(data);
                                $("#inforbasica").show();
                            }
                        }
                    });
                }
                else{
                }
            });









        });
    </script>
@endsection
