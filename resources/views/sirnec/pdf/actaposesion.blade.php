@extends('layouts.formatoactapdf')

@section('textocarta')

@foreach ($user as $usuario)@endforeach
    <br><br>
    <div class="c" style="margin-top: -110px"><img style="width: 33%" src="../public/images/logo1.png"></div>
    <div class="c"><strong> ACTA DE POSESION No. {{ $data->numactaposecion }} </strong></div>
    <div class="c"><strong>({{ \Carbon\Carbon::parse($data->fechaactaposesion)->locale('es')->isoFormat('LL') }})</strong></div>
    <br><br><br>
    <div> NOMBRE&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<strong>{{strtoupper($data->funcionario)}}</strong></div>
    <div> CARGO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<strong>{{ strtoupper($data->cargo) }} {{ $data->codigo }} - {{ $data->grado }}</strong></div>
    <div> SUELDO&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<strong>$ {{number_format($data->sueldo, 0, ',', '.')}}</strong></div>
    <br><br>
    <div class=" j"> En el Municipio de {{ $usuario->municipionombre }}, el día {{ \Carbon\Carbon::parse($data->fechaactaposesion)->locale('es')->isoFormat('LL') }}, se presentó a este Despacho el Señor(a) <strong>{{strtoupper($data->funcionario)}}</strong>, identificado(a) con cédula de ciudadanía No. <strong>{{number_format($data->cedulafuncionario, 0, ',', '.')}}</strong> expedida en  {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}}, con el fin de tomar posesión como <strong>{{strtoupper($data->clascontrato)}}</strong> en el cargo de<strong> {{ strtoupper($data->cargo) }} {{ $data->codigo }} - {{ $data->grado }}</strong>, de la <strong>{{ $data->oficina }}</strong> en el Departamento del {{ucwords(strtolower($data->departamento))}}, con una asignación básica mensual de <strong>$ {{number_format($data->sueldo, 0, ',', '.')}}</strong> Para el cual fue nombrado mediante Resolución No. <strong>{{$data->numresolucion}} del {{ \Carbon\Carbon::parse($data->fecharesolucion)->locale('es')->isoFormat('LL') }}</strong>. En el periodo comprendido desde {{ \Carbon\Carbon::parse($data->fechainicial)->locale('es')->isoFormat('LL') }}, al  {{ \Carbon\Carbon::parse($data->fechaterminacion)->locale('es')->isoFormat('LL') }}, inclusive. </div>
    <br>
    <div >
        1.- Cédula de ciudadanía No. {{number_format($data->cedulafuncionario, 0, ',', '.')}} expedida en  {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}} <br>
        2.- Libreta Militar No. {{$funcionario[0]->libreta_militar }} Clase {{$funcionario[0]->clasmilitar }} Distrito {{$funcionario[0]->distrito }} <br>
        3.- Certificado de Antecedentes Disciplinarios Procuraduría No. {{$data->certdiciplinariosprocuraduria}} <br>
        4.- Certificado de Antecedentes Judiciales Policía Nacional -. {{$data->certantecedentespolicia}} <br>
        5.- Certificado de Responsabilidad Fiscal No. {{$data->certresponsabilidadfiscalcontraloria}} <br>
        6.- Certificado de Acciones Correctivas de la Policia No. {{$data->certmedidascorrectivaspolicia}} <br>
        7.- Declaración de Bienes y Rentas (Artículo 13, Ley 190/95) () <br>
        8.- Formato de Hoja de vida persona natural (Ley 190/1995 y 443 de 1998) () <br>
    </div>
    <br>
    <div class="j">Cumplidos así los requisitos legales propios al compareciente, el juramento de rigor y por la gravedad de la promesa, ofreció cumplir fielmente con los deberes de su cargo, obedecer y respetar la constitución y las leyes de la República. <br><br>La presente Acta de Posesion surtira Efectos Fiscales a partir del dia {{ \Carbon\Carbon::parse($data->fechainicial)->locale('es')->isoFormat('LL') }}. <br><br>En constancia se extiende y firma la presente diligencia como aparece. <br><br></div>
    <br><br><br><br><br>
    <div class="c"><strong><span style="text-decoration: overline">{{strtoupper($data->funcionario)}}</span></strong></div>

    <div class="c">El Posesionado </div>
    <br><br><br><br><br>
    <div class="c"><strong><span style="text-decoration: overline">{{ strtoupper($data->delegado1) }}</span></strong>   @if ($delegado2 != "") -  <strong><span style="text-decoration: overline">{{ strtoupper($delegado2->name) }}</span></strong> @else  @endif </div>

    @if ($data->notaencargodespachos == '')
        <div class="c"> Delegados Departamentales del Estado Civil en el {{$usuario->departamentonombre}} </div>
    @else
        <div class="c"> {{$data->notaencargodespachos}} </div>
    @endif
    <br>
    <div><strong>Dirección :</strong> {{$funcionario[0]->direccion}} - <strong>Telefono :</strong> {{$funcionario[0]->movil}} - {{$funcionario[0]->telefono_fijo}}</div>
    <div><strong>Banco :</strong> {{$funcionario[0]->banco}} -<strong> Tipo de Cuenta : </strong> {{$funcionario[0]->tipocuenta}} <strong> No. : {{$funcionario[0]->numcuentabanco}}</strong></div>
    <div><strong>Email :</strong> {{$funcionario[0]->emailpersonal}}</div>
    <div><strong>Eps :</strong> {{$funcionario[0]->eps}}</div>
    <div><strong>Pension :</strong> {{$funcionario[0]->pension}}</div>
    <div><strong>Arl :</strong> {{ucwords(strtolower($funcionario[0]->arl))}}</div>
    <div><strong>Caja :</strong> {{$funcionario[0]->caja}}</div>

{{-- FINALIZA EL ACTA DE POSESION --}}
<div class="page-break"></div>

    <div class="c" style="margin-top: -90px"><img style="width: 33%" src="../public/images/logo1.png"></div>
    <br><br><br><br>
    <div class="c"><strong> DELEGACION DEPERTAMENTAL DEL {{$data->departamento}}</strong></div>
    <br><br><br><br>
    <div class="c"><strong> CERTIFICACION No. {{ $data->numcertificacion }} </strong></div>
    <div class="c"><strong>({{ \Carbon\Carbon::parse($data->fechacertificacion)->locale('es')->isoFormat('LL') }})</strong></div>
    <br><br><br><br>
    <div class="c"><strong> EL SUSCRITO REGISTRADOR </strong></div>
    <br><br><br><br>
    <div class="c"><strong> HACE CONSTAR </strong></div>
    <br><br><br><br>
    <div class="j">Que revisada la hoja de Vida presentada por el señor(a) <strong>{{strtoupper($data->funcionario)}}</strong>, identificado(a) con cédula de ciudadanía No. <strong>{{number_format($data->cedulafuncionario, 0, ',', '.')}}</strong> expedida en  {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}}, cumple con los requisitos exigidos para el desempeño del cargo de <strong> {{ strtoupper($data->cargo) }} {{ $data->codigo }} - {{ $data->grado }}</strong>, de la <strong>{{ $data->oficina }}</strong> en el Departamento del {{ucwords(strtolower($data->departamento))}}, de conformidad con lo establecido en el Manual Especifico de Funciones y Competencias Laborales, adoptado por la Resolucion No. 17980 del 14 de Diciembre de 2018.</div>
    <br><br>
    <div > Dada en {{$usuario->municipionombre}}, el dia {{ \Carbon\Carbon::parse($data->fechacertificacion)->locale('es')->isoFormat('LL') }}.</div>
    <br><br><br><br><br>
    <div class="c"><strong><span style="text-decoration: overline">{{ strtoupper($data->delegado1) }}</span></strong>   @if ($delegado2 != "") -   <strong><span style="text-decoration: overline">{{ strtoupper($delegado2->name) }}</span></strong> @else  @endif </div>

    @if ($data->notaencargodespachos == '')
        <div class="c"> Delegados Departamentales del Estado Civil en el {{$usuario->departamentonombre}} </div>
    @else
        <div class="c"> {{$data->notaencargodespachos}} </div>
    @endif
    <br>

{{-- FINALIZA LA CERTIFICACION  --}}
<div class="page-break"></div>

    <br><br><br>
    {{$usuario->municipionombre}}, {{ \Carbon\Carbon::parse($data->fechaactaposesion)->locale('es')->isoFormat('LL') }}
    <br><br><br><br><br><br>
    Señores <br>
    <strong>{{ strtoupper($data->oficina) }}</strong> <br>
    Delegacion Departamental del  {{ucwords(strtolower($data->departamento))}} <br>
    {{$usuario->municipionombre}}
    <br><br><br>

    <div>Cordial saludo:</div><br><br>
    <div class="j">Con la presente de manera atenta manifiesto a ustedes la aceptación del cargo de {{ strtoupper($data->cargo) }}, en la Delegación Departamental del {{ucwords(strtolower($usuario->departamentonombre))}}, para el cual fui nombrado mediante la Resolución No. {{ $data->numresolucion }} del {{ \Carbon\Carbon::parse($data->fecharesolucion)->locale('es')->isoFormat('LL') }}, para el periodo comprendido entre el {{ \Carbon\Carbon::parse($data->fechainicial)->locale('es')->isoFormat('LL') }} al {{ \Carbon\Carbon::parse($data->fechaterminacion)->locale('es')->isoFormat('LL') }}. </div>
    <br><br>
    <div class="j"> De igual manera me permito autorizar que las notificaciones a que hubiere lugar se me realicen al siguiente correo electrónico: {{$funcionario[0]->emailpersonal}}</div>
    <br><br>
    Atentamente,
    <br><br><br><br><br><br>
    <strong><span style="text-decoration: overline">{{strtoupper($data->funcionario)}}</span></strong> <br>
    C.C. No. {{number_format($data->cedulafuncionario, 0, ',', '.')}} de {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}} <br>
    Tel </strong> {{$funcionario[0]->movil}} - {{$funcionario[0]->telefono_fijo}} <br>

