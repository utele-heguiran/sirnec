@extends('layouts.formatopdfhorizontal')

@section('textocarta')
<?php
    $totregnind = 0;
    $totregnafc = 0;
    $totregndez = 0;
    $totregnmay = 0;
    $totregnmen = 0;
    $totregnhom = 0;
    $totregnmuj = 0;
    $totregncert = 0;
    $totregmins = 0;
    $totregmcert = 0;
    $totregdind = 0;
    $totregdafc = 0;
    $totregdmen = 0;
    $totregdmay = 0;
    $totregdhom = 0;
    $totregdmuj = 0;
    $totregdcert = 0;
    $totnotnind = 0;
    $totnotnafc = 0;
    $totnotndez = 0;
    $totnotnmay = 0;
    $totnotnmen = 0;
    $totnotnhom = 0;
    $totnotnmuj = 0;
    $totnotncert = 0;
    $totnotmins = 0;
    $totnotmcert = 0;
    $totnotdind = 0;
    $totnotdafc = 0;
    $totnotdmen = 0;
    $totnotdmay = 0;
    $totnotdhom = 0;
    $totnotdmuj = 0;
    $totnotdcert = 0;
?>

@if (count($dataregis) > 0)
    @foreach ($dataregis as $item)
        <?php
            $totregnind += $item['rcn_indigenas'];
            $totregnafc += $item['rcn_afro'];
            $totregndez += $item['rcn_decreto290'];
            $totregnmay += $item['rcn_mayores'];
            $totregnmen += $item['rcn_menores'];
            $totregnhom += $item['rcn_masculino'];
            $totregnmuj += $item['rcn_femenino'];
            $totregncert += $item['rcn_certificaciones'];
            $totregmins += $item['rcm_inscritos'];
            $totregmcert += $item['rcm_certificaciones'];
            $totregdind += $item['rcd_indigenas'];
            $totregdafc += $item['rcd_afro'];
            $totregdmen += $item['rcd_menores'];
            $totregdmay += $item['rcd_mayores'];
            $totregdhom += $item['rcd_masculino'];
            $totregdmuj += $item['rcd_femenino'];
            $totregdcert += $item['rcd_certificaciones'];
        ?>
    @endforeach
@endif

@if (count($datanotar) > 0)
    @foreach ($datanotar as $item)
        <?php
            $totnotnind += $item['rcn_indigenas'];
            $totnotnafc += $item['rcn_afro'];
            $totnotndez += $item['rcn_decreto290'];
            $totnotnmay += $item['rcn_mayores'];
            $totnotnmen += $item['rcn_menores'];
            $totnotnhom += $item['rcn_masculino'];
            $totnotnmuj += $item['rcn_femenino'];
            $totnotncert += $item['rcn_certificaciones'];
            $totnotmins += $item['rcm_inscritos'];
            $totnotmcert += $item['rcm_certificaciones'];
            $totnotdind += $item['rcd_indigenas'];
            $totnotdafc += $item['rcd_afro'];
            $totnotdmen += $item['rcd_menores'];
            $totnotdmay += $item['rcd_mayores'];
            $totnotdhom += $item['rcd_masculino'];
            $totnotdmuj += $item['rcd_femenino'];
            $totnotdcert += $item['rcd_certificaciones'];
        ?>
    @endforeach
@endif

