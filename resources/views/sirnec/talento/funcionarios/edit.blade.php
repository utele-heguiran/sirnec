@extends('layouts.sirnec')
@section('guia') Funcionarios @endsection
@section('linkencabezado') @endsection

@section('titulo')
    EDITAR FUNCIONARIO
    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
@endsection

@section('contenido')
                {!! Form::model($data, ['route' => ['funcionario_actualizar', $data->id], 'method' => 'PUT', 'id'=>'funcio']) !!}

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><center>{!! Form::label ('cedula', 'Cedula de Ciudadania No.') !!}{!! Form::number('cedula', null, ['class' => 'form-control', 'required', 'style' => 'margin-top:-8px'],['id' => 'cedula']) !!} </center></div>
                            <div class="col-md-4"></div>
                        </div>

                        <div>
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
                                <div class="col-md-3">{!! Form::select ('barrio_id', $barrios, null, ['class'=>'form-control', 'id' => 'barrio_id', 'style' => 'margin-top:5px', 'placeholder' => 'Barrio']) !!}</div>
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

                    <div class="modal-footer">
                        <a href="{{ route('funcionarios')}}"><input type="button" class="btn btn-secondary" value="Cancelar"></a>
                        <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
                    </div>
                {!! Form::close() !!}

@endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

        //pone en disable  el campo cedula
        $("#cedula").prop('disabled', true);

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
                if (!emailRegex.test(emailpersonal)) {
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
                //console.log(cedulafuncionario);
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