{{-- FINALIZA LA CARTA DE ACPTACION --}}
<div class="page-break"></div>

    <div class="c" style="margin-top: -90px"> <img style="width: 33%" src="../public/images/logo1.png"></div>
    <br><br>
    <div class="j">
        <strong>1)</strong><span style="margin-left: 20px">Hago constar que estoy afiliado(a) a la eps {{$funcionario[0]->eps}} y  no tengo inconvenientes administrativos con esta u otra eps.</span><br><br>
        <strong>2)</strong><span style="margin-left: 20px">Estoy enterado que en caso de no aceptar el cargo o renunciar una vez me haya afiliado a eps, queda bloqueada mi afiliaciòn si me vinculo a otra entidad, hasta tanto la rnec informe en el pago mensual pila, la novedad de retiro.</span><br><br>
        <strong>3)</strong><span style="margin-left: 20px">Es de mi conocimiento que el ingreso de un afiliado cotizante tendrà efectos para el sistema de seguridad social desde el dia siguiente al que se inicie la relaciòn laboral.</span><br><br>
        <strong>4)</strong><span style="margin-left: 20px">Tengo conocimiento que en el mes de vinculaciòn la atenciòn por parte de la eps solamente  sera atendida en caso de urgencias vitales.<br><br>Es de anotar que si el funcionario viene afiliado como cotizante independiente, debe  cubrir el aporte correspondiente al mes de la vinculación y presentar novedad de retiro, <span style="text-decoration: underline">esto le garantizará la atencion inmediata a todo el grupo familiar, y la cobertura inmediata de la totalidad de  los beneficios contemplados en el plan obligatorio de  salud.</span></span><br><br>
        <strong>5)</strong><span style="margin-left: 20px">Sé que para los casos de reconocimiento de las licencias de maternidad, requerirán que la afiliada haya cotizado todo el periodo de gestación en forma ininterrumpida, y al culminar el vínculo con la RNEC se recomienda cotizar como independiente, pues esto le garantiza el pago de la prestación.</span><br><br>
        <strong>6)</strong><span style="margin-left: 20px">Es mi deber como cotizante  aportar la documentación necesaria de mi grupo familiar y tramitar la afiliación ante la E.P.S.</span><br><br>
        <strong>Periodo de protección laboral</strong> <br><br>
        <strong>7)</strong><span style="margin-left: 20px">una vez suspendido el pago de la cotización como consecuencia de la finalización de la relación laboral, el trabajador y su núcleo familiar gozaran de los beneficios del plan obligatorio de salud hasta por treinta (30) días mas contados a partir de la fecha de desafiliación, <span style="text-decoration: underline">siempre y cuando haya estado afiliado al sistema como mínimo los doce (12) meses anteriores</span></span><br><br>
        <strong>8)</strong><span style="margin-left: 20px; text-decoration: underline">Durante el periodo de protección laboral, al afiliado y su familia solo les serán atendidas aquellas enfermedades que venían en tratamiento o aquellas derivadas de  una urgencia vital</span><br><br>
        <strong>9)</strong><span style="margin-left: 20px">En todo caso, la atención solo se prolongara hasta la finalización del respectivo periodo de protección laboral.</span><br><br>
        <strong>10)</strong><span style="margin-left: 20px">las atenciones adicionales o aquellas que superen el periodo descrito, <span style="text-decoration: underline">correrán por cuenta del usuario.</span></span><br><br>
    </div>

    Atentamente,
    <br><br><br><br>
    <strong><span style="text-decoration: overline">{{strtoupper($data->funcionario)}}</span></strong> <br>
    C.C. No. {{number_format($data->cedulafuncionario, 0, ',', '.')}} de {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}} <br>
    {{$usuario->municipionombre}}, {{ \Carbon\Carbon::parse($data->fechaactaposesion)->locale('es')->isoFormat('LL') }}

{{-- FIN DE LA EPS --}}
<div class="page-break"></div>

    <div class="c" style="margin-top: -90px"><img style="width: 33%" src="../public/images/logo1.png"></div>
    <br><br>
    {{$usuario->municipionombre}}, {{ \Carbon\Carbon::parse($data->fechaactaposesion)->locale('es')->isoFormat('LL') }}
    <br><br><br><br>
    <strong>Señor(a)</strong><br>
    <span><strong>{{strtoupper($data->funcionario)}}</strong></span> <br>
    <span><strong>{{ strtoupper($data->cargo) }} {{ $data->codigo }} - {{ $data->grado }}</strong></span><br>
    <span><strong>{{ $data->oficina }}</strong></span><br>
    <br>
    Cordial Saludo <br><br>

    <strong>FUNCIONES ESPECIFICAS DE ACUERDO A LA LABOR QUE SE LE HA ENCOMENDADO.</strong> <br><br>
    <div class="j">De manera atenta nos permitimos relacionar las Funciones que usted debera desempeñar en el cargo de {{ $data->cargo }} {{ $data->codigo }} - {{ $data->grado }} en la {{ $data->oficina }} en el cual usted fue nombrado mediante Resolucion No. {{$data->numresolucion}} del {{ \Carbon\Carbon::parse($data->fecharesolucion)->locale('es')->isoFormat('LL') }}. </div>
    <br><br>
    <strong>PRPOSITO</strong>
    <br><br>
    <div class="j">{{ $data->proposito}}</div>
    <br><br>
    <strong>FUNCIONES ESENCIALES</strong>
    <br><br>
    <?php $porciones = explode("*", $data->funcionesesenciales); ?>
    <div class="j" >
        @foreach ($porciones as $row)
            <li style="margin-left: 25px">{{$row}}</li>
        @endforeach
    </div>
    <br><br>
    <strong>FUNCIONES GENERALES</strong>
    <br><br>
    <div class="j" >
        <li style="margin-left: 25px">Apoyar el grupo de trabajo en la realización de las actividades técnicas propias del cargo.</li>
        <li style="margin-left: 25px">Emplear las tecnologías que sirvan de apoyo al desarrollo de actividades operativas del área y del cargo.</li>
        <li style="margin-left: 25px">Ejecutar los trabajos técnicos que permitan el eficiente funcionamiento de las instalaciones y equipos de la Entidad, que le sean asignados.</li>
        <li style="margin-left: 25px">Cumplir con los procedimientos indicados, en la ejecución de los trabajos asignados.</li>
        <li style="margin-left: 25px">Realizar las reparaciones que le sean asignadas.</li>
        <li style="margin-left: 25px">Hacer revisiones periódicas de los equipos que le sean asignados, para establecer el plan de mantenimiento.</li>
        <li style="margin-left: 25px">Responder por la seguridad de los equipos y bienes puestos a su custodia y que esté utilizando para el cumplimiento de sus funciones.</li>
        <li style="margin-left: 25px">Realizar todas y cada una de sus acciones atendiendo los conceptos de autocontrol y autoevaluación. Art. 5º, literal e, Decreto 2145/99.</li>
        <li style="margin-left: 25px">Responder por el inventario de elementos devolutivos asignados.</li>
    </div>
    <br>
    <div class="j">Desempeñar las demás funciones que le sean asignadas por el Registrador Nacional, las que Reciba por Delegación y aquellas inherentes al Nivel, la Naturaleza de la Dependencia y del Cargo.</div>
    <br><br><br><br><br>
    Cordialmente,
    <br><br><br><br><br><br>
    <strong>{{strtoupper($cordinador->name)}}</strong> <br>
    Coordinador del Talento Humano
    <br><br><br>

{{-- FIN DE ENTREGA DE FUNCIONES      --}}
<div class="page-break"></div>

    <div class="row" style="margin-top: -60px">
        <div class="col-md-12" style="margin-left: -50px">
            <table >
                <thead>
                    <tr>
                        <td class="b f"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                        <td class="b c f" width="70" >PROCESO</td>
                        <td class="b c f" width="230" >GESTION DE LOS RECURSOS FINANCIEROS</td>
                        <td class="b c f" width="70" >CODIGO</td>
                        <td class="b c f" width="75" >GFFT02</td>
                    </tr>
                    <tr>
                        <td class="b c f" >FORMATO</td>
                        <td class="b c f" >BENEFICIARIO CUENTA</td>
                        <td class="b c f" >VERSION</td>
                        <td class="b c f" >1</td>
                    </tr>
                </thead>
            </table >
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12" style="text-align: right;margin-right: -30px;margin-top: -4px">
            <span class="f">Aprobado: 10/08/2016</span>
        </div>
    </div>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td width="148" class="b s f">TRAMITADO PARA:</td>
                            <td width="93" class="b s f" style="border-left: 1px solid  #000000" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CNE&nbsp;&nbsp;<input type="checkbox" style="margin-top: 5px" ></td>
                            <td width="93" class="b s f">RNEC&nbsp;&nbsp;<input type="checkbox" style="margin-top: 5px"></td>
                            <td width="93" class="b s f">FRR&nbsp;&nbsp;<input type="checkbox" checked style="margin-top: 5px"></td>
                            <td width="93" class="b s f" style="border-right: 1px solid  #000000">FSV&nbsp;&nbsp;<input type="checkbox" style="margin-top: 5px"></td>
                        </tr>
                        <tr>
                            <td class="b f">FECHA DILIGENCIAMIENTO:</td>
                            <td class="c b f">{{$data->fechaactaposesion}} </td>
                            <td class="b f" colspan="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERSONA NATURAL&nbsp;&nbsp;<input type="checkbox" checked style="margin-top: 5px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERSONA JURIDICA&nbsp;&nbsp;<input type="checkbox" style="margin-top: 5px"></td>
                        </tr>
                        <tr>
                            <td class="b f">BENEFICIARIO:</td>
                            <td class="b c" colspan="4" style="height:30px"><strong>{{strtoupper($data->funcionario)}}</strong></td>
                        </tr>
                        <tr>
                            <td class="b f">REGIMEN:</td>
                            <td class="b f" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REGIMEN COMUN&nbsp;&nbsp;<input type="checkbox" style="margin-top: 5px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REGIMEN SIMPLIFICADO&nbsp;&nbsp;<input type="checkbox" checked style="margin-top: 5px"></td>
                        </tr>
                        <tr>
                            <td class="b f">TIPO SOCIEDAD:</td>
                            <td class="b f" colspan="4" style="height:30px"></td>
                        </tr>
                        <tr>
                            <td class="b f" rowspan="2">C.C. / NIT:</td>
                            <td class="c b" rowspan="2" style="font-size: 14px"><strong>{{number_format($data->cedulafuncionario, 0, ',', '.')}}</strong></td>
                            <td class="b fz" style="height:25px">FECHA NACIMIENTO</td>
                            <td class="b c" colspan="2">{{$funcionario[0]->nacimiento}}</td>
                        </tr>
                        <tr>
                            <td class="b fz" style="height:25px">FECHA EXPEDICION CEDULA DE CIUDADANIA</td>
                            <td class="b c" colspan="2">{{$funcionario[0]->expedicion}}</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">TELEFONO:</td>
                            <td class="b c">{{$funcionario[0]->telefono_fijo}}</td>
                            <td class="b f">CELULAR:</td>
                            <td class="b c" colspan="2">{{$funcionario[0]->movil}}</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">DIRECCION:</td>
                            <td class="b c" colspan="4">{{$funcionario[0]->direccion}}</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">CIUDAD:</td>
                            <td class="b c" colspan="4">{{ strtoupper($usuario->municipionombre) }}</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">E-MAIL:</td>
                            <td class="b c" colspan="4">{{ $funcionario[0]->emailpersonal }} @if ($funcionario[0]->emailcorporativo != '') / {{ $funcionario[0]->emailcorporativo }} @endif</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">BANCO:</td>
                            <td class="b c" colspan="4">{{ strtoupper($funcionario[0]->banco) }}</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">NRO.CUENTA:</td>
                            <td class="b c" colspan="4"> No. {{ $funcionario[0]->numcuentabanco }}</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">TIPO DE CUENTA:</td>
                            <td class="b" colspan="4">
                                @if (intval($funcionario[0]->tipocuenta_id) == 1)
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AHORROS&nbsp;&nbsp;<input type="checkbox" checked style="margin-top: 5px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CORRIENTE &nbsp;&nbsp;<input type="checkbox" style="margin-top: 5px">
                                @else
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AHORROS&nbsp;&nbsp;<input type="checkbox" style="margin-top: 5px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CORRIENTE &nbsp;&nbsp;<input type="checkbox" checked  style="margin-top: 5px">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="b c s" colspan="5" style="height:30px">DATOS REPRESENTANTE LEGAL DE LA FIRMA CONTRATISTA</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">NOMBRE:</td>
                            <td class="b c" colspan="4"><strong><span>{{ strtoupper($data->delegado1) }}</span></strong>   @if ($delegado2 != "") - <strong><span>{{ strtoupper($delegado2->name) }}</span></strong> @endif</td>
                        </tr>
                        <tr>
                            <td class="b f" style="height:30px">No. C.C:</td>
                            <td class="b c" ><span>No. {{number_format($data->delegado1cedula, 0, ',', '.')}}</span>   @if ($delegado2 != "") <br> <span>No.  {{number_format($delegado2->cedula, 0, ',', '.')}}</span></strong> @endif</td>
                            <td class="b c fz" >FECHA EXPEDICION CEDULA DE CIUDADANIA</td>
                            <td class="b c" colspan="2"><span>{{ $data->delegado1expedicion }}</span>   @if ($delegado2 != "") / <span>{{ $delegado2->expedicion }}</span> @endif</td>
                        </tr>
                        <tr>
                            <td class="b f c" style="height:30px" colspan="5">Dando cumplimiento a la Circular Externa No.0005 del 15 de Febrero de 2006 del Ministerio de Hacienda y Crédito Público; <br> Numeral 14 "El beneficiario con este documento declara que la cuenta no presenta problemas y está activa"</td>
                        </tr>
                        <tr>
                            <td class="b f c" style="height:90px" colspan="5"></td>
                        </tr>
                        <tr>
                            <td class="b s c" style="height:30px" colspan="5">FIRMA DEL BENEFICIARIO</td>
                        </tr>
                        <tr>
                            <td class="b f c" style="height:30px" colspan="5"><strong>NOTA:</strong> Con el fin de obtener la validación del beneficiario Cuenta en el SIIF, se solicita su <span style="text-decoration: underline">DILIGENCIAMIENTO TOTAL</span>, <br> en letra legible sin enmendaduras ni tachones. Es importante que los datos del formato sean iguales a los de la Certificación Bancaria. <br>En caso de ser remitido vía fax favor confirmar el envío con la oficina que efectue el trámite. <br> Además adjuntar los siguientes documentos: Certificación Bancaria, Fotocopia Cédula de Ciudadanía y Registro Único Tributario RUT, para el caso de <br> Consorcios o Uniones temporales adjuntar además Acta de constitución de la Unión o Consorcio y RUT de cada uno de los integrantes.</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    <br><br>

