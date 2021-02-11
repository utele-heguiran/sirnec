@extends('layouts.formatopdfhorizontal')

@section('textocarta')

    <?php
        $totalcod1000 = 0;
        $totalcod1001 = 0;
        $totalcod1002 = 0;
        $totalcod1012 = 0;
        $totalcod1015 = 0;
        $totalcod1016 = 0;
        $totalcod1022 = 0;
        $totalcod1031 = 0;
        $totalcod1043 = 0;
        $totalcod1050 = 0;
        $totalcod1061 = 0;
        $totalcod1070 = 0;
        $totalcod2011 = 0;
        $totalcod2021 = 0;
        $totalcod2022 = 0;
        $totalcod3000 = 0;
        $totalcod4003 = 0;
        $totaltotalofic = 0;
        $totaltotalinhofic = 0;
        $totalporcentaje = 0;
    ?>


    @if (isset($unico))
        @foreach ($unico as $item)
            <?php
                $totalcod1000 =$totalcod1000 + $item['cod1000'];
                $totalcod1001 =$totalcod1001 + $item['cod1001'];
                $totalcod1002 =$totalcod1002 + $item['cod1002'];
                $totalcod1012 =$totalcod1012 + $item['cod1012'];
                $totalcod1015 =$totalcod1015 + $item['cod1015'];
                $totalcod1016 =$totalcod1016 + $item['cod1016'];
                $totalcod1022 =$totalcod1022 + $item['cod1022'];
                $totalcod1031 =$totalcod1031 + $item['cod1031'];
                $totalcod1043 =$totalcod1043 + $item['cod1043'];
                $totalcod1050 =$totalcod1050 + $item['cod1050'];
                $totalcod1061 =$totalcod1061 + $item['cod1061'];
                $totalcod1070 =$totalcod1070 + $item['cod1070'];
                $totalcod2011 =$totalcod2011 + $item['cod2011'];
                $totalcod2021 =$totalcod2021 + $item['cod2021'];
                $totalcod2022 =$totalcod2022 + $item['cod2022'];
                $totalcod3000 =$totalcod3000 + $item['cod3000'];
                $totalcod4003 =$totalcod4003 + $item['cod4003'];
                $totaltotalofic = $totalcod1000 + $totalcod1001 + $totalcod1002 + $totalcod1012 + $totalcod1015 + $totalcod1016 + $totalcod1022 + $totalcod1031 + $totalcod1043 + $totalcod1050 +  $totalcod1061 + $totalcod1070 + $totalcod2011 + $totalcod2021 + $totalcod2022 + $totalcod3000 + $totalcod4003 ;
                $totaltotalinhofic = $totalcod1012 + $totalcod1022 + $totalcod1031 + $totalcod1043 + $totalcod1050 + $totalcod2011 ;
            ?>
        @endforeach
    @endif

    @foreach ($user as $usuario)@endforeach
        <div class="row">
            <div class="col-md-12" style="text-align: right; margin_top: -85px" >
                <span style="text-align: center; font_size:16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"><strong>ESTADISTICA<br>Rankig de Rechazos</strong></span><br>
                <span style="text-align: center; font_size:14px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"><strong>Fechas del Reporte {{ $fechainicial }} - {{ $fechafinal }}</strong></span>
            </div>
        </div>

        @if (isset($unico))
            <table id="tabla" style="font-size: 9px">
                <thead >
                    <tr>
                        <td width="20" class="b c">COD</td>
                        <td width="150" class="b c">OFICINA</td>
                        <td width="20" class="b c s">1000</td>
                        <td width="20" class="b c s">1001</td>
                        <td width="20" class="b c s">1002</td>
                        <td width="20" class="b c s">1012</td>
                        <td width="20" class="b c s">1015</td>
                        <td width="20" class="b c s">1016</td>
                        <td width="20" class="b c s">1022</td>
                        <td width="20" class="b c s">1031</td>
                        <td width="20" class="b c s">1043</td>
                        <td width="20" class="b c s">1050</td>
                        <td width="20" class="b c s">1061</td>
                        <td width="20" class="b c s">1070</td>
                        <td width="20" class="b c s">2011</td>
                        <td width="20" class="b c s">2021</td>
                        <td width="20" class="b c s">2022</td>
                        <td width="20" class="b c s">3000</td>
                        <td width="20" class="b c s">4003</td>
                        <td class="blanco"> ES</td>
                        <td width="20" class="b c s">TOTAL</td>
                        <td class="blanco"> ES</td>
                        <td width="20" class="b c s">INHERENTES</td>
                        <td class="blanco"> ES</td>
                        <td width="40" class="b c s">%</td>
                    </tr>
                    <tr>
                        <td>
                            <td class="blanco" style="font-size: 7px"> ES</td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unico as $item)
                        <tr>
                            <td class="c">{{ $item['codpmt'] }}</td>
                            <td class="s">{{ $item['nombre'] }}</td>
                            <td class="c">{{ $item['cod1000'] }}</td>
                            <td class="c s">{{ $item['cod1001'] }}</td>
                            <td class="c">{{ $item['cod1002'] }}</td>
                            <td class="c s">{{ $item['cod1012'] }}</td>
                            <td class="c">{{ $item['cod1015'] }}</td>
                            <td class="c s">{{ $item['cod1016'] }}</td>
                            <td class="c">{{ $item['cod1022'] }}</td>
                            <td class="c s">{{ $item['cod1031'] }}</td>
                            <td class="c">{{ $item['cod1043'] }}</td>
                            <td class="c s">{{ $item['cod1050'] }}</td>
                            <td class="c">{{ $item['cod1061'] }}</td>
                            <td class="c s">{{ $item['cod1070'] }}</td>
                            <td class="c">{{ $item['cod2011'] }}</td>
                            <td class="c s">{{ $item['cod2021'] }}</td>
                            <td class="c">{{ $item['cod2022'] }}</td>
                            <td class="c s">{{ $item['cod3000'] }}</td>
                            <td class="c">{{ $item['cod4003'] }}</td>
                            <td class="blanco"> ES</td>
                            <td class="c s">{{ $item['totalofic'] }}</td>
                            <td class="blanco"> ES</td>
                            <td class="c s">{{ $item['totalinhofic'] }}</td>
                            <td class="blanco"> ES</td>
                            <td class="c s">{{ $item['porcentaje'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <td class="blanco"> ES</td>
                        </td>
                    </tr>
                    <tr>
                    <td class="blanco"> ES</td>
                    <td class="c s">TOTALES</td>
                    <td class="c s">{{ $totalcod1000 }}</td>
                    <td class="c s">{{ $totalcod1001  }}</td>
                    <td class="c s">{{ $totalcod1002  }}</td>
                    <td class="c s">{{ $totalcod1012  }}</td>
                    <td class="c s">{{ $totalcod1015  }}</td>
                    <td class="c s">{{ $totalcod1016  }}</td>
                    <td class="c s">{{ $totalcod1022  }}</td>
                    <td class="c s">{{ $totalcod1031  }}</td>
                    <td class="c s">{{ $totalcod1043  }}</td>
                    <td class="c s">{{ $totalcod1050  }}</td>
                    <td class="c s">{{ $totalcod1061  }}</td>
                    <td class="c s">{{ $totalcod1070  }}</td>
                    <td class="c s">{{ $totalcod2011  }}</td>
                    <td class="c s">{{ $totalcod2021  }}</td>
                    <td class="c s">{{ $totalcod2022  }}</td>
                    <td class="c s">{{ $totalcod3000  }}</td>
                    <td class="c s">{{ $totalcod4003  }}</td>
                    <td class="blanco"> ES</td>
                    <td class="c s">{{ $totaltotalofic }}</td>
                    <td class="blanco"> ES</td>
                    <td class="c s">{{ $totaltotalinhofic  }}</td>
                    <td class="blanco"> ES</td>
                    <td class="blanco"> ES</td>
                    </tr>
                </tbody>
            </table>
        @else
            <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> *  NO EXISTEN RECHAZOS PARA MOSTRAR  *</span><center></strong>
        @endif


        <br>

        <div class="row">
            <div class="col-md-8" style="font-size: 10px">
                <strong>DESCRIPCION DE LOS CODIGOS DE RECHAZO </strong><br><br>
                @foreach ($codrechazos as $row)
                    Codigo No. {{ $row->id }}  - {{ $row->name }} <br>
                @endforeach
            </div>
        </div>




@endsection
        @section('dependencia')Generado el dia {{ $date }} por {{ $usuario->nombreusuario }} @endsection