@foreach ($user as $usuario)@endforeach
        <div class="row">
            <div class="col-md-12" style="text-align: right; margin_top: -70px" >
                <span style="text-align: center; font_size:16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"><strong>ESTADISTICA<br>Registradurias y Notarias RAFT-30</strong></span><br>
                <span style="text-align: center; font_size:14px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"><strong>Fechas del Reporte {{ $fechainicial }} - {{ $fechafinal }}</strong></span>
            </div>
        </div>

        @if (count($dataregis) > 0)
        <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> REGISTRADURIAS </span><center></strong><br>
            <table id="tabla" style="font-size: 9px">
                <thead >
                    <tr>
                        <td width="80" class="b c">DEPARTAMENTO</td>
                        <td width="160" class="b c s" colspan="9">NACIMIENTOS</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c s" colspan="2">MATRIMONIO</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="140" class="b c s" colspan="8">DEFUNCIONES</td>
                    </tr>
                    <tr>
                        <td width="80" class="b c s" rowspan="2">{{ $usuario->departamentonombre }}</td>
                        <td width="160" class="b c" colspan="8">INSCRIPCIONES</td>
                        <td width="20" class="b c">CERTIF</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">INSC</td>
                        <td width="20" class="b c">CERT</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="140" class="b c" colspan="7">INSCRIPCIONES</td>
                        <td width="20" class="b c">CERTIF</td>
                    </tr>
                    <tr>
                        <td width="20" class="b c">1</td>
                        <td width="20" class="b c">2</td>
                        <td width="20" class="b c">3</td>
                        <td width="20" class="b c">1</td>
                        <td width="20" class="b c">2</td>
                        <td width="20" class="b c">3</td>
                        <td width="20" class="b c">4</td>
                        <td width="20" class="b c s">3+4</td>
                        <td width="20" class="b c">5</td>
                        <td width="20" class="blanco"> ES</td>
                        <td width="20" class="b c">6</td>
                        <td width="20" class="b c">7</td>
                        <td width="20" class="blanco"> ES</td>
                        <td width="20" class="b c">11</td>
                        <td width="20" class="b c">12</td>
                        <td width="20" class="b c">8</td>
                        <td width="20" class="b c">14</td>
                        <td width="20" class="b c">9</td>
                        <td width="20" class="b c">11</td>
                        <td width="20" class="b c s">9+11</td>
                        <td width="20" class="b c">12</td>
                    </tr>
                    <tr>
                        <td width="80" class="b c"><strong>REGISTRADURIAS</strong></td>
                        <td width="20" class="b c">IND</td>
                        <td width="20" class="b c">AF.C.</td>
                        <td width="20" class="b c">DEZ</td>
                        <td width="20" class="b c">MAY</td>
                        <td width="20" class="b c">MEN</td>
                        <td width="20" class="b c">HOM</td>
                        <td width="20" class="b c">MUJ</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">IND</td>
                        <td width="20" class="b c">AF.C.</td>
                        <td width="20" class="b c">MEN</td>
                        <td width="20" class="b c">MAY</td>
                        <td width="20" class="b c">HOM</td>
                        <td width="20" class="b c">MUJ</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                    </tr>
                    <tr>
                        <td>
                            <td class="blanco" style="font-size: 7px"> ES</td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataregis as $regis)
                        <tr>
                            <td class="b"> {{ $regis['nombre'] }}</td>
                            <td class="b c">{{ $regis['rcn_indigenas'] }}</td>
                            <td class="b c">{{ $regis['rcn_afro'] }}</td>
                            <td class="b c">{{ $regis['rcn_decreto290'] }}</td>
                            <td class="b c">{{ $regis['rcn_mayores'] }}</td>
                            <td class="b c">{{ $regis['rcn_menores'] }}</td>
                            <td class="b c">{{ $regis['rcn_masculino'] }}</td>
                            <td class="b c">{{ $regis['rcn_femenino'] }}</td>
                            <td class="b c s">{{ $regis['rcn_total'] }}</td>
                            <td class="b c">{{ $regis['rcn_certificaciones'] }}</td>
                            <td class="blanco">ES</td>
                            <td class="b c">{{ $regis['rcm_inscritos'] }}</td>
                            <td class="b c">{{ $regis['rcm_certificaciones'] }}</td>
                            <td class="blanco">ES</td>
                            <td class="b c">{{ $regis['rcd_indigenas'] }}</td>
                            <td class="b c">{{ $regis['rcd_afro'] }}</td>
                            <td class="b c">{{ $regis['rcd_menores'] }}</td>
                            <td class="b c">{{ $regis['rcd_mayores'] }}</td>
                            <td class="b c">{{ $regis['rcd_masculino'] }}</td>
                            <td class="b c">{{ $regis['rcd_femenino'] }}</td>
                            <td class="b c s">{{ $regis['rcd_total'] }}</td>
                            <td class="b c">{{ $regis['rcd_certificaciones'] }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>
                                <td class="blanco"> ES</td>
                            </td>
                        </tr>
                        <tr>
                            <td class="b c s">TOTALES REGISTRADURIAS</td>
                            <td class="b c s">{{ $totregnind }}</td>
                            <td class="b c s">{{ $totregnafc }}</td>
                            <td class="b c s">{{ $totregndez }}</td>
                            <td class="b c s">{{ $totregnmay }}</td>
                            <td class="b c s">{{ $totregnmen }}</td>
                            <td class="b c s">{{ $totregnhom }}</td>
                            <td class="b c s">{{ $totregnmuj }}</td>
                            <td class="b c s">{{ $totregnhom +  $totregnmuj}}</td>
                            <td class="b c s">{{ $totregncert }}</td>
                            <td class="blanco"> ES</td>
                            <td class="b c s">{{ $totregmins }}</td>
                            <td class="b c s">{{ $totregmcert }}</td>
                            <td class="blanco"> ES</td>
                            <td class="b c s">{{ $totregdind }}</td>
                            <td class="b c s">{{ $totregdafc }}</td>
                            <td class="b c s">{{ $totregdmen }}</td>
                            <td class="b c s">{{ $totregdmay }}</td>
                            <td class="b c s">{{ $totregdhom }}</td>
                            <td class="b c s">{{ $totregdmuj }}</td>
                            <td class="b c s">{{ $totregdhom + $totregdmuj }}</td>
                            <td class="b c s">{{ $totregdcert }}</td>
                        </tr>
                </tbody>
            </table>
            <br>
        @else
            <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> *  NO EXISTEN REGISTROS DE RAFT 30 PARA REGISTRADURIAS  *</span><center></strong>
        @endif


        @if (count($datanotar) > 0)
            <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> NOTARIAS</span><center></strong><br>
            <table id="tabla" style="font-size: 9px">
                <thead >
                    <tr>
                        <td width="80" class="b c">DEPARTAMENTO</td>
                        <td width="160" class="b c s" colspan="9">NACIMIENTOS</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c s" colspan="2">MATRIMONIO</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="140" class="b c s" colspan="8">DEFUNCIONES</td>
                    </tr>
                    <tr>
                        <td width="80" class="b c s" rowspan="2">{{ $usuario->departamentonombre }}</td>
                        <td width="160" class="b c" colspan="8">INSCRIPCIONES</td>
                        <td width="20" class="b c">CERTIF</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">INSC</td>
                        <td width="20" class="b c">CERT</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="140" class="b c" colspan="7">INSCRIPCIONES</td>
                        <td width="20" class="b c">CERTIF</td>
                    </tr>
                    <tr>
                        <td width="20" class="b c">1</td>
                        <td width="20" class="b c">2</td>
                        <td width="20" class="b c">3</td>
                        <td width="20" class="b c">1</td>
                        <td width="20" class="b c">2</td>
                        <td width="20" class="b c">3</td>
                        <td width="20" class="b c">4</td>
                        <td width="20" class="b c s">3+4</td>
                        <td width="20" class="b c">5</td>
                        <td width="20" class="blanco"> ES</td>
                        <td width="20" class="b c">6</td>
                        <td width="20" class="b c">7</td>
                        <td width="20" class="blanco"> ES</td>
                        <td width="20" class="b c">11</td>
                        <td width="20" class="b c">12</td>
                        <td width="20" class="b c">8</td>
                        <td width="20" class="b c">14</td>
                        <td width="20" class="b c">9</td>
                        <td width="20" class="b c">11</td>
                        <td width="20" class="b c s">9+11</td>
                        <td width="20" class="b c">12</td>
                    </tr>
                    <tr>
                        <td width="80" class="b c"><strong>NOTARIAS</strong></td>
                        <td width="20" class="b c">IND</td>
                        <td width="20" class="b c">AF.C.</td>
                        <td width="20" class="b c">DEZ</td>
                        <td width="20" class="b c">MAY</td>
                        <td width="20" class="b c">MEN</td>
                        <td width="20" class="b c">HOM</td>
                        <td width="20" class="b c">MUJ</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">IND</td>
                        <td width="20" class="b c">AF.C.</td>
                        <td width="20" class="b c">MEN</td>
                        <td width="20" class="b c">MAY</td>
                        <td width="20" class="b c">HOM</td>
                        <td width="20" class="b c">MUJ</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                    </tr>
                    <tr>
                        <td>
                            <td class="blanco" style="font-size: 7px"> ES</td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datanotar as $notar)
                        <tr>
                            <td class="b"> {{ $notar['nombre'] }}</td>
                            <td class="b c">{{ $notar['rcn_indigenas'] }}</td>
                            <td class="b c">{{ $notar['rcn_afro'] }}</td>
                            <td class="b c">{{ $notar['rcn_decreto290'] }}</td>
                            <td class="b c">{{ $notar['rcn_mayores'] }}</td>
                            <td class="b c">{{ $notar['rcn_menores'] }}</td>
                            <td class="b c">{{ $notar['rcn_masculino'] }}</td>
                            <td class="b c">{{ $notar['rcn_femenino'] }}</td>
                            <td class="b c s">{{ $notar['rcn_total'] }}</td>
                            <td class="b c">{{ $notar['rcn_certificaciones'] }}</td>
                            <td class="blanco">ES</td>
                            <td class="b c">{{ $notar['rcm_inscritos'] }}</td>
                            <td class="b c">{{ $notar['rcm_certificaciones'] }}</td>
                            <td class="blanco">ES</td>
                            <td class="b c">{{ $notar['rcd_indigenas'] }}</td>
                            <td class="b c">{{ $notar['rcd_afro'] }}</td>
                            <td class="b c">{{ $notar['rcd_menores'] }}</td>
                            <td class="b c">{{ $notar['rcd_mayores'] }}</td>
                            <td class="b c">{{ $notar['rcd_masculino'] }}</td>
                            <td class="b c">{{ $notar['rcd_femenino'] }}</td>
                            <td class="b c s">{{ $notar['rcd_total'] }}</td>
                            <td class="b c">{{ $notar['rcd_certificaciones'] }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>
                                <td class="blanco"> ES</td>
                            </td>
                        </tr>
                        <tr>
                            <td class="b c s">TOTALES NOTARIAS</td>
                            <td class="b c s">{{ $totnotnind }}</td>
                            <td class="b c s">{{ $totnotnafc }}</td>
                            <td class="b c s">{{ $totnotndez }}</td>
                            <td class="b c s">{{ $totnotnmay }}</td>
                            <td class="b c s">{{ $totnotnmen }}</td>
                            <td class="b c s">{{ $totnotnhom }}</td>
                            <td class="b c s">{{ $totnotnmuj }}</td>
                            <td class="b c s">{{ $totnotnhom +  $totregnmuj}}</td>
                            <td class="b c s">{{ $totnotncert }}</td>
                            <td class="blanco"> ES</td>
                            <td class="b c s">{{ $totnotmins }}</td>
                            <td class="b c s">{{ $totnotmcert }}</td>
                            <td class="blanco"> ES</td>
                            <td class="b c s">{{ $totnotdind }}</td>
                            <td class="b c s">{{ $totnotdafc }}</td>
                            <td class="b c s">{{ $totnotdmen }}</td>
                            <td class="b c s">{{ $totnotdmay }}</td>
                            <td class="b c s">{{ $totnotdhom }}</td>
                            <td class="b c s">{{ $totnotdmuj }}</td>
                            <td class="b c s">{{ $totnotdhom + $totregdmuj }}</td>
                            <td class="b c s">{{ $totnotdcert }}</td>
                        </tr>
                </tbody>
            </table>
            <br>
        @else
            <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> *  NO EXISTEN REGISTROS DE RAFT 30 PARA NOTARIAS *</span><center></strong>
            <br>
        @endif

        <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> TOTAL GENERAL RAFT 30</span><center></strong><br>

            <table id="tabla" style="font-size: 9px">
                <thead >
                    <tr>
                        <td width="80" class="b c">DEPARTAMENTO</td>
                        <td width="160" class="b c s" colspan="9">NACIMIENTOS</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c s" colspan="2">MATRIMONIO</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="140" class="b c s" colspan="8">DEFUNCIONES</td>
                    </tr>
                    <tr>
                        <td width="80" class="b c s" rowspan="3">{{ $usuario->departamentonombre }}</td>
                        <td width="160" class="b c" colspan="8">INSCRIPCIONES</td>
                        <td width="20" class="b c">CERTIF</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">INSC</td>
                        <td width="20" class="b c">CERT</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="140" class="b c" colspan="7">INSCRIPCIONES</td>
                        <td width="20" class="b c">CERTIF</td>
                    </tr>
                    <tr>
                        <td width="20" class="b c">1</td>
                        <td width="20" class="b c">2</td>
                        <td width="20" class="b c">3</td>
                        <td width="20" class="b c">1</td>
                        <td width="20" class="b c">2</td>
                        <td width="20" class="b c">3</td>
                        <td width="20" class="b c">4</td>
                        <td width="20" class="b c s">3+4</td>
                        <td width="20" class="b c">5</td>
                        <td width="20" class="blanco"> ES</td>
                        <td width="20" class="b c">6</td>
                        <td width="20" class="b c">7</td>
                        <td width="20" class="blanco"> ES</td>
                        <td width="20" class="b c">11</td>
                        <td width="20" class="b c">12</td>
                        <td width="20" class="b c">8</td>
                        <td width="20" class="b c">14</td>
                        <td width="20" class="b c">9</td>
                        <td width="20" class="b c">11</td>
                        <td width="20" class="b c s">9+11</td>
                        <td width="20" class="b c">12</td>
                    </tr>
                    <tr>
                        <td width="20" class="b c">IND</td>
                        <td width="20" class="b c">AF.C.</td>
                        <td width="20" class="b c">DEZ</td>
                        <td width="20" class="b c">MAY</td>
                        <td width="20" class="b c">MEN</td>
                        <td width="20" class="b c">HOM</td>
                        <td width="20" class="b c">MUJ</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="blanco">ES</td>
                        <td width="20" class="b c">IND</td>
                        <td width="20" class="b c">AF.C.</td>
                        <td width="20" class="b c">MEN</td>
                        <td width="20" class="b c">MAY</td>
                        <td width="20" class="b c">HOM</td>
                        <td width="20" class="b c">MUJ</td>
                        <td width="20" class="b c">TOTAL</td>
                        <td width="20" class="b c">TOTAL</td>
                    </tr>
                    <tr>
                        <td>
                            <td class="blanco" style="font-size: 7px"> ES</td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="b c s">TOTAL REGISTRADURIAS</td>
                        <td class="b c s">{{ $totregnind }}</td>
                        <td class="b c s">{{ $totregnafc }}</td>
                        <td class="b c s">{{ $totregndez }}</td>
                        <td class="b c s">{{ $totregnmay }}</td>
                        <td class="b c s">{{ $totregnmen }}</td>
                        <td class="b c s">{{ $totregnhom }}</td>
                        <td class="b c s">{{ $totregnmuj }}</td>
                        <td class="b c s">{{ $totregnhom +  $totregnmuj}}</td>
                        <td class="b c s">{{ $totregncert }}</td>
                        <td class="blanco"> ES</td>
                        <td class="b c s">{{ $totregmins }}</td>
                        <td class="b c s">{{ $totregmcert }}</td>
                        <td class="blanco"> ES</td>
                        <td class="b c s">{{ $totregdind }}</td>
                        <td class="b c s">{{ $totregdafc }}</td>
                        <td class="b c s">{{ $totregdmen }}</td>
                        <td class="b c s">{{ $totregdmay }}</td>
                        <td class="b c s">{{ $totregdhom }}</td>
                        <td class="b c s">{{ $totregdmuj }}</td>
                        <td class="b c s">{{ $totregdhom + $totregdmuj }}</td>
                        <td class="b c s">{{ $totregdcert }}</td>
                    </tr>
                    <tr>
                        <td class="b c s">TOTAL NOTARIAS</td>
                        <td class="b c s">{{ $totnotnind }}</td>
                        <td class="b c s">{{ $totnotnafc }}</td>
                        <td class="b c s">{{ $totnotndez }}</td>
                        <td class="b c s">{{ $totnotnmay }}</td>
                        <td class="b c s">{{ $totnotnmen }}</td>
                        <td class="b c s">{{ $totnotnhom }}</td>
                        <td class="b c s">{{ $totnotnmuj }}</td>
                        <td class="b c s">{{ $totnotnhom +  $totregnmuj}}</td>
                        <td class="b c s">{{ $totnotncert }}</td>
                        <td class="blanco"> ES</td>
                        <td class="b c s">{{ $totnotmins }}</td>
                        <td class="b c s">{{ $totnotmcert }}</td>
                        <td class="blanco"> ES</td>
                        <td class="b c s">{{ $totnotdind }}</td>
                        <td class="b c s">{{ $totnotdafc }}</td>
                        <td class="b c s">{{ $totnotdmen }}</td>
                        <td class="b c s">{{ $totnotdmay }}</td>
                        <td class="b c s">{{ $totnotdhom }}</td>
                        <td class="b c s">{{ $totnotdmuj }}</td>
                        <td class="b c s">{{ $totnotdhom + $totregdmuj }}</td>
                        <td class="b c s">{{ $totnotdcert }}</td>
                    </tr>
                    <tr>
                        <td class="b c s">TOTAL GENERALES</td>
                        <td class="b c s">{{ $totregnind + $totnotnind }}</td>
                        <td class="b c s">{{ $totregnafc + $totnotnafc }}</td>
                        <td class="b c s">{{ $totregndez + $totnotndez }}</td>
                        <td class="b c s">{{ $totregnmay + $totnotnmay }}</td>
                        <td class="b c s">{{ $totregnmen + $totnotnmen }}</td>
                        <td class="b c s">{{ $totregnhom + $totnotnhom }}</td>
                        <td class="b c s">{{ $totregnmuj + $totnotnmuj }}</td>
                        <td class="b c s">{{ $totregnhom +  $totregnmuj + $totnotnhom +  $totregnmuj }}</td>
                        <td class="b c s">{{ $totregncert + $totnotncert }}</td>
                        <td class="blanco"> ES</td>
                        <td class="b c s">{{ $totregmins + $totnotmins }}</td>
                        <td class="b c s">{{ $totregmcert + $totnotmcert }}</td>
                        <td class="blanco"> ES</td>
                        <td class="b c s">{{ $totregdind + $totnotdind }}</td>
                        <td class="b c s">{{ $totregdafc + $totnotdafc }}</td>
                        <td class="b c s">{{ $totregdmen + $totnotdmen }}</td>
                        <td class="b c s">{{ $totregdmay + $totnotdmay }}</td>
                        <td class="b c s">{{ $totregdhom + $totnotdhom }}</td>
                        <td class="b c s">{{ $totregdmuj + $totnotdmuj }}</td>
                        <td class="b c s">{{ $totregdhom + $totregdmuj + $totnotdhom + $totregdmuj}}</td>
                        <td class="b c s">{{ $totregdcert + $totnotdcert }}</td>
                    </tr>
                </tbody>
            </table>










        <br>
        <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> OFICINAS REGISTRALES FALTANTES DE RAFT 30</span><center></strong><br>
        <center>
            @if (isset($faltantes))
                @foreach ($faltantes as $faltan)
                    * {{$faltan}} *<br>
                @endforeach
            @else
                Complimiento Total para las Oficinas Registrales Activas
            @endif
        </center>
        <br>
        <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> FIN INFORME RAFT 30</span><center></strong><br>
        <br>

@endsection
        @section('dependencia')Generado el dia {{ $date }} por {{ $usuario->nombreusuario }} @endsection