{{-- FIN BENEFICIARIO CUENTA    --}}
<div class="page-break"></div>

    <div class="row" style="margin-top: -60px">
        <div class="col-md-12" style="margin-left: -50px">
            <table >
                <thead>
                    <tr>
                        <td class="b f"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                        <td class="b c f" width="70" >PROCESO</td>
                        <td class="b c f" width="230" >GESTIÓN DE INFRAESTRUCTURA TECNOLÓGICA</td>
                        <td class="b c f" width="70" >CODIGO</td>
                        <td class="b c f" width="70" >GIFT08</td>
                    </tr>
                    <tr>
                        <td class="b c f" >FORMATO</td>
                        <td class="b c f" >ACUERDO DE CONFIDENCIALIDAD Y ACEPTACIÓN DE CUMPLIMIENTO DE LAS POLÍTICAS DE SEGURIDAD DE LA INFORMACIÓN</td>
                        <td class="b c f" >VERSION</td>
                        <td class="b c f" >1</td>
                    </tr>
                </thead>
            </table >
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12" style="text-align: right;margin-right: -30px;margin-top: 5px">
            <span class="f">Aprobado: 28/02/2017</span>
        </div>
    </div>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td width="525" class="b s f c"><br><strong>CONSIDERACIONES:</strong><br><br>
                                El Congreso de la República estableció en la Ley 1273 de 2009. “Por medio de la cual se modifica el Código Penal,<br>
                                se crea un nuevo bien jurídico tutelado - denominado "de la protección de la información y de los datos"- <br>
                                y se preservan integralmente los sistemas que utilicen las tecnologías de la información y las comunicaciones,<br>
                                entre otras disposiciones". <br><br>
                                Ley 527 de 2000 “Por medio de la cual se define y reglamenta el acceso y uso de los mensajes de datos, <br>
                                del comercio electrónico y de las firmas digitales, y se establecen las entidades de certificación y se dictan otras disposiciones”, impone obligaciones <br> para el contratista y contratante conforme los artículo 8 y 9.” <br><br>
                                Mediante Ley estatutaria 1581 de 2012 de 17 de octubre, se dictan disposiciones generales para la protección de datos personales. <br><br>
                                Con el fin de proteger la Información esta debe garantizar la confidencialidad, <br>
                                integridad y disponibilidad de los datos a suministrar, <br>
                                esto como objetivo primordial de la Seguridad de la Información. <br><br>
                                Mediante la Resolución 4173 del 2016.  La REGISTRADURÍA NACIONAL DEL ESTADO CIVIL estableció las Políticas de Seguridad de la información. <br> http://190.0.19.19/GestionDocumental/Documentos/Resoluciones/R_RN_2016_04173.pdf <br><br>
                                El presente documento se establece como un acuerdo de confidencialidad y aceptación del cumplimiento de las políticas de seguridad de la <br> información de la REGISTRADURÍA NACIONAL DEL ESTADO CIVIL. <br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="blanco">espacio</td>
                        </tr>
                        <tr>
                            <td width="525" class="b f c"><br><strong>SEÑORES <br>REGISTRADURÍA NACIONAL DEL ESTADO CIVIL, </strong><br><br>
                                Yo, <strong>{{strtoupper($data->funcionario)}}</strong>,<br>
                                identificado (a) con Cédula de ciudadanía No. {{number_format($data->cedulafuncionario, 0, ',', '.')}} expedida en  {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}}, en calidad de servidor ( X )  contratista (    ) <br>
                                otro (    ) cual ____________________, doy fe que me he informado y tengo conocimiento del documento Políticas <br> de Seguridad de la Información <br><br>
                                (Res. 4173 del 20 mayo de 2016) y me comprometo a partir de la fecha a seguirlas, cumplirlas y aceptar las <br> responsabilidades que allí se indican. Así mismo, declaro que conozco de las implicaciones que conlleva desde el punto <br> de vista legal y disciplinario su incumplimiento. <br><br>
                                Por medio del presente documento doy mi consentimiento para que los activos informáticos de la Registraduría Nacional <br> del Estado Civil, que están a mi cargo y la información allí almacenada y transmitida a través de ellos sea monitoreada <br> por la Entidad o por quien ésta delegue. <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td width="525" class="b f c"><br><strong>FIRMADO EN </strong><br><br> LA CIUDAD DE {{ strtoupper($usuario->municipionombre) }}, DEPARTAMENTO DEL {{$data->departamento}} <br><br>
                                El dia {{ \Carbon\Carbon::parse($data->fechaactaposesion)->locale('es')->isoFormat('LL') }} <br><br><br>
                                <strong> <span style="text-decoration: underline">{{ strtoupper($data->cargo) }} {{ $data->codigo }} - {{ $data->grado }} </span></strong><br>
                                CARGO <br><br>

                                <strong> <span style="text-decoration: underline">{{ strtoupper($data->areafuncional) }} </span></strong><br>
                                DEPENDENCIA / EMPRESA CONTRATISTA / OTROS <br><br><br><br><br>

                                <strong> <span style="text-decoration: overline">ACEPTO</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>

{{-- FIN POLITICAS DE LA INFORMACION    --}}
<div class="page-break"></div>


<div class="row" style="margin-top: -60px">
    <div class="col-md-12" style="margin-left: -50px">
        <table >
            <thead>
                <tr>
                    <td class="b f"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                    <td class="b c f" width="70" >PROCESO</td>
                    <td class="b c f" width="230" >VINCULACIÓN DEL TALENTO HUMANO</td>
                    <td class="b c f" width="70" >CODIGO</td>
                    <td class="b c f" width="70" >VTFT06</td>
                </tr>
                <tr>
                    <td class="b c f" >FORMATO</td>
                    <td class="b c f" >ESTUDIO DE REQUISITOS</td>
                    <td class="b c f" >VERSION</td>
                    <td class="b c f" >0</td>
                </tr>
            </thead>
        </table >
    </div>
</div>
<div class="row" >
    <div class="col-md-12" style="text-align: right;margin-right: -30px;margin-top: 5px">
        <span class="f">Aprobado: 28/02/2017</span>
    </div>
