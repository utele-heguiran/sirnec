@extends('layouts.formatopdf')

@section('textocarta') 
@foreach ($reporte as $registro){{-- {{ $registro[0]->numpreparacion }} --}}@endforeach
@foreach ($user as $usuario)@endforeach    

    <div>
        <p>{{ $user[0]->municipionombre }},&nbsp;{{ $date }}</p>
        <br>
        Oficio DDV - 0910 - 26 - 548  - {{ $registro->numoficiodevolucion }} <br>
         <br>
        <span class="n">Dr.(a) </span><br>
        <span class="t n"> {{ $registro->name }} </span><br>
        <span>Direccion: {{ $registro->direccion }} </span><br>
        <span>Codigo Postal : {{ $registro->codigopostal }} </span><br>
        <span>{{ $registro->departamentonombre }} </span><br>    

        <p><span class="n">Asunto : </span> Material Rechazado de la Oficina :  Registraduria {{ $registro->nameoficina }}</p>
        
        <p>Adjunto al presente me permito remitir a su despacho material de cedulación el cual fue rechazado diferentes motivos.</p>

        <table >
            <tbody>
                <tr>
                    <td width="50" class="s c n">No. Preparacion</td>
                    <td width="55" class="s c n">Identificacion</td>
                    <td width="150" class="s c n">Motivo</td>
                    <td width="75" class="s c n">Clase Tramite</td>
                    <td width="50" class="s c n">Cod Oficina</td>
                    <td width="55" class="s c n">Fecha Preparacion</td>
                </tr>
                @foreach ($reporte as $registro)
                    <tr>
                        <td class="f">{{ $registro->numpreparacion }}</td>
                        <td class="f">{{ $registro->numdocumento }}</td>
                        <td class="f">{{ $registro->nameclasdevolucion }}</td>
                        <td class="f">{{ $registro->nombretipotramite }}</td>
                        <td class="f">{{ $registro->codpmt }}</td>
                        <td class="f">{{ $registro->fecpreparacion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br> 
        <li class="j a">Cuando se deduzca que el error es de ANI, se debe preparar nuevamente material al ciudadano como duplicado anexando en lo posible el soporte correspondiente ( fotocopia de la cedula, fotocopia primera alfabética) y enviarlo al centro de acopio grabado en el lote.</li>
        <li class="j a">Si la inconsistencia es por datos erróneos suministrados por el ciudadano o por error en la elaboración  del material, se realiza la respectiva corrección y se devuelve al centro de acopio.</li>
        <li class="j a">Si es para cambio de datos se realiza como rectificación y se anexa los soportes correspondientes (Registro Civil de Nacimiento, Partida de Bautismo, debidamente autenticados)</li>
        <li class="j a">Si es por falta de firma del ciudadano, bajo ninguna circunstancia se debe hacer la firma de este.</li>
        <li class="j a">Se reitera el anexar el documento cuando el lugar de nacimiento no figura en la base de datos o cuando han nacido en el exterior, porque  hay que grabarlo.</li>
        <li class="j a">Cuando la RECTIFICACION por fecha de nacimiento genera menoría de edad, es necesario que el ciudadano envíe a la Coordinación de Grupo de Novedades, la solicitud de la modificación de la fecha de expedición adjuntando copia del Registro Civil de nacimiento con las respectivas notas de reciproca referencia firmadas por el funcionario competente, para la elaboración de la correspondiente resolución de cambio de fecha de expedición, una vez la Resolución se vea en el Archivo Nacional de Identificación (ANI), el ciudadano debe realizar el trámite de RECTIFICACION para la modificación de fecha de nacimiento.</li>
        <p class="n">LOS ERRORES REPETITIVOS COMO MALA CALIDAD EN FOTO FIRMA Y HUELLAS PASARAN A ESTUDIO DE CONTROL INTERNO A PARTIR DE LAS PROXIMAS DEVOLUCIONES.</p>
        
        Atentamente, 
        <br><br><br>

        <div class="c">
            <span class="t n "> {{ $usuario->nombreusuario }} </span><br> 
            <span class="n "> Coordinador del Centro de Acopio</span><br>
            <span class="n "> Delegación Departamental del {{ $usuario->departamentonombre }} </span><br>
        </div>
        
        
        
        
    </div> 
@endsection
@section('dependencia') Coordinacion del Centro de Acopio @endsection
