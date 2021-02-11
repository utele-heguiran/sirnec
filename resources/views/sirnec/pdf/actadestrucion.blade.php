@extends('layouts.formatopdf')

@section('textocarta') 

    @foreach ($datos as $dato)@endforeach 
    @foreach ($user as $usuario) @endforeach

    <br><br>
    <div class="row">
        <div class="col-md-12" style="text-align: center;font-size:14px">
            <strong>ACTA DESTRUCCIÓN DE TARJETAS DECADACTILARES DAÑADAS O ANULADAS</strong>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12" style="text-align: center;font-size:14px">
            <strong>N° 00 ( {{ $dato[0]->actadestruccion }} ) – {{ Carbon\Carbon::now()->format('Y') }}</strong>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-12" style="text-align: justify;font-size:12px">
            En atención al cumplimiento del <strong>MANUAL DE DIRECTRICES DE CENTRO DE ACOPIO</strong> la Registraduría Nacional del Estado Civil, una vez verificados los diversos motivos que llevaron a dañar o anular los formatos de cedulación y tarjeta de identidad, e impidiendo su correcta utilización se procede a realizar la destrucción con el fin de evitar que estos formatos de identificación sean usados posteriormente o extraer información:
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table style="margin-left: -12px">
                <tbody>
                    <tr style="font-size: 9px">
                        <td width="50" class="s c n" style="font-size: 8px">Nª PREPARACION (sin digito de Verificacion)</td>
                        <td width="55" class="s c n">NUIP</td>
                        <td width="60" class="s c n">MOTIVO DE DESTRUCCIÓN</td>
                        <td width="50" class="s c n">FORMATO A DESTRUIR</td>
                        <td width="100" class="s c n">NOMBRE DE LA OFICINA DE PREPARACIÓN</td>
                        <td width="15" class="s c n" style="font-size: 8px">CODIGO DE OFICINA</td>
                        <td width="15" class="s c n" style="font-size: 8px">Nª DE ACTA DE DESTRUCCIÓN</td>
                        <td width="30" class="s c n">FECHA DE DESTRUCCIÓN (DD/MM/AAAA)</td>
                    </tr>
                    @foreach ($datos as $dato)
                        <tr style="font-size: 9px">
                            <td class="f">{{ $dato[0]->numpreparacion }}</td>
                            <td class="f">{{ $dato[0]->nuip }}</td>
                            <td class="f">{{ $dato[0]->motivodestruccion }}</td>
                            <td class="f">{{ $dato[0]->claseformato }}</td>
                            <td class="f">{{ $dato[0]->nombreoficina }}</td>
                            <td class="f">{{ $dato[0]->codpmt }}</td>
                            <td class="f">{{ $dato[0]->actadestruccion }}</td>
                            <td class="f">{{ $dato[0]->fechadestruccion }}</td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
        
    <br><br>


    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            Para un total de ( {{ $numregistros }} ) formatos de cedulación y tarjeta de identidad destruidas.
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            Dada en {{ ucwords(strtolower($usuario->departamentonombre)) }} -  {{ $usuario->municipionombre }}  el dia  {{ $fechadestruccion }}.
        </div>
    </div>
    <br><br>
       
    
    <br><br><br>

    <div class="c">
        <span class="t n "> {{ $usuario->nombreusuario }} </span><br> 
        <span class="n "> Coordinador del Centro de Acopio</span><br>
        <span class="n "> Delegación Departamental del {{  ucwords(strtolower($usuario->departamentonombre)) }} </span><br>
    </div> 

@endsection
@section('dependencia') Coordinacion del Centro de Acopio @endsection