</div>
<div class="row" style="margin-top: 5px">
    <div class="col-md-12" style="margin-left: -50px;" >
        <body >
            <table >
                <tbody>
                    <tr>
                        <td width="523" class="b">
                            <table style="padding: 10px">
                                <tbody>
                                    <tr>
                                        <td width="68" class="b f" rowspan="3">NOMBRE:<br>CEDULA:<br>CARGO:<br></td>
                                        <td width="435" class="b f">{{strtoupper($data->funcionario)}}</td>
                                    </tr>
                                    <tr>
                                        <td width="435" class="b f">No. {{number_format($data->cedulafuncionario, 0, ',', '.')}} expedida en  {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}}</td>
                                    </tr>
                                    <tr>
                                        <td width="435" class="b f">{{ strtoupper($data->cargo) }} {{ $data->codigo }} - {{ $data->grado }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
    </div>
</div>
<br>
<div class="row" style="margin-top: 5px">
    <div class="col-md-12" style="margin-left: -50px;" >
        <body >
            <table >
                <tbody>
                    <tr>
                        <td class="b s f c">REQUISITOS</td>
                        <td class="b s f c">EQUIVALENCIAS</td>
                    </tr>
                    <tr>
                        <td width="261" class="b f c" style="height:90px">
                            <?php $porciones = explode("*", $data->educacion); ?>
                            @foreach ($porciones as $row)
                                {{$row}}
                            @endforeach
                        </td>
                        <td width="261" class="b fz j">
                            <?php $porciones = explode("*", $data->equivalencias); ?>
                            @foreach ($porciones as $row)
                                <li style="margin-left: 10px">{{$row}}</li>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
    </div>
</div>
<br>
<div class="row" style="margin-top: 5px">
    <div class="col-md-12" style="margin-left: -50px;" >
        <body >
            <table >
                <tbody>
                    <tr>
                        <td class="b s f c " style="height:12px"></td>
                    </tr>
                    <tr>
                        <td width="525" class="b">
                            <table style="padding: 10px">
                                <tbody>
                                    <tr>
                                        <td width="250" class="b s f c" style="height:60px">REQUISITOS ACADEMICOS ACREDITADOS</td>
                                        <td width="250" class="b fz j">
                                            <?php $porciones = explode("*", $data->experiencia); ?>
                                            @foreach ($porciones as $row)
                                                <li style="margin-left: 10px">{{$row}}</li>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    <tr>
                </tbody>
            </table>
        </body>
    </div>
</div>
<br>
<div class="row" style="margin-top: 5px">
    <div class="col-md-12" style="margin-left: -50px;" >
        <body >
            <table >
                <tbody>
                    <tr>
                        <td class="b s f c" >RESUMEN HISTORIAL LABORAL</td>
                    </tr>
                    <tr>
                        <td width="525" class="b">
                            <table style="padding: 10px">
                                <tbody>
                                    <tr>
                                        <td width="125" class="b c f s" >CARGO</td>
                                        <td width="125" class="b c f s" >FECHA INGRESO</td>
                                        <td width="125" class="b c f s" >FECHA RETIRO</td>
                                        <td width="125" class="b c f s" >TIEMPO DE SERVICIO<br>EXPERIENCIA PROFESIONAL</td>
                                    </tr>

                                    @if (count($historialaboral) > 0)
                                        <?php $totalanos = 0; $totalmes = 0;?>
                                        @foreach ($historialaboral as $row)
                                            <tr>
                                                <td class="b c f ">{{$row->cargo}}</td>
                                                <td class="b c f ">{{$row->fechaingreso}}</td>
                                                <td class="b c f ">{{$row->fecharetiro}}</td>
                                                <?php
                                                    $fechaingreso = date_create($row->fechaingreso);
                                                    $fecharetiro = date_create($row->fecharetiro);
                                                    $diferencia = date_diff($fechaingreso, $fecharetiro);

                                                    $totalanos += intval($diferencia->y);
                                                    $totalmes += intval($diferencia->m);
                                                ?>
                                                <td class="b c f "> {{ $diferencia->y }} Años {{ $diferencia->m }} Meses</td>
                                            </tr>
                                        @endforeach
                                        @for ($i = 1; $i <= 8 - count($historialaboral); $i++)
                                            <tr>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                            </tr>
                                        @endfor
                                        <tr>
                                            <td width="125" class="b c f s" colspan="3">TOTAL</td>
                                            <td width="125" class="b c f s" >{{ $totalanos }} Años {{ $totalmes }} Meses</td>
                                        </tr>
                                    @else
                                        @for ($i = 1; $i <= 8; $i++)
                                            <tr>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                            </tr>
                                        @endfor
                                        <td width="125" class="b c f s" colspan="3">TOTAL</td>
                                        <td width="125" class="b c f s" >0 Años 0 Meses</td>

                                    @endif

                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
    </div>
</div>
<br>
<div class="row" style="margin-top: 5px">
    <div class="col-md-12" style="margin-left: -50px;" >
        <body >
            <table >
                <tbody>
                    <tr>
                        <td class="b s f c" style="height:12px"></td>
                    </tr>
                    <tr>
                        <td width="522" class="b f c" style="height:90px">
                            <br><br><br>
                            <strong>CONCEPTO DE CUMPLIMIENTO</strong> <br><br><br>

                            El Servidor Público <strong>{{strtoupper($data->funcionario)}}</strong>, identificado con la cédula No. {{number_format($data->cedulafuncionario, 0, ',', '.')}} expedida en  {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}} <br>
                            cumple con los requisitos para ecceder al cargo de <strong>{{ strtoupper($data->cargo) }} {{ $data->codigo }} - {{ $data->grado }}</strong><br>
                            <br><br><br><br><br>
                            <strong>{{strtoupper($cordinador->name)}}</strong> <br>
                            COORDINADOR TALENTO HUMANO DELEGACIÓN DEL {{$usuario->departamentonombre}} <br>
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
    </div>
</div>

