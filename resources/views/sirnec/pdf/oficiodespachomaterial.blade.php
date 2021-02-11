@extends('layouts.formatopdf')

@section('textocarta') 

        @foreach ($reporte as $report)@endforeach
        @foreach ($user as $usuario)@endforeach

        <div id="content">
            <p>{{ $usuario->municipionombre }},&nbsp;{{ $date }}</p>
            <br>
            Oficio DDV - 0910 - 26 - 548 <br>
            <br>
            <span class="n">Dr.(a) </span><br>
            <span class="t n"> {{ $report->nombrefuncionario }} </span><br> 
            <span class="t n"> {{ $report->name }} </span><br>
            <span>Direccion: {{ $report->direccion }} </span><br>
            <span>Codigo Postal : {{ $report->codigopostal }} </span><br>
            <span>{{ $report->municipionombre }} - {{ $report->departamentonombre }} </span><br>    
            
            <p><span class="n">Asunto : </span> Remision de Material de Identificacion para la {{ $report->name }} </p>

            <p class="j">En atención a la solicitud recibida mediante correo electrónico, hago entrega de su requerimiento, para uso exclusivo de la {{ $report->name }} - {{ $report->departamentonombre }} </p>
        
            <table >
                <tbody>
                    <tr>
                        <td width="200" class="s c n ">Descripción del Elemento</td>
                        <td width="80" class="s c n ">Rango Inicial</td>
                        <td width="80" class="s c n ">Rango Final</td>
                        <td width="80" class="s c n ">Cantidad de Registros</td>
                    </tr>
                    @foreach ($reporte as $report)
                        @if ($report->rcni1 != 0 )
                            <tr>
                                <td class="c">Registro Civil de Nacimiento</td>
                                <td class="c">{{ $report->rcni1 }}</td>
                                <td class="c">{{ $report->rcnf1 }}</td>
                                <td class="c">{{ $report->rcnf1 - $report->rcni1 + 1 }}</td>
                            </tr>    
                        @endif
                        @if ($report->rcni2 != 0 )
                            <tr>
                                <td class="c">Registro Civil de Nacimiento</td>
                                <td class="c">{{ $report->rcni2 }}</td>
                                <td class="c">{{ $report->rcnf2 }}</td>
                                <td class="c">{{ $report->rcnf2 - $report->rcni2 + 1 }}</td>
                            </tr>    
                        @endif
                        @if ($report->rcmi1 != 0 )
                            <tr>
                                <td class="c">Registro Civil de Matrimonio</td>
                                <td class="c">{{ $report->rcmi1 }}</td>
                                <td class="c">{{ $report->rcmf1 }}</td>
                                <td class="c">{{ $report->rcmf1 - $report->rcmi1 + 1 }}</td>
                            </tr>    
                        @endif
                        @if ($report->rcmi2 != 0 )
                            <tr>
                                <td class="c">Registro Civil de Matrimonio</td>
                                <td class="c">{{ $report->rcmi2 }}</td>
                                <td class="c">{{ $report->rcmf2 }}</td>
                                <td class="c">{{ $report->rcmf2 - $report->rcmi2 + 1 }}</td>
                            </tr>    
                        @endif
                        @if ($report->rcdi1 != 0 )
                            <tr>
                                <td class="c">Registro Civil de Defuncion</td>
                                <td class="c">{{ $report->rcdi1 }}</td>
                                <td class="c">{{ $report->rcdf1 }}</td>
                                <td class="c">{{ $report->rcdf1 - $report->rcdi1 + 1 }}</td>
                            </tr>    
                        @endif
                        @if ($report->rcdi2 != 0 )
                            <tr>
                                <td class="c">Registro Civil de Defuncion</td>
                                <td class="c">{{ $report->rcdi2 }}</td>
                                <td class="c">{{ $report->rcdf2 }}</td>
                                <td class="c">{{ $report->rcdf2 - $report->rcdi2 + 1 }}</td>
                            </tr>    
                        @endif
                        @if ($report->decasi1 != 0 )
                            <tr>
                                <td class="c">Decadactilares</td>
                                <td class="c">{{ $report->decasi1 }}</td>
                                <td class="c">{{ $report->decasf1 }}</td>
                                <td class="c">{{ $report->decasf1 - $report->decasi1 + 1 }}</td>
                            </tr>    
                        @endif
                        @if ($report->decasi2 != 0 )
                            <tr>
                                <td class="c">Decadactilares</td>
                                <td class="c">{{ $report->decasi2 }}</td>
                                <td class="c">{{ $report->decasf2 }}</td>
                                <td class="c">{{ $report->decasf2 - $report->decasi2 + 1 }}</td>
                            </tr>    
                        @endif
                    @endforeach
                </tbody>
            </table>

            <p class="j"><span class="n">NOTA:</span> Favor al abrir el material enviado  al momento del recibo verificar inmediatamente la serie secuencial y el estado del material, alguna anomalía informar a más tardar al día hábil siguiente a la Delegación Departamental Coordinación de Almacén por escrito  (vía fax y/o correo electrónico) de lo contrario cualquier irregularidad será responsabilidad del funcionario.</p>

            <p>Atentamente,</p>
            <br><br>
            <div class="c">
                <span class="t n "> {{ $usuario->nombreusuario }} </span><br> 
                <span class="n "> Líder Área Almacén e Inventarios</span><br>
                <span class="n "> Delegación Departamental del {{ $usuario->departamentonombre }} </span><br>
            </div>

            {{-- <p style="page-break-before: always;"> --}}
        </div>    

@endsection
@section('dependencia') Cordinacion Área de Almacén e Inventarios @endsection

