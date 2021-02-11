@extends('layouts.formatocertificaciones')

@section('textocarta')

@foreach ($user as $usuario)@endforeach
@foreach ($data as $row)@endforeach
<br><br>
@if (intval($clase) == 1)

    <?php $totalanos = 0; $incrementoantiguedad = 0; $auxiliotrasporte = 0; $ley4ta = 0; $primatecnicafs = 0; $primatecnicanfs = 0; $primageografica = 0; $auxilioalimentacion = 0; $totalsueldo = 0;?>
    @foreach ($data as $row)
        <?php
               if ($funcionario[0]->incrementoantiguedad == "") { $incrementoantiguedad = 0; } else{ $incrementoantiguedad = $funcionario[0]->incrementoantiguedad; };
            if ($funcionario[0]->auxiliotrasporte == "") { $auxiliotrasporte = 0; } else{ $auxiliotrasporte = $funcionario[0]->auxiliotrasporte; };
            if ($funcionario[0]->ley4ta == "") { $ley4ta = 0; } else{ $ley4ta = $funcionario[0]->ley4ta; }
            if ($funcionario[0]->primatecnicafs == "") { $primatecnicafs = 0; } else{ $primatecnicafs = $funcionario[0]->primatecnicafs; };
            if ($funcionario[0]->primatecnicanfs == "") { $primatecnicanfs = 0; } else{ $primatecnicanfs = $funcionario[0]->primatecnicanfs; };
            if ($funcionario[0]->primageografica == "") { $primageografica = 0; } else{ $primageografica = $funcionario[0]->primageografica; };
            if ($funcionario[0]->auxilioalimentacion == "") { $auxilioalimentacion = 0; } else{ $auxilioalimentacion = $funcionario[0]->auxilioalimentacion; };
                $totalsueldo = $data[count($data)-1]->sueldo + $incrementoantiguedad + $auxiliotrasporte + $ley4ta + $primatecnicafs + $primatecnicanfs + $primageografica + $auxilioalimentacion;
        ?>
    @endforeach

    <div class="col-md-12 c"><strong>LA DELEGACION DEPARTAMENTAL DEL {{$user[0]->departamentonombre}} </strong></div><br><br>
    <div class="col-md-12 c"><strong>CERTIFICA</strong></div><br><br>
    <div class="col-md-12 j"> Que el(a) Señor(a) <strong>{{strtoupper($funcionario[0]->name)}}</strong>, identificado(a) con cedula de Ciudadania No. {{ number_format($funcionario[0]->cedula, 0, ',', '.')  }} expedida en {{ $funcionario[0]->municipiocedula}}, labora al servicio de la Registraduria Nacional del Estado Civil en el Departamento del {{ ucwords(strtolower($user[0]->departamentonombre))}}, en el municipio de {{ $data[0]->nombremunicipiolabora }} desde el {{ \Carbon\Carbon::parse($data[0]->fechainicial)->locale('es')->isoFormat('LL')}}, y en la actualidad se encuentra nombrado(a) en {{ $data[0]->clascontrato }}, en el Cargo de {{$data[0]->cargo}} ({{$data[0]->codigo}}-{{$data[0]->grado}}) en la {{ $data[0]->oficina }}, con una asignacion mensual de <strong> (${{number_format($totalsueldo, 0, ',', '.')}})  {{$formatter->toWords($totalsueldo)}} DE PESOS MONEDA CORRIENTE </strong> </div>
    <br>
    <div class="col-md-12"><strong>Discriminados asi:</strong></div>
    <br><br>
    <div class="col-md-12" >
        <table align="center" >
            <tbody>

                <tr>
                    <td class="f ll "><strong>SUELDO MENSUAL</strong></td>
                    <td class="f lr r">$ {{ number_format($data[count($data)-1]->sueldo, 0, ',', '.')  }}</td>
                </tr>
                <tr>
                    <td width="180 " class="f ll "><strong>INCREMENTO POR ANTIGUEDAD</strong></td>
                    <td width="100 " class="f lr r">${{  number_format($incrementoantiguedad, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="f ll "><strong>AUXILIO DE TRANSPORTE</strong></td>
                    <td class="f lr r">${{ number_format($auxiliotrasporte, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="f ll "><strong>LEY 4TA.</strong></td>
                    <td class="f lr r">${{ number_format($ley4ta, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="f ll "><strong>PRIMA TECNICA FACTOR SALARIAL</strong></td>
                    <td class="f lr r">${{  number_format($primatecnicafs, 0, ',', '.')}}</td>
                </tr>
                <tr>
                    <td class="f ll "><strong>PRIMA TECNICA NO FACTOR SALARIAL</strong></td>
                    <td class="f lr r">${{number_format($primatecnicanfs, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="f ll "><strong>PRIMA GEOGRAFICA</strong></td>
                    <td class="f lr r">${{number_format($primageografica, 0, ',', '.')}}</td>
                </tr>
                <tr>
                    <td class="f ll "><strong>AUXILIO DE ALIMENTACION</strong></td>
                    <td class="f lr r">${{number_format($auxilioalimentacion, 0, ',', '.')}}</td>
                </tr>
                <tr>
                    <td class="f ll  s"><strong>TOTAL</strong></td>
                    <td class="f lr r s"><strong>${{number_format($totalsueldo, 0, ',', '.')}}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="col-md-12 c">
        Para constancia se firma en {{ $user[0]->municipionombre }}, el {{ \Carbon\Carbon::now()->locale('es')->isoFormat('LL')}}
    </div>
    <br><br><br><br><br>
    <div class="col-md-12 c"><strong>{{ strtoupper($cordinador->name)}}</strong> </div>
    <div class="col-md-12 c"><strong>Lider de la Oficina de Talento Humano </strong></div>
    <br><br>
    <div class="col-md-12 j"><strong>ADVERTENCIA: La presente certificacion no presenta Tachaduras ni enmendaduras. si el numero de cedula de ciudadania no corresponde con el de la persona solicitada ESTA CERTIFICACION CARECE DE VALIDEZ y es INEFICAZ si se utiliza con propositos a los autorizados, sin perjuicio de las acciones legales pertinentes.</strong> </div>

@else

    <div class="col-md-12" >
        <table align="center" >
            <tbody>
                <tr>
                    <td class="f r" style="border-color: rgb(255, 255, 255)" colspan="2"><strong>FOLIO No. 01</strong></td>
                </tr>
                <tr>
                    <td class="f r" style="border-color: rgb(255, 255, 255)" colspan="2"><strong>CERTIFICADO No. {{ number_format($numcerti, 0, ',', '.') }}</strong></td>
                </tr>
                <tr>
                    <td class="fzz r blanco" style="border-color: rgb(255, 255, 255)" colspan="2"><strong>CERTIFICADO No. {{ number_format($numcerti, 0, ',', '.') }}</strong></td>
                </tr>

                <tr>
                    <td class="f c lr ll" colspan="2"><strong>CONSTANCIA SOBRE TIEMPO DE SERVICIO PRESTADO A LA ENTIDAD</strong></td>
                </tr>
                <tr>
                    <td width="200 " class="f ll">NOMBRES</td>
                    <td width="220 " class="f lr">{{ $funcionario[0]->name }}</td>
                </tr>
                <tr>
                    <td class="f ll">CEDULA</td>
                    <td class="f lr">{{  number_format($funcionario[0]->cedula, 0, ',', '.')  }} de {{ $funcionario[0]->municipiocedula }}</td>
                </tr>
                <tr>
                    <td class="f ll">FECHA DE NACIMIENTO   </td>
                    <td class="f lr">{{ \Carbon\Carbon::parse($funcionario[0]->nacimiento)->locale('es')->isoFormat('LL')   }}</td>
                </tr>
                <tr>
                    <td class="f ll">FECHA DE INGRESO   </td>
                    <td class="f lr">{{ \Carbon\Carbon::parse($data[0]->fechainicial)->locale('es')->isoFormat('LL')   }}</td>
                </tr>
                <tr>
                    <td class="f ll">TIPO DE VINCULACION  </td>
                    <td class="f lr">{{ $data[count($data)-1]->clascontrato }}</td>
                </tr>
                <tr>
                    <td class="f ll">CARGO  </td>
                    <td class="f lr"> {{ $data[count($data)-1]->cargo }} {{ $data[count($data)-1]->codigo }}-{{ $data[count($data)-1]->grado }} </td>
                </tr>
                <tr>
                    <td class="f ll">ASIGNACION MENSUAL  </td>
                    <td class="f lr">$ {{ number_format($data[count($data)-1]->sueldo, 0, ',', '.')  }}</td>
                </tr>
                <tr>
                    <td class="f ll">DEPENDENCIA  </td>
                    <td class="f lr">{{ $data[count($data)-1]->oficina }}</td>
                </tr>


                <tr>
                    <td class="f ll">TIEMPO TOTAL DE SERVICIO  </td>
                    <?php $totalanos = 0; $totalmes = 0; $totaldias = 0; $calculoanos = 0; $calculomeses = 0; ?>
                    @foreach ($data as $row)
                        <?php
                            $fechaingreso = date_create($row->fechainicial);
                            $fecharetiro = date_create($row->fechaterminacion);
                            $diferencia = date_diff($fechaingreso, $fecharetiro);
                            // $totalanos += intval($diferencia->y);
                            $totalmes += intval($diferencia->m);
                                if ($totalmes > 13){
                                    $calculoanos = intdiv( intval($totalmes) , 12 );
                                    $calculomeses = fmod($totalmes , 12);
                                };
                        ?>
                    @endforeach

                <td class="f lr">{{ $calculoanos }} Años {{ $calculomeses }} Meses </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <div class="col-md-12 c"><strong>OBSERVACIONES</strong></div>
    <div class="col-md-12">
        @foreach ($data as $row)
            <ul>
                <li class="j">Resolucion No. {{ $row->numresolucion }} del {{ \Carbon\Carbon::parse($row->fecharesolucion)->locale('es')->isoFormat('LL')}} Nombramiento en {{ $row->clascontrato}} en el Cargo {{ $row->cargo }}  {{ $row->codigo }}-{{ $row->grado }} en la Delegacion del {{ $row->departamento }}, a partir del {{ \Carbon\Carbon::parse($row->fechainicial)->locale('es')->isoFormat('LL') }}  hasta el {{ \Carbon\Carbon::parse($row->fechaterminacion)->locale('es')->isoFormat('LL') }} inclusive.</li>
            </ul>
        @endforeach
    </div>
    <div class="col-md-12 j">
        Para constancia se expide a solicitud del interesado conforme a la historia Laboral que reposa en los Archivos de la Delegacion Departamental del {{ ucwords(strtolower($user[0]->departamentonombre)) }}.
    </div>
    <br>
    <div class="col-md-12">
        Dada en {{ $user[0]->municipionombre }}, el {{ \Carbon\Carbon::now()->locale('es')->isoFormat('LL')}}
    </div>
    <br><br><br><br>
    <div class="c"><strong><span style="text-decoration: overline">{{ strtoupper($delegado1->name) }}</span></strong>   @if ($delegado2 != "") -  <strong><span style="text-decoration: overline">{{ strtoupper($delegado2->name) }}</span></strong> @else  @endif </div>

        @if ($notas == '')
            <div class="c"> Delegados Departamentales del Estado Civil del {{$user[0]->departamentonombre}} </div>
        @else
            <div class="c"> {{$notas}} </div>
        @endif
@endif




@endsection
{{-- corte de pagina --}}
{{-- <div class="page-break"></div> --}}