{{-- FIN ESTUDIO DE REQUICITOS    --}}
<div class="page-break"></div>

    <div class="row" style="margin-top: -60px">
        <div class="col-md-12" style="margin-left: -50px">
            <table >
                <thead>
                    <tr>
                        <td class="b f"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                        <td class="b c f" width="70" >PROCESO</td>
                        <td class="b c f" width="230" >VINCULACIÓN DEL TALENTO HUMANO</td>
                        <td class="b c f" width="70" >CODIGO</td>
                        <td class="b c f" width="70" >VTFT04</td>
                    </tr>
                    <tr>
                        <td class="b c f" >FORMATO</td>
                        <td class="b c f" >DESIGNACIÓN BENEFICIARIOS PÓLIZA SEGURO DE VIDA</td>
                        <td class="b c f" >VERSION</td>
                        <td class="b c f" >2</td>
                    </tr>
                </thead>
            </table >
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12" style="text-align: right;margin-right: -30px;margin-top: 5px">
            <span class="f">Aprobado: 09/11/2018</span>
        </div>
    </div>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td width="523" class="b" >
                                <table style="padding: 10px">
                                    <tbody>
                                        <tr>
                                            <td width="50" class="c f" rowspan="2" style="border-left: #000000 1px solid;border-top: #000000 1px solid;border-bottom: #000000 1px solid; "><strong>FECHA :</strong></td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%d')}}  </td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%m')}}  </td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%Y')}}  </td>
                                            <td width="60" class="c f" style="border-top: #000000 1px solid;border-bottom: #000000 1px solid;" rowspan="2"><strong>CIUDAD : </strong></td>
                                            <td width="301" class="c f" style="border-top: #000000 1px solid;border-bottom: #000000 1px solid;border-right: #000000 1px solid" rowspan="2">{{ strtoupper($usuario->municipionombre) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30" class="c f" style="border-left: #000000 1px solid;border-bottom: #000000 1px solid;">DIA</td>
                                            <td width="30" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid;border-left: #000000 1px solid">MES</td>
                                            <td width="30" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid">AÑO</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    <br>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td class="b s f c ">TOMADOR</td>
                        </tr>
                        <tr>
                            <td width="525" class="b">
                                <table style="padding: 10px; margin-left:5px">
                                    <tbody>
                                        <tr>
                                            <td class="c b f" colspan="10"><strong>{{strtoupper($data->funcionario)}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="f c" colspan="10" style="border-right: #000000 1px solid;border-left: #000000 1px solid">DOCUMENTO DE IDENTIFICACION</td>
                                        </tr>
                                        <tr>
                                            <td class="f c" width="48" style="height:30px;border-left: #000000 1px solid"><input type="radio" checked><span style="margin-top: -10px"> C.C.</span></td>
                                            <td class="f c" width="48"><input type="radio" ><span style="margin-top: -10px"> C.E.</span></td>
                                            <td class="f c" width="48" style="height:30px">NUMERO :</td>
                                            <td class="f c" colspan="2" ><span style="text-decoration: underline">{{number_format($data->cedulafuncionario, 0, ',', '.')}}</span></td>
                                            <td class="f c" colspan="2">LUGAR DE EXPEDICION :</td>
                                            <td class="f c" colspan="3" style="border-right: #000000 1px solid"><span style="text-decoration: underline">{{strtoupper($funcionario[0]->municcedula)}} {{$funcionario[0]->deparcedula}}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="b s f c" colspan="3">LUGAR DE NACIMIENTO</td>
                                            <td class="b s f c" colspan="3" >FECHA DE NACIMIENTO</td>
                                            <td class="b s f c" >EDAD</td>
                                            <td class="b s f c" colspan="3">ESTADO CIVIL</td>
                                        </tr>
                                        <tr>
                                            <td width="48" class="c f" style="border-left: #000000 1px solid;border-bottom: #000000 1px solid;border-right: #000000 1px solid;" colspan="3" rowspan="2">{{$funcionario[0]->deparnacimiento}}</td>
                                            <td width="48" class="c f">{{Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%d')}}</td>
                                            <td width="48" class="c f">{{Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%m')}}</td>
                                            <td width="48" class="c f">{{Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%Y')}}</td>
                                            <?php
                                                $edad = Carbon\Carbon::createFromDate(Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%Y'),Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%d'),Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%m'))->age;
                                            ?>
                                            <td width="48" class="c f" rowspan="2" style="border-left: #000000 1px solid;border-bottom: #000000 1px solid;border-right: #000000 1px solid;">{{ $edad }}</td>
                                            <td width="48" class="c fz"> @if ($funcionario[0]->estadocivil_id == 3)<span style="margin-top: -10px"><input type="radio" checked>CASADO</span> @else <span style="margin-top: -10px"><input type="radio">CASADO</span> @endif </td>
                                            <td width="48" class="c fz"> @if ($funcionario[0]->estadocivil_id == 1)<span style="margin-top: -10px"><input type="radio" checked>SOLTERO</span> @else <span style="margin-top: -10px"><input type="radio">SOLTERO</span> @endif </td>
                                            <td width="60" class="c fz" style="border-right: #000000 1px solid;"> @if ($funcionario[0]->estadocivil_id == 2)<span style="margin-top: -10px"><input type="radio" checked>UNION LIBRE</span> @else <span style="margin-top: -10px"><input type="radio">UNION LIBRE</span> @endif </td>
                                        </tr>
                                        <tr>
                                            <td width="48" class="c f" style="border-left: #000000 1px solid;border-bottom: #000000 1px solid;">DIA</td>
                                            <td width="48" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid;border-left: #000000 1px solid">MES</td>
                                            <td width="48" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid">AÑO</td>
                                            <td width="48" class="c fz" style="border-bottom: #000000 1px solid">@if ($funcionario[0]->estadocivil_id == 5)<span style="margin-top: -10px"><input type="radio" checked>VIUDO</span> @else <span style="margin-top: -10px"><input type="radio">VIUDO</span> @endif </td>
                                            <td width="48" class="fz" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid;" colspan="2">@if ($funcionario[0]->estadocivil_id == 4)<span style="margin-top: -10px"><input type="radio" checked>DIVORCIADO</span> @else <span style="margin-top: -10px"><input type="radio">DIVORCIADO</span> @endif </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        <tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    <br>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td class="b s f c" >BENEFICIARIOS POLIZA DE VIDA GRUPO</td>
                        </tr>
                        <tr>
                            <td width="525" class="b">
                                <table style="padding: 10px">
                                    <tbody>
                                        <tr>
                                            <td width="250" class="b c f s" >NOMBRES Y APELLIDOS</td>
                                            <td width="110" class="b c f s" >IDENTIFICACION</td>
                                            <td width="110" class="b c f s" >PARENTESCO</td>
                                            <td width="30" class="b c f s" >%</td>
                                        </tr>
                                        @foreach ($familiares as $row)
                                            <tr>
                                                <td class="b c f ">{{$row->name}}</td>
                                                <td class="b c f ">{{number_format($row->cedula, 0, ',', '.')}}</td>
                                                <td class="b c f ">{{$row->parentesco}}</td>
                                                <td class="b c f ">{{$row->porcentpoliza}} %</td>
                                            </tr>
                                        @endforeach
                                        @for ($i = 1; $i <= 8 - count($familiares); $i++)
                                            <tr>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    <br>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td class="b s f c" >BENEFICIARIOS CONTINGENTES POLIZA DE VIDA GRUPO</td>
                        </tr>
                        <tr>
                            <td width="525" class="b">
                                <table style="padding: 10px">
                                    <tbody>
                                        <tr>
                                            <td width="250" class="b c f s" >NOMBRES Y APELLIDOS</td>
                                            <td width="110" class="b c f s" >IDENTIFICACION</td>
                                            <td width="110" class="b c f s" >PARENTESCO</td>
                                            <td width="30" class="b c f s" >%</td>
                                        </tr>
                                        @foreach ($familiares2 as $row)
                                            <tr>
                                                <td width="250" class="b c f ">{{$row->name}}</td>
                                                <td width="110" class="b c f ">{{number_format($row->cedula, 0, ',', '.')}}</td>
                                                <td width="110" class="b c f ">{{$row->parentesco}}</td>
                                                <td width="30" class="b c f ">{{$row->porcentpolizacontingente}} %</td>
                                            </tr>
                                        @endforeach
                                        @for ($i = 1; $i <= 8 - count($familiares); $i++)
                                            <tr>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                <td class="b c f blanco">0</td>
                                                </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    <br>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td class="f c blanco">0</td>
                            <td class="f c" style="height:30px">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td width="100"class="c blanco">campo</td>
                                            <td width="50" class="c b blanco" style="height:90px;width: 80px;margin-left: 78px">campo</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="261" class="f c" style="text-decoration: overline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td width="261" class="f c" style="height:30px">IMPRESION DACTILAR</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>

{{-- FIN DESIGNACION DE BENEFICIARIO CUENTA    --}}
<div class="page-break"></div>


    <div class="row" style="margin-top: -60px">
        <div class="col-md-12" style="margin-left: -50px">
            <table >
                <thead>
                    <tr>
                        <td class="b f"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                        <td class="b c f" width="70" >PROCESO</td>
                        <td class="b c f" width="230" >VINCULACIÓN DEL TALENTO HUMANO</td>
                        <td class="b c f" width="70" >CODIGO</td>
                        <td class="b c f" width="70" >VTFT03</td>
                    </tr>
                    <tr>
                        <td class="b c f" >FORMATO</td>
                        <td class="b c f" >DECLARACIÓN JURAMENTADA</td>
                        <td class="b c f" >VERSION</td>
                        <td class="b c f" >6</td>
                    </tr>
                </thead>
            </table >
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12" style="text-align: right;margin-right: -30px;margin-top: 5px">
            <span class="f">Aprobado: 09/08/2016</span>
        </div>
    </div>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td width="523" class="b" >
                                <table style="padding: 10px">
                                    <tbody>
                                        <tr>
                                            <td width="50" class="c f" rowspan="2" style="border-left: #000000 1px solid;border-top: #000000 1px solid;border-bottom: #000000 1px solid; "><strong>FECHA :</strong></td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%d')}}  </td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%m')}}  </td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%Y')}}  </td>
                                            <td width="60" class="c f" style="border-top: #000000 1px solid;border-bottom: #000000 1px solid;" rowspan="2"><strong>CIUDAD : </strong></td>
                                            <td width="301" class="c f" style="border-top: #000000 1px solid;border-bottom: #000000 1px solid;border-right: #000000 1px solid" rowspan="2">{{ strtoupper($usuario->municipionombre) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30" class="c f" style="border-left: #000000 1px solid;border-bottom: #000000 1px solid;">DIA</td>
                                            <td width="30" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid;border-left: #000000 1px solid">MES</td>
                                            <td width="30" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid">AÑO</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    <br>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td class="b s f c ">DATOS PERSONALES</td>
                        </tr>
                        <tr>
                            <td width="525" class="b">
                                <table style="padding: 10px; margin-left:5px">
                                    <tbody>
                                        <tr>
                                            <td class="c b f" colspan="10"><strong>{{strtoupper($data->funcionario)}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="f c" colspan="8" style="border-left: #000000 1px solid">DOCUMENTO DE IDENTIFICACION</td>
                                            <td class="f c" colspan="2" style="border-right: #000000 1px solid">FECHA EXPEDICION</td>
                                        </tr>
                                        <tr>
                                            <td class="f c" style="height:30px;border-left: #000000 1px solid"><input type="radio" checked><span style="margin-top: -10px"> C.C.</span></td>
                                            <td class="f c" ><input type="radio" ><span style="margin-top: -10px"> C.E.</span></td>
                                            <td class="f c" style="height:30px">NUMERO :</td>
                                            <td class="f c" ><span style="text-decoration: underline">{{number_format($data->cedulafuncionario, 0, ',', '.')}}</span></td>
                                            <td class="f c" colspan="2">LUGAR DE EXPEDICION :</td>
                                            <td class="f c" colspan="2" ><span style="text-decoration: underline">{{strtoupper($funcionario[0]->municcedula)}} </span></td>
                                            <td class="f c" colspan="2" style="border-right: #000000 1px solid">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td width="10" class="blanco c">0</td>
                                                            <td width="20" class="b c">{{Carbon\Carbon::parse($funcionario[0]->expedicion)->formatLocalized('%d')}}</td>
                                                            <td width="10" class="blanco c">0</td>
                                                            <td width="20" class="b c">{{Carbon\Carbon::parse($funcionario[0]->expedicion)->formatLocalized('%m')}}</td>
                                                            <td width="10" class="blanco c">0</td>
                                                            <td width="20" class="b c">{{Carbon\Carbon::parse($funcionario[0]->expedicion)->formatLocalized('%Y')}}</td>
                                                            <td width="10" class="blanco c">0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid;border-left: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="48" style="border-bottom: #000000 1px solid">0</td>
                                            <td class="f c blanco" width="60" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        <tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    <br>
    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td class="b s f c" >DECLARACIÓN JURAMENTADA</td>
                        </tr>
                        <tr>
                            <td width="513" class="b" style="padding: 10px">
                                <table style="padding: 10px" class="b">
                                    <tbody>
                                        <tr>
                                            <td width="25"class="blanco">0</td>
                                            <td width="450" >
                                                <span class="c"><strong>Para efectos de tomar posesión, manifiesto bajo gravedad de juramento que:</strong></span><br><br>
                                                <span class="j" style="margin-left: 20px">
                                                    <li>la fecha no me encuentro incurso en causal de inhabilidad, incompatibilidad o prohibición para ejercer el cargo al cual he sido nombrado.</li><br><br>
                                                    <li>A la fecha no tengo reconocimiento de pensión por el régimen de prima media con prestación definida.</li><br><br>
                                                    <li>Los diplomas, actas de grado, matrícula o tarjeta profesional aportados para el proceso de vinculación gozan de toda validez y autenticidad; para lo cual, autorizo que sean verificados ante las instituciones educativas o entidades que hayan expedido los documentos.</li><br><br>
                                                    <li>En caso de que sobrevenga al acto de nombramiento o de posesión alguna inhabilidad o incompatibilidad, me comprometo a advertirlo inmediatamente al nominador correspondiente, igualmente, autorizo a la Registraduría Nacional del Estado Civil para que consulte mi información en las bases de datos de la Procuraduría, Contraloría y Policía Nacional.</li><br><br>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="blanco">0</td>
                                            <td class="c" style="text-decoration: overline"><br><br><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>


{{-- FIN DECLARACION JURAMENTADA    --}}
<div class="page-break"></div>


    <div class="row" style="margin-top: -80px">
        <div class="col-md-12" style="margin-left: -50px">
            <table >
                <thead>
                    <tr>
                        <td class="b f"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                        <td class="b c f" width="70" >PROCESO</td>
                        <td class="b c f" width="230" >VINCULACIÓN DEL TALENTO HUMANO</td>
                        <td class="b c f" width="70" >CODIGO</td>
                        <td class="b c f" width="70" >VTFT07</td>
                    </tr>
                    <tr>
                        <td class="b c f" >FORMATO</td>
                        <td class="b c f" >INFORMACIÓN PERSONAL</td>
                        <td class="b c f" >VERSION</td>
                        <td class="b c f" >4</td>
                    </tr>
                    <tr>
                        <td class="f" colspan="5" style="text-align: right">Aprobado: 10/07/2018</td>
                    </tr>
                </thead>
            </table >
        </div>
    </div>

    <div class="row" >
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table style="margin-top: -7">
                    <tbody>
                        <tr>
                            <td width="523" class="b" >
                                <table style="padding: 10px">
                                    <tbody>
                                        <tr>
                                            <td width="50" class="c f" rowspan="2" style="border-left: #000000 1px solid;border-top: #000000 1px solid;border-bottom: #000000 1px solid; "><strong>FECHA :</strong></td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%d')}}  </td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%m')}}  </td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%Y')}}  </td>
                                            <td width="60" class="c f" style="border-top: #000000 1px solid;border-bottom: #000000 1px solid;" rowspan="2"><strong>CIUDAD : </strong></td>
                                            <td width="301" class="c f" style="border-top: #000000 1px solid;border-bottom: #000000 1px solid;border-right: #000000 1px solid" rowspan="2">{{ strtoupper($usuario->municipionombre) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30" class="c f" style="border-left: #000000 1px solid;border-bottom: #000000 1px solid;">DIA</td>
                                            <td width="30" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid;border-left: #000000 1px solid">MES</td>
                                            <td width="30" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid">AÑO</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>

    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td class="b s f c ">DATOS PERSONALES</td>
                        </tr>
                        <tr>
                            <td width="525" class="b">
                                <table style="padding: 10px; margin-left:5px;margin-top:-10px">
                                    <tbody>
                                        <tr>
                                            <td class="fzz blanco" width="37" >1</td>
                                            <td class="fzz blanco" width="37" >2</td>
                                            <td class="fzz blanco" width="30" >3</td>
                                            <td class="fzz blanco" width="30" >4</td>
                                            <td class="fzz blanco" width="30" >5</td>
                                            <td class="fzz blanco" width="30" >6</td>
                                            <td class="fzz blanco" width="32" >7</td>
                                            <td class="fzz blanco" width="36" >8</td>
                                            <td class="fzz blanco" width="32" >9</td>
                                            <td class="fzz blanco" width="38" >10</td>
                                            <td class="fzz blanco" width="48" >11</td>
                                            <td class="fzz blanco" width="48" >12</td>
                                            <td class="fzz blanco" width="60" >13</td>
                                        </tr>
                                        <tr>
                                            <td class="c b f" colspan="13" style="Height:20px"><strong>{{strtoupper($data->funcionario)}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="fz c" colspan="13" style="border-left: #000000 1px solid;border-right: #000000 1px solid">DOCUMENTO DE IDENTIFICACION</td>
                                        </tr>
                                        <tr>
                                            <td class="f c" style="height:30px;border-left: #000000 1px solid">&nbsp;&nbsp;&nbsp;<input type="radio" checked><span style="margin-top: -10px"> C.C.</span></td>
                                            <td class="f c" ><input type="radio" ><span style="margin-top: -10px"> C.E.</span></td>
                                            <td class="f c" colspan="2" style="height:30px">NUMERO :</td>
                                            <td class="f c" colspan="2"><span style="text-decoration: underline">{{number_format($data->cedulafuncionario, 0, ',', '.')}}</span></td>
                                            <td class="f c" colspan="3">LUGAR DE EXPEDICION :</td>
                                            <td class="f c" colspan="3" ><span style="text-decoration: underline">{{strtoupper($funcionario[0]->municcedula)}} </span></td>
                                            <td class="f c blanco" colspan="1" style="border-right: #000000 1px solid">0</td>
                                        </tr>
                                        <tr>
                                            <td class="fz c lt ll lr" colspan="2">SEXO</td>
                                            <td class="fz c lt ll lr" colspan="4">NACIONALIDAD</td>
                                            <td class="fz c lt ll lr" colspan="2">PAIS EXTRANJERO</td>
                                            <td class="fz c lt ll lr" colspan="2">LIBRETA MILITAR</td>
                                            <td class="fz c lt ll lr" colspan="2">NUMERO</td>
                                            <td class="fz c lr lt lr">D.M.</td>
                                        </tr>
                                        <tr>
                                            <td class="fz lt ll lr" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @if ($funcionario[0]->genero_id == 1)F &nbsp;<input type="radio" >&nbsp;M &nbsp;<input type="radio" checked>@endif @if ($funcionario[0]->genero_id == 2)F &nbsp;<input type="radio" checked>&nbsp;M &nbsp;<input type="radio" >@endif </td>
                                            <td class="f lt ll lr" colspan="4">&nbsp;&nbsp; @if ($funcionario[0]->paisnacimiento_id == 42)Colombiano&nbsp;<input type="radio" checked>&nbsp;Extrangero&nbsp;<input type="radio">  @else Colombiano&nbsp;<input type="radio" >&nbsp;Extrangero&nbsp;<input type="radio" checked> @endif </td>
                                            <td class="f c lt ll lr" colspan="2"> @if ($funcionario[0]->paisnacimiento_id != 42) {{ $funcionario[0]->paisnacimiento }}@endif</td>
                                            <td class="f lt ll lr" colspan="2"> @if ($funcionario[0]->clasmilitar_id == 1) Clase &nbsp;&nbsp;&nbsp; 1&nbsp;<input type="radio" checked>&nbsp;2&nbsp;<input type="radio"> @endif @if ($funcionario[0]->clasmilitar_id == 2)Clase &nbsp;&nbsp;&nbsp; 1&nbsp;<input type="radio" >&nbsp;2&nbsp;<input type="radio" checked> @endif  @if ($funcionario[0]->clasmilitar_id == 3) Clase &nbsp;&nbsp;&nbsp; 1&nbsp;<input type="radio">&nbsp;2&nbsp;<input type="radio"> @endif @if ($funcionario[0]->clasmilitar_id == 4) Clase &nbsp;&nbsp;&nbsp; 1&nbsp;<input type="radio">&nbsp;2&nbsp;<input type="radio"> @endif </td>
                                            <td class="f c lt ll lr" colspan="2">{{ $funcionario[0]->libreta_militar}}</td>
                                            <td class="f c lr lt lr">{{ $funcionario[0]->distrito }} </td>
                                        </tr>
                                        <tr>
                                            <td class="fz c lt ll lr" colspan="4">LUGAR DE NACIMIENTO</td>
                                            <td class="fz c lt ll lr" colspan="3">FECHA DE NACIMIENTO</td>
                                            <td class="fz c lt ll lr">EDAD</td>
                                            <td class="fz c lt ll lr" colspan="2">PERSONAS A CARGO</td>
                                            <td class="fz c lt ll lr" colspan="3">ESTADO CIVIL</td>
                                        </tr>
                                        <tr>
                                            <td class="f c lt ll lr" rowspan="2" colspan="4"> {{ $funcionario[0]->deparnacimiento}} </td>
                                            <td class="f c lt" >{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%d')}}</td>
                                            <td class="f c lt" >{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%m')}}</td>
                                            <td class="f c lt" >{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%Y')}}</td>
                                            <?php
                                                $edad = Carbon\Carbon::createFromDate(Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%Y'),Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%d'),Carbon\Carbon::parse($funcionario[0]->nacimiento)->formatLocalized('%m'))->age;
                                            ?>
                                            <td class="f c lt ll lr" rowspan="2"> {{ $edad }} </td>
                                            <td class="f c lt ll lr" rowspan="2" colspan="2"> {{ $funcionario[0]->personasacargo}}</td>
                                            <td class="fz lt ll"> @if ($funcionario[0]->estadocivil_id == 3)<span style="margin-top: -10px"><input type="radio" checked>CASADO</span> @else <span style="margin-top: -10px"><input type="radio">CASADO</span> @endif </td>
                                            <td class="fz lt "> @if ($funcionario[0]->estadocivil_id == 1)<span style="margin-top: -10px"><input type="radio" checked>SOLTERO</span> @else <span style="margin-top: -10px"><input type="radio">SOLTERO</span> @endif </td>
                                            <td class="fz lt lr"> @if ($funcionario[0]->estadocivil_id == 2)<span style="margin-top: -10px"><input type="radio" checked>UNION LIBRE</span> @else <span style="margin-top: -10px"><input type="radio">UNION LIBRE</span> @endif </td>
                                        </tr>

                                        <tr>
                                            <td class="fz c ll lr" >DIA</td>
                                            <td class="fz c ll lr" >MES</td>
                                            <td class="fz c ll lr" >AÑO</td>
                                            <td class="fz ll"> @if ($funcionario[0]->estadocivil_id == 5)<span style="margin-top: -10px"><input type="radio" checked>VIUDO</span> @else <span style="margin-top: -10px"><input type="radio">VIUDO</span> @endif </td>
                                            <td class="fz lr" colspan="2">@if ($funcionario[0]->estadocivil_id == 4)<span style="margin-top: -10px"><input type="radio" checked>DIVORCIADO</span> @else <span style="margin-top: -10px"><input type="radio">DIVORCIADO</span> @endif </td>
                                        </tr>
                                        <tr>
                                            <td class="f lt ll lr" colspan="13">CORREO ELECTRÓNICO:  {{ $funcionario[0]->emailpersonal }} @if ($funcionario[0]->emailcorporativo != null) / {{ $funcionario[0]->emailcorporativo }} @endif </td>
                                        </tr>
                                        <tr>
                                            <td class="lt ll " colspan="8" style="font-size: 7px">ACEPTO NOTIFICACIÓN DE ACTOS ADMINISTRATIVOS A TRAVÉS DE MEDIOS ELECTRÓNICOS</td>
                                            <td class="fz lt lr" colspan="2">&nbsp;&nbsp;&nbsp;SI&nbsp;&nbsp;&nbsp;<input type="radio" checked>&nbsp;&nbsp;&nbsp;NO&nbsp;&nbsp;&nbsp;<input type="radio"></td>
                                            <td class="fz lt ll " >TELÉFONO:</td>
                                            <td class="f lt lr" colspan="2">{{  $funcionario[0]->telefono_fijo }} </td>
                                        </tr>
                                        <tr>
                                            <td class="fz lt ll c " colspan="8">DIRECCIÓN DE CORRESPONDENCIA</td>
                                            <td class="fz lt ll lr c " colspan="2">BARRIO</td>
                                            <td class="fz lt ll" >CELULAR:</td>
                                            <td class="f lt lr " colspan="2">{{ $funcionario[0]->movil }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fz ll c " colspan="8"> {{ $funcionario[0]->direccion}} </td>
                                            <td class="fz ll lr c" colspan="2">{{ $funcionario[0]->nombrebarrio}}</td>
                                            <td class="fz lt ll" >FAX:</td>
                                            <td class="f lt lr blanco" colspan="2">0</td>
                                        </tr>
                                        <tr>
                                            <td class="fz lt lb ll lr s c " colspan="13"> ÚLTIMO NIVEL ACADÉMICO </td>
                                        </tr>

                                        @if (count($estudios) == 0)
                                            <tr>
                                                <td class="fz lt ll " colspan="11">
                                                        &nbsp;&nbsp;BACHILLER &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNICO &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNOLOGICOS &nbsp;<input type="radio"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PROFESIONALES &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ESPECIALIZACIONES &nbsp;<input type="radio">
                                                </td>
                                                <td class="fz b">GRADO APROB</td>
                                                <td class="fz b c">TITULO</td>
                                            </tr>
                                            <tr>
                                                <td class="fz ll " colspan="11">
                                                        &nbsp;&nbsp;MAESTRIAS &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        DOCTORADOS &nbsp;<input type="radio" >&nbsp;&nbsp;
                                                </td>
                                                <td class="fz b blanco">0</td>
                                                <td class="fz b"> SI &nbsp;<input type="radio"  >&nbsp;NO &nbsp;<input type="radio" ></td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="fz lt ll " colspan="11">
                                                    @if ($estudios[0]->niveleducativo_id == 1)
                                                        &nbsp;&nbsp;BACHILLER &nbsp;<input type="radio" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNICO &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNOLOGICOS &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PROFESIONALES &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ESPECIALIZACIONES &nbsp;<input type="radio" >
                                                    @elseif ($estudios[0]->niveleducativo_id == 2)
                                                        &nbsp;&nbsp;BACHILLER &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNICO &nbsp;<input type="radio" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNOLOGICOS &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PROFESIONALES &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ESPECIALIZACIONES &nbsp;<input type="radio" >
                                                    @elseif ($estudios[0]->niveleducativo_id == 3)
                                                        &nbsp;&nbsp;BACHILLER &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNICO &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNOLOGICOS &nbsp;<input type="radio" checked >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PROFESIONALES &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ESPECIALIZACIONES &nbsp;<input type="radio" >
                                                    @elseif ($estudios[0]->niveleducativo_id == 4)
                                                        &nbsp;&nbsp;BACHILLER &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNICO &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNOLOGICOS &nbsp;<input type="radio"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PROFESIONALES &nbsp;<input type="radio" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ESPECIALIZACIONES &nbsp;<input type="radio" >
                                                    @elseif ($estudios[0]->niveleducativo_id == 5)
                                                        &nbsp;&nbsp;BACHILLER &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNICO &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNOLOGICOS &nbsp;<input type="radio"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PROFESIONALES &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ESPECIALIZACIONES &nbsp;<input type="radio" checked>
                                                    @else
                                                        &nbsp;&nbsp;BACHILLER &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNICO &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        TECNOLOGICOS &nbsp;<input type="radio"  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        PROFESIONALES &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        ESPECIALIZACIONES &nbsp;<input type="radio">
                                                    @endif
                                                </td>
                                                <td class="fz b">GRADO APROB</td>
                                                <td class="fz b c">TITULO</td>
                                            </tr>
                                            <tr>
                                                <td class="fz ll " colspan="11">
                                                    @if ($estudios[0]->niveleducativo_id == 6)
                                                        &nbsp;&nbsp;MAESTRIAS &nbsp;<input type="radio" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        DOCTORADOS &nbsp;<input type="radio" >&nbsp;&nbsp;
                                                    @elseif ($estudios[0]->niveleducativo_id == 7)
                                                        &nbsp;&nbsp;MAESTRIAS &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        DOCTORADOS &nbsp;<input type="radio" checked>&nbsp;&nbsp;
                                                    @else
                                                        &nbsp;&nbsp;MAESTRIAS &nbsp;<input type="radio" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        DOCTORADOS &nbsp;<input type="radio" >&nbsp;&nbsp;
                                                    @endif
                                                </td>
                                                <td class="fz b c"> @if ( $estudios[0]->obtuvotitulo == 2) {{ $estudios[0]->semestres }} @endif </td>
                                                <td class="fz b"> @if ( $estudios[0]->obtuvotitulo == 1)
                                                    SI &nbsp;<input type="radio"  checked>&nbsp;NO &nbsp;<input type="radio" >
                                                @else
                                                    SI &nbsp;<input type="radio"  >&nbsp;NO &nbsp;<input type="radio" checked >
                                                @endif </td>
                                            </tr>
                                        @endif

                                        @if (count($estudios) == 0)
                                            <tr>
                                                <td colspan="2" class="fz lt ll" >TÍTULO OBTENIDO:</td>
                                                <td colspan="11" class="fz lt lr c blanco" >0</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="2" class="fz lt ll" >TÍTULO OBTENIDO:</td>
                                                <td colspan="11" class="fz lt lr c" > {{ strtoupper($estudios[0]->titulosdeformacion) }} </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="fz s c lt lr ll" colspan="13">PERSONA DE CONTACTO EN CASO DE EMERGENCIA</td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" class="fz lt lb ll lr" >NOMBRES Y APELLIDOS: {{ strtoupper($funcionario[0]->name_contacto) }}</td>
                                            <td class="fz lt lb ll " >TELÉFONO: </td>
                                            <td colspan="4" class="fz lt lb lr c"> {{ $funcionario[0]->movil_contacto }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        <tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>

    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td class="b s f c ">INFORMACIÓN FAMILIAR</td>
                        </tr>
                        <tr>
                            <td width="525" class="b">
                                <table style="padding: 10px; margin-left:5px; margin-top:-10px">
                                    <tbody>
                                        <tr>
                                            <td class="fzz blanco" width="37"  >1</td>
                                            <td class="fzz blanco" width="37" >2</td>
                                            <td class="fzz blanco" width="30" >3</td>
                                            <td class="fzz blanco" width="30" >4</td>
                                            <td class="fzz blanco" width="30" >5</td>
                                            <td class="fzz blanco" width="30" >6</td>
                                            <td class="fzz blanco" width="32" >7</td>
                                            <td class="fzz blanco" width="36" >8</td>
                                            <td class="fzz blanco" width="32" >9</td>
                                            <td class="fzz blanco" width="38" >10</td>
                                            <td class="fzz blanco" width="48" >11</td>
                                            <td class="fzz blanco" width="48" >12</td>
                                            <td class="fzz blanco" width="60" >13</td>
                                        </tr>
                                            @foreach ($familia as $item)
                                                <?php if ($item->parentesco_id == 4) { $conyuge = $item; } ?>
                                                <?php if ($item->parentesco_id == 11) { $padre = $item; } ?>
                                                <?php if ($item->parentesco_id == 8) { $madre = $item; } ?>
                                            @endforeach
                                        <tr >
                                            <td class="c s b fz" colspan="5" >NOMBRE DEL CÓNYUGE O COMPAÑERO(A)</td>
                                            <td class="c s b fz" >EDAD</td>
                                            <td class="c s b fz" colspan="2">OCUPACIÓN</td>
                                            <td class="c s b fz" colspan="3">DIRECCIÓN</td>
                                            <td class="c s b fz" colspan="2">TELÉFONO</td>
                                        </tr>
                                        @if (isset($conyuge))
                                            <tr>
                                                <td class="c b fz" colspan="5">{{$conyuge->name}}</td>
                                                <?php  $edad = Carbon\Carbon::createFromDate(Carbon\Carbon::parse($conyuge->nacimiento)->formatLocalized('%Y'),Carbon\Carbon::parse($conyuge->nacimiento)->formatLocalized('%d'),Carbon\Carbon::parse($conyuge->nacimiento)->formatLocalized('%m'))->age; ?>
                                                <td class="c b fz" >{{$edad }}</td>
                                                <td class="c b fz" colspan="2">{{$conyuge->ocupacion}}</td>
                                                <td class="c b fz" colspan="3">{{$conyuge->direccion}}</td>
                                                <td class="c b fz" colspan="2">{{$conyuge->movil}}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="c b fz blanco" colspan="5">0</td>
                                                <td class="c b fz blanco" >0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                                <td class="c b fz blanco" colspan="3">0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="fzz blanco" colspan="13">0</td>
                                        </tr>
                                        <tr >
                                            <td class="c s b fz" colspan="5">NOMBRE DE LOS PADRES</td>
                                            <td class="c s b fz" >EDAD</td>
                                            <td class="c s b fz" colspan="2">OCUPACIÓN</td>
                                            <td class="c s b fz" colspan="3">DIRECCIÓN</td>
                                            <td class="c s b fz" colspan="2">TELÉFONO</td>
                                        </tr>
                                        @if (isset($padre))
                                            <tr>
                                                <td class="c b fz" colspan="5">{{$padre->name}}</td>
                                                <?php  $edad = Carbon\Carbon::createFromDate(Carbon\Carbon::parse($padre->nacimiento)->formatLocalized('%Y'),Carbon\Carbon::parse($padre->nacimiento)->formatLocalized('%d'),Carbon\Carbon::parse($padre->nacimiento)->formatLocalized('%m'))->age; ?>
                                                <td class="c b fz" >{{$edad }}</td>
                                                <td class="c b fz" colspan="2">{{$padre->ocupacion}}</td>
                                                <td class="c b fz" colspan="3">{{$padre->direccion}}</td>
                                                <td class="c b fz" colspan="2">{{$padre->movil}}</td>
                                            </tr>
                                        @endif
                                        @if (isset($madre))
                                            <tr>
                                                <td class="c b fz" colspan="5">{{$madre->name}}</td>
                                                <?php  $edad = Carbon\Carbon::createFromDate(Carbon\Carbon::parse($madre->nacimiento)->formatLocalized('%Y'),Carbon\Carbon::parse($madre->nacimiento)->formatLocalized('%d'),Carbon\Carbon::parse($madre->nacimiento)->formatLocalized('%m'))->age; ?>
                                                <td class="c b fz" >{{$edad }}</td>
                                                <td class="c b fz" colspan="2">{{$madre->ocupacion}}</td>
                                                <td class="c b fz" colspan="3">{{$madre->direccion}}</td>
                                                <td class="c b fz" colspan="2">{{$madre->movil}}</td>
                                            </tr>
                                        @endif
                                        @if (!isset($padre))
                                            <tr>
                                                <td class="c b fz blanco" colspan="5">0</td>
                                                <td class="c b fz blanco" >0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                                <td class="c b fz blanco" colspan="3">0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                            </tr>
                                        @endif
                                        @if (!isset($madre))
                                            <tr>
                                                <td class="c b fz blanco" colspan="5">0</td>
                                                <td class="c b fz blanco" >0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                                <td class="c b fz blanco" colspan="3">0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="fzz blanco" colspan="13">0</td>
                                        </tr>
                                        <tr >
                                            <td class="c s b fz" colspan="5">NOMBRE DE LOS HERMANOS</td>
                                            <td class="c s b fz" >EDAD</td>
                                            <td class="c s b fz" colspan="2">OCUPACIÓN</td>
                                            <td class="c s b fz" colspan="3">DIRECCIÓN</td>
                                            <td class="c s b fz" colspan="2">TELÉFONO</td>
                                        </tr>
                                        @foreach ($hermanos as $row)
                                            <tr>
                                                <td class="c b fz" colspan="5">{{$row->name}}</td>
                                                <?php  $edad = Carbon\Carbon::createFromDate(Carbon\Carbon::parse($row->nacimiento)->formatLocalized('%Y'),Carbon\Carbon::parse($row->nacimiento)->formatLocalized('%d'),Carbon\Carbon::parse($row->nacimiento)->formatLocalized('%m'))->age; ?>
                                                <td class="c b fz" >{{$edad }}</td>
                                                <td class="c b fz" colspan="2">{{$row->ocupacion}}</td>
                                                <td class="c b fz" colspan="3">{{$row->direccion}}</td>
                                                <td class="c b fz" colspan="2">{{$row->movil}}</td>
                                            </tr>
                                        @endforeach
                                        @for ($i = 1; $i <= 5 - count($hermanos); $i++)
                                            <tr>
                                                <td class="c b fz blanco" colspan="5">0</td>
                                                <td class="c b fz blanco" >0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                                <td class="c b fz blanco" colspan="3">0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                            </tr>
                                        @endfor
                                        <tr>
                                            <td class="fzz blanco" colspan="13" >0</td>
                                        </tr>
                                        <tr >
                                            <td class="c s b fz" colspan="5">NOMBRE DE LOS HIJOS</td>
                                            <td class="c s b fz" >EDAD</td>
                                            <td class="c s b fz" colspan="2">OCUPACIÓN</td>
                                            <td class="c s b fz" colspan="3">DIRECCIÓN</td>
                                            <td class="c s b fz" colspan="2">TELÉFONO</td>
                                        </tr>
                                        @foreach ($hijos as $row)
                                            <tr>
                                                <td class="c b fz" colspan="5">{{$row->name}}</td>
                                                <?php  $edad = Carbon\Carbon::createFromDate(Carbon\Carbon::parse($row->nacimiento)->formatLocalized('%Y'),Carbon\Carbon::parse($row->nacimiento)->formatLocalized('%d'),Carbon\Carbon::parse($row->nacimiento)->formatLocalized('%m'))->age; ?>
                                                <td class="c b fz" >{{$edad }}</td>
                                                <td class="c b fz" colspan="2">{{$row->ocupacion}}</td>
                                                <td class="c b fz" colspan="3">{{$row->direccion}}</td>
                                                <td class="c b fz" colspan="2">{{$row->movil}}</td>
                                            </tr>
                                        @endforeach
                                        @for ($i = 1; $i <= 5 - count($hijos); $i++)
                                            <tr>
                                                <td class="c b fz blanco" colspan="5">0</td>
                                                <td class="c b fz blanco" >0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                                <td class="c b fz blanco" colspan="3">0</td>
                                                <td class="c b fz blanco" colspan="2">0</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </td>
                        <tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>

    <div class="row" style="margin-top: 5px">
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr class="b f ">
                            <td width="525" class="b">
                                <table style="padding: 10px; margin-left:5px; margin-top:-10px">
                                    <tbody>
                                        <tr>
                                            <td class="f blanco" width="506" >1</td>
                                        </tr>

                                        <tr >
                                            <td class="c fz" style="text-decoration: overline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="fz j" width="506" >Al firmar este documento acepto las políticas de privacidad que tiene la Registraduría Nacional del Estado Civil, señaladas a continuación: <br>
                                                En cumplimiento a lo dispuesto en el Decreto 1377 de 2013, reglamentario de la Ley Estatutaria 1581 de 2012 y demás normas concordantes, mediante las cuales se dictan
                                                disposiciones generales para la protección de datos personales, La Registraduría Nacional del Estado Civil como tratante de los datos obtenidos durante la ejecución de
                                                su objeto misional y a través de los diferentes canales de recolección, solicita de su autorización para realizar el tratamiento de sus datos personales, los cuales serán
                                                incorporados en nuestra base de datos. La información y datos personales suministrados a La Registraduría Nacional del Estado Civil, podrán ser recolectados, procesados,
                                                almacenados, usados, circulados, suprimidos, compartidos, actualizados y/o trasmitidos, de acuerdo con los términos y condiciones de las políticas de seguridad informática
                                                establecidas mediante resolución 4173 de 2016. Los datos personales obtenidos serán usados en forma exclusiva para el cumplimiento de nuestra misión institucional y la debida
                                                prestación de servicios a la ciudadanía.
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        <tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>

{{-- FIN INFORMACION PERSONAL --}}
<div class="page-break"></div>

    <div class="row" style="margin-top: -80px">
        <div class="col-md-12" style="margin-left: -50px">
            <table >
                <thead>
                    <tr>
                        <td class="b f"  width="70" rowspan="2"><center><img class="img" src="../public/images/logo1.png"></center></td>
                        <td class="b c f" width="70" >PROCESO</td>
                        <td class="b c f" width="230" >VINCULACIÓN DEL TALENTO HUMANO</td>
                        <td class="b c f" width="70" >CODIGO</td>
                        <td class="b c f" width="70" >VTFT05</td>
                    </tr>
                    <tr>
                        <td class="b c f" >FORMATO</td>
                        <td class="b c f" >DOCUMENTOS PARA POSESIÓN</td>
                        <td class="b c f" >VERSION</td>
                        <td class="b c f" >5</td>
                    </tr>
                    <tr>
                        <td class="f" colspan="5" style="text-align: right">Aprobado: 09/11/2018</td>
                    </tr>
                </thead>
            </table >
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table style="margin-top: -7">
                    <tbody>
                        <tr>
                            <td width="523" class="b" >
                                <table style="padding: 10px">
                                    <tbody>
                                        <tr>
                                            <td width="50" class="c f" rowspan="2" style="border-left: #000000 1px solid;border-top: #000000 1px solid;border-bottom: #000000 1px solid; "><strong>FECHA :</strong></td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%d')}}  </td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%m')}}  </td>
                                            <td width="30" class="c f" style="border-top: #000000 1px solid;">{{Carbon\Carbon::parse($data->fechaactaposesion)->formatLocalized('%Y')}}  </td>
                                            <td width="60" class="c f" style="border-top: #000000 1px solid;border-bottom: #000000 1px solid;" rowspan="2"><strong>CIUDAD : </strong></td>
                                            <td width="301" class="c f" style="border-top: #000000 1px solid;border-bottom: #000000 1px solid;border-right: #000000 1px solid" rowspan="2">{{ strtoupper($usuario->municipionombre) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30" class="c f" style="border-left: #000000 1px solid;border-bottom: #000000 1px solid;">DIA</td>
                                            <td width="30" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid;border-left: #000000 1px solid">MES</td>
                                            <td width="30" class="c f" style="border-bottom: #000000 1px solid;border-right: #000000 1px solid">AÑO</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12" style="margin-left: -50px;" >
            <body >
                <table >
                    <tbody>
                        <tr>
                            <td width="524" class="f b c s" >NOMBRE DE LA PERSONA A VINCULAR </td>
                        </tr>
                        <tr>
                            <td class="f b c" style="height:30px" ><strong>{{strtoupper($data->funcionario)}}</strong></td>
                        </tr>
                        <tr>
                            <td class="f b c s" >DOCUMENTOS</td>
                        </tr>
                        <tr>
                            <td width="523" class="b">
                                <table style="padding: 10px;margin-left: 5px">
                                    <tbody>
                                        <tr>
                                            <td class="fzz blanco" width="20" >1</td>
                                            <td class="fzz blanco" width="190">2</td>
                                            <td class="fzz blanco" width="10" >3</td>
                                            <td class="fzz blanco" width="80" >4</td>
                                            <td class="fzz blanco" width="10" >5</td>
                                            <td class="fzz blanco" width="30" >6</td>
                                            <td class="fzz blanco" width="10" >7</td>
                                            <td class="fzz blanco" width="80" >8</td>
                                            <td class="fzz blanco" width="10" >9</td>
                                            <td class="fzz blanco" width="40" >10</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Una (1) Fotocopia tamaño postal 10cm x 15cm con fondo blanco</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Fotocopia de la Cedula de Ciudadania (ampliada al 150%)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Fotocopia de la Libreta Militar Vigente o certificado de situacion militar definida (Unicamente Genero Masculino)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Certificado de Antecedentes Judiciales Vigente (ministerio de Defensa - Policia Nacional)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Certificado de Antecedentes Diciplinarios (Procuraduria)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Certificado de Antecedentes Fiscales (Contraloria)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Certificado de Ausencia de sanciones diciplinarias (Consejo Superior de la Adjudicatura - Unicamente Abogados) </td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f s " colspan="8">FORMATO DE DECLARACION JURAMENTADA INDICANDO:</td>
                                            <td class="f blanco">1</td>
                                            <td class="f blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">inhabilidades, incompatibilidades, prohibicion para ejercer el cargo y morosidad con el Estado</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f s" colspan="8">CERTIFICADOS DE ESTUDIOS DE EDUCACION FORMAL:</td>
                                            <td class="f blanco">1</td>
                                            <td class="f blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Primaria</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Bachillerato (Titulo)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Tecnico o Tecnologo (Titulo)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Universitario (titulo)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="f " colspan="5"></td>
                                            <td class="f c ">Carrera</td>
                                            <td class="f blanco" colspan="4">1</td>
                                        </tr>
                                        <tr>
                                            <td class="f blanco">1</td>
                                            <td class="f c b" rowspan="4">Tarjeta Profesional</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Derecho :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Ingenieria :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="f blanco">1</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Administracion :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Psicologia :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="f blanco">1</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Arquitectura :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Periodismo :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="f blanco">1</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Economia :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Otros :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="f blanco" colspan="10">1</td>
                                        </tr>
                                        <tr>
                                            <td class="f blanco">1</td>
                                            <td class="f c b">Formacion Avanzada</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Especializacion :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b">Maestria o Doctorado :</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="f blanco" colspan="10">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Cerificados de Experiencia Laboral</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Formato de designacion de Beneficiarios - Poliza de seguro de Vida </td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Formato de Informacion Personal</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Formato Unico de Hoja de Vida SIGEP (Ley 190/95)(Verificar que la informacion relacionada tenga su soporte)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Declaracion Juramentada de Bienes y Rentas SIGEP (Ley 190/95)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Estudio de Cumplimiento de requisitos para el desempeño del cargo</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f s" colspan="8">PARA DELEGADOS DEPARTAMENTALES, REGISTRADORES DISTRITALES Y ESPECIALES:</td>
                                            <td class="f blanco">1</td>
                                            <td class="f blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Declaracion extra juicio indicando inhabilidades e incompatibilidades para ejercer el cargo</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">PARA CARGOS O FUNCIONES DE CONDUCTOR MECANICO:</td>
                                            <td class="f blanco">1</td>
                                            <td class="f blanco">1</td>
                                        </tr>
                                        <tr>
                                            <td class="b f " colspan="8">Fotocopia de la Licencia de Conduccion vigente (Ampliada  al 150%)</td>
                                            <td class="f blanco">1</td>
                                            <td class="f b blanco">1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="b f s c" >CARGO POSIBLE A VINCULAR</td>
                        </tr>
                        <tr>
                            <td class="b f c" style="height:50px"><strong>{{ strtoupper($data->cargo) }} {{ $data->codigo }} - {{ $data->grado }}</strong>, de la <strong>{{ $data->oficina }}</strong> en el Departamento del {{ucwords(strtolower($data->departamento))}}</td>
                        </tr>
                        <tr>
                            <td class="b f s c" >NOMBRE DEL SERVIDOR QUE EFECTUO LA REVISION</td>
                        </tr>
                        <tr>
                            <td class="b f c" style="height:110px;text-decoration: overline"> Nombre del Funcionario que Efectuo la Revision</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </div>
    </div>



{{-- FIN DOCUMENTOS PARA POSESION --}}
<div class="page-break"></div>

    <div class="c" style="margin-top: -90px"><img style="width: 33%" src="../public/images/logo1.png"></div>
    <br><br><br><br><br>
    <div class="c"><strong>DILIGENCIA DE NOTIFICACION PERSONAL</strong></div>
    <br><br><br>
    <div class="j">En el Municipio de {{$usuario->municipionombre}}, a los _______________________ siendo las ______________, se hizo presente el señor(a) <strong>{{strtoupper($data->funcionario)}}</strong>, identificado(a) con cédula de ciudadanía No. <strong>{{number_format($data->cedulafuncionario, 0, ',', '.')}}</strong> expedida en  {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}}, en las Instalaciones de la {{ $data->oficina }} con el fin de llevar a cabo la diligencia de notificacion de la Resolucion No. _____________  de Fecha ______________, mediante la cual se reconoce y ordena un pago de Cesantias DEFINITIVAS, al señor(a) {{strtoupper($data->funcionario)}}, suscrita por el Gerente de Talento Humano. <br><br> Se deja Constancia que el Notificado(a) se le hace entrega de una copia integra, autentica y gratuita del acto Administrativo precitado frente al cual procede el recurso de reposicion ante el Gerente de Talento Humano, dentro de los cinco(5) dias siguientes a su notificacion.  <br><br><br><br> En constancia firma,  <br> <br><br><strong>El Notificado,</strong> <br><br><br> <br><br>  <span style="text-decoration: overline">{{strtoupper($data->funcionario)}}</span> <br> C.C. No. {{number_format($data->cedulafuncionario, 0, ',', '.')}}</strong> expedida en  {{$funcionario[0]->municcedula}} {{ucwords(strtolower($funcionario[0]->deparcedula))}}  <br><br><br> <strong>El Notificador,</strong> <br><br><br><br><br><span style="text-decoration: overline"> Nombre y Firma </span>      </div>

{{-- FIN DE CARTA DE NOTIFICACION DE CESANTIAS SUPER  --}}



@endsection
{{-- corte de pagina --}}
{{-- <div class="page-break"></div> --}}



