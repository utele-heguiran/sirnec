@extends('layouts.formatopdfhorizontal')

@section('textocarta')

    @foreach ($user as $usuario)@endforeach
        <div class="row">
            <div class="col-md-12" style="text-align: right; margin_top: -85px" >
                <span style="text-align: center; font_size:16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"><strong>ESTADISTICA<br>Rankig de Devoluciones</strong></span><br>
                <span style="text-align: center; font_size:14px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"><strong>Fechas del Reporte {{ $fechainicial }} - {{ $fechafinal }}<br> Usuario :  {{ $usuario->nombreusuario }}</strong></span>
            </div>
        </div>

        @if (isset($unico))

            <table id="tabla" style="font-size: 9px">
                <thead >
                    <tr>
                        <td width="20" class="b c">COD</td>
                        <td width="150" class="b c">OFICINA</td>
                        <td width="15" class="b c s">A</td>
                        <td width="15" class="b c s">B</td>
                        <td width="15" class="b c s">C</td>
                        <td width="15" class="b c s">D</td>
                        <td width="15" class="b c s">E</td>
                        <td width="15" class="b c s">F</td>
                        <td width="15" class="b c s">G</td>
                        <td width="15" class="b c s">H</td>
                        <td width="15" class="b c s">K</td>
                        <td width="15" class="b c s">L</td>
                        <td width="15" class="b c s">M</td>
                        <td width="15" class="b c s">N</td>
                        <td width="15" class="b c s">O</td>
                        <td width="15" class="b c s">P</td>
                        <td width="15" class="b c s">Q</td>
                        <td width="15" class="b c s">R</td>
                        <td width="15" class="b c s">S</td>
                        <td width="15" class="b c s">T</td>
                        <td width="15" class="b c s">U</td>
                        <td width="15" class="b c s">V</td>
                        <td width="15" class="b c s">W</td>
                        <td class="blanco"> ES</td>
                        <td width="15" class="b c s">TOTAL</td>
                        <td class="blanco"> ES</td>
                        <td width="30" class="b c s">%</td>
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
                            <td class="c">{{ $item['a'] }}</td>
                            <td class="c s">{{ $item['b'] }}</td>
                            <td class="c">{{ $item['c'] }}</td>
                            <td class="c s">{{ $item['d'] }}</td>
                            <td class="c">{{ $item['e'] }}</td>
                            <td class="c s">{{ $item['f'] }}</td>
                            <td class="c">{{ $item['g'] }}</td>
                            <td class="c s">{{ $item['h'] }}</td>
                            <td class="c">{{ $item['k'] }}</td>
                            <td class="c s">{{ $item['l'] }}</td>
                            <td class="c">{{ $item['m'] }}</td>
                            <td class="c s">{{ $item['n'] }}</td>
                            <td class="c">{{ $item['o'] }}</td>
                            <td class="c s">{{ $item['p'] }}</td>
                            <td class="c">{{ $item['q'] }}</td>
                            <td class="c s">{{ $item['r'] }}</td>
                            <td class="c">{{ $item['s'] }}</td>
                            <td class="c s">{{ $item['t'] }}</td>
                            <td class="c">{{ $item['u'] }}</td>
                            <td class="c s">{{ $item['v'] }}</td>
                            <td class="c">{{ $item['w'] }}</td>
                            <td class="blanco"> ES</td>
                            <td class="c s">{{ $item['totalofic'] }}</td>
                            <td class="blanco"> ES</td>
                            <td class="c s">{{ $item['porcentaje'] }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <br>
        @else
            <strong><center><span style="font-size: 16px; font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #000000;"> *  NO EXISTEN DEVOLUCIONES PARA MOSTRAR  *</span><center></strong><br>
        @endif

        <div class="row">
            <div class="col-md-8" style="font-size: 10px">
                <strong>DESCRIPCION DE LOS CODIGOS DE DEVOLUCIONES </strong><br><br>
                @foreach ($coddevoluciones as $row)
                    Codigo  {{ $row->name }} <br>
                @endforeach
            </div>
        </div>




@endsection
        @section('dependencia')Generado el dia {{ $date }} por {{ $usuario->nombreusuario }} @endsection






