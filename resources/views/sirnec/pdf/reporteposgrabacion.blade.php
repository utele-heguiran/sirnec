@extends('layouts.formatopdf')

@section('textocarta') 
<br><br>
@foreach ($user as $usuario)@endforeach

    <div class="row"><div class="col-md-12" style="text-align: center;font_size:16px"><strong>REPORTE DE POSGRABACIONES EFECTUADAS</strong><strong></div></div>
    <div class="row"><div class="col-md-12" style="text-align: center;font_size:14px"><strong>{{ $usuario->name}}</strong></div></div>
    <div class="row"><div class="col-md-12" style="text-align: center;font_size:14px"><strong>{{ $fechainicial }} - {{ $fechafinal }}</strong></div></div>
 
   
    @php
        $sumatotalinscritosrcn=0;     
        $sumatotalinscritosrcm=0;     
        $sumatotalinscritosrcd=0;     
        $sumatotal_posgrabacion_rcn=0; 
        $sumatotal_posgrabacion_rcm=0; 
        $sumatotal_posgrabacion_rcd=0; 
        $sumatotal_modificacion_rcn=0; 
        $sumatotal_modificacion_rcm=0; 
        $sumatotal_modificacion_rcd=0; 
    @endphp

<br>

<br>
    <div class="row">
        <div class="col-md-12">
            <table style="font_size:10px">
                <tbody>
                    <tr>
                        <td width="50" class="s c n">Creacion</td>
                        <td width="80" class="s c n">Oficina</td>
                        <td class="s c n">Mes</td>
                        <td class="s c n">Año</td>
                        <td class="s c n">Ins RCN</td>
                        <td class="s c n">Ins RCM</td>
                        <td class="s c n">Ins RCD</td>
                        <td class="s c n">Posg RCN</td>
                        <td class="s c n">Posg RCM</td>
                        <td class="s c n">Posg RCD</td>
                        <td class="s c n">Mod RCN</td>
                        <td class="s c n">Mod RCM</td>
                        <td class="s c n">Mod RCD</td>
                    </tr>
                    @foreach ($data as $row)
                        <tr>
                            <td class="f">{{ $row->feccreacion }}</td>
                            <td class="f">{{ $row->nombreoficina }}</td>
                            <td class="f">{{ $row->mescargue }}</td>
                            <td class="f">{{ $row->ano }}</td>
    
                            <td class="f s">{{ $row->totalinscritosrcn }}</td>
                            <td class="f s">{{ $row->totalinscritosrcm }}</td>
                            <td class="f s">{{ $row->totalinscritosrcd }}</td>
    
                            <td class="f">{{ $row->total_posgrabacion_rcn }}</td>
                            <td class="f">{{ $row->total_posgrabacion_rcm }}</td>
                            <td class="f">{{ $row->total_posgrabacion_rcd }}</td>
    
                            <td class="f">{{ $row->total_modificacion_rcn }}</td>
                            <td class="f">{{ $row->total_modificacion_rcm }}</td>
                            <td class="f">{{ $row->total_modificacion_rcd }}</td>
                            
                            @php
                                $sumatotalinscritosrcn       += $row->totalinscritosrcn; 
                                $sumatotalinscritosrcm       += $row->totalinscritosrcm; 
                                $sumatotalinscritosrcd       += $row->totalinscritosrcd; 
                                $sumatotal_posgrabacion_rcn  += $row->total_posgrabacion_rcn; 
                                $sumatotal_posgrabacion_rcm  += $row->total_posgrabacion_rcm; 
                                $sumatotal_posgrabacion_rcd  += $row->total_posgrabacion_rcd; 
                                $sumatotal_modificacion_rcn  += $row->total_modificacion_rcn; 
                                $sumatotal_modificacion_rcm  += $row->total_modificacion_rcm; 
                                $sumatotal_modificacion_rcd  += $row->total_modificacion_rcd; 
                            @endphp 
                        </tr>
                    @endforeach
                    <tr>
                        <td class="s c n" colspan="4">TOTALES</td>
                        <td class="s c n">{{ $sumatotalinscritosrcn  }}</td>
                        <td class="s c n">{{ $sumatotalinscritosrcm  }}</td>
                        <td class="s c n">{{ $sumatotalinscritosrcd  }}</td>
                        <td class="s c n">{{ $sumatotal_posgrabacion_rcn  }}</td>
                        <td class="s c n">{{ $sumatotal_posgrabacion_rcm  }}</td>
                        <td class="s c n">{{ $sumatotal_posgrabacion_rcd  }}</td>
                        <td class="s c n">{{ $sumatotal_modificacion_rcn  }}</td>
                        <td class="s c n">{{ $sumatotal_modificacion_rcm  }}</td>
                        <td class="s c n">{{ $sumatotal_modificacion_rcd  }}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
<br>
    Reporte generado el dia {{ $date }}  

 
    <br><br><br><br>
    <div class="c">
        <span class="t n "> {{ $usuario->nombreusuario }} </span><br> 
        <span class="n "> Registrador Especial, Auxiliar y/o Municipal </span><br>
        <span class="n "> Delegación Departamental del {{  ucwords(strtolower($usuario->departamentonombre)) }} </span><br>
    </div> 

@endsection
@section('dependencia') Registraduria de {{ $usuario->name}}@endsection