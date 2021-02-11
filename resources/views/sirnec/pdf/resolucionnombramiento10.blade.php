@extends('layouts.formatoresolucionpdf')

<div>
    <center>
        <img style="width: 32%;margin-top: -120px"  src="../public/images/logo1.png">
    </center>
</div>

@section('textocarta')
    @foreach ($user as $usuario)@endforeach
    @foreach ($datos as $dato)@endforeach

    <br>
    <div class="c"><strong>RESOLUCIÓN No. {{ $dato->numresolucion }}</strong></div>
    <div class="c"><strong>({{ \Carbon\Carbon::parse($dato->fecharesolucion)->locale('es')->isoFormat('LL') }})</strong></div>
    <br><br>
    <div class="c"><strong>“Por medio de la cual se autoriza Vincular personal Supernumerario”</strong></div>
    <br><br>
    <div class="col-md-12" style="text-align: justify;margin-left: 30px;margin-right: 30px;">
        <strong style="font-size: 13px">LOS SEÑORES DELEGADOS DEPARTAMENTALES DEL {{$usuario->departamentonombre}},</strong> en ejercicio de sus atribuciones legales, en especial la que le confiere el numeral 1° del Art. 33 del Decreto 2241 de 1986 y de acuerdo a las disposiciones contenidas en el literal c) del Art. 20 de la Ley 1350 del 6 de agosto de 2009 y,
    </div>
    <br><br>
    <div class="c"><strong>CONSIDERANDO:</strong></div>
    <br>
    <div style="text-align: justify;">
        Que, en la actualidad existen actividades y procesos transversales en diferentes dependencias de la Registraduria Nacional del Estado Civil que se requieren desarrollar articuladamente para alcanzar los objetivos y metas de la gestión institucional que permita garantizar la efectiva y oportuna prestación del servicio. <br><br> Que, las anteriores actividades son de carácter netamente transitorio y la vinculación de este personal esta amparada en el inciso segundo del articulo 83 del Decreto 1042 de 1978, el cual dispone: "Tambien podrán vincularse supernumerarios para desarrollar actividades de carácter netamente transitorio". <br><br> Que, la planta de personal establecida mediante Decreto Ley 1012 de 2000, no es suficiente para atender todas estas actividades. <br><br> Que, en el presupuesto de la Registraduria Nacional del Estado Civil, existen los fondos suficientes para cubrir la erogación. <br><br> Que, por lo anteriormente Expuesto,</div>
    <div class="c"><strong>RESUELVEN:</strong></div><br>
    <div style="text-align: justify;"><strong>ARTÍCULO PRIMERO: Nombrar,</strong> Provisionalmente de manera discrecional como Supernumerarios de la Delegacion del {{ ucwords(strtolower($dato->nombredepartamento)) }} en el cargo y fechas que se indican con los siguientes servidores asi:</div>
    <br>

    <div class="col-md-12" >
        <table align="center" >
            <tbody>
                <tr>
                    <td width="20" class="s f n">CEDULA</td>
                    <td width="70" class="s f n">NOMBRES</td>
                    <td width="70" class="s f n">CARGO</td>
                    <td width="20" class="s f n">CODIGO</td>
                    <td width="20" class="s f n">SUELDO</td>
                    <td width="50" class="s f n">LUGAR</td>
                    <td width="30" class="s f n">DESDE</td>
                    <td width="30" class="s f n">HASTA</td>
                </tr>
                @foreach ($datos as $dato)
                        <tr>
                            <td class="f">{{ number_format($dato->cedulafuncionario, 0, ',', '.') }}</td>
                            <td class="f">{{ $dato->nombrefunc1 }}</td>
                            <td class="f">{{ $dato->cargofunc }}</td>
                            <td class="f">{{ $dato->codigofunc }} - {{ $dato->gradofunc }} </td>
                            <td class="f">{{ number_format($dato->sueldofunc, 0, ',', '.')  }}</td>
                            <td class="f">{{ $dato->nombreoficina }}</td>
                            <td class="f">{{ $dato->fechainicial }}</td>
                            <td class="f">{{ $dato->fechaterminacion }}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>

    <div style="text-align: justify;"><strong> PARAGRAFO: </strong> funciones a desempeñar por el personal nombrado mediante el presente acto administrativo serán asignadas por los Delegados Departamentales. <br><br> <strong>ARTÍCULO SEGUNDO:</strong> la duración de estos nombramientos provisionales serán hasta los días señalados inclusive, y finalizarán al termino del mismo, sin que para ello se requiera acto administrativo ni comunicación alguna, en todo caso podrán darse por terminados en cualquier momento. <br><br><strong>ARTÍCULO TERCERO:</strong> la Remuneración, del personal nombrado se fijará de acuerdo con lo establecido en el artículo 1° del Decreto 1029 del 6 de Julio de 2019. <br><br><strong>ARTÍCULO CUARTO:</strong> De acuerdo con lo dispuesto por la ley 190 de 1995, en sus artículos 13, 14 y 15, para tomar posesión del cargo, el nominado deberá presentar declaración juramentada de bienes y rentas. <br><br><strong>ARTÍCULO QUINTO:</strong> Comunicación y Recursos. Comunicar la presente resolución al Grupo de Salarios y Prestaciones de la Delegacion y al nivel central, enviar coipa original a las historias laborales de los servidores que se relacionaron en el artículo 1ro de la presente resolución e informar que contra a presente no opera recurso alguno. <br><br></div>
    <div class="c"><strong>COMUNIQUESE Y CUMPLASE; </strong></div>
    <br><br>
    <div class="c"> Dada en {{$usuario->municipionombre}}, el dia {{ \Carbon\Carbon::parse($dato->fecharesolucion)->locale('es')->isoFormat('LL') }}.</div>
    <br><br><br><br>

    <div class="c"><strong>{{ strtoupper($dato->nombredelegado1) }}</strong>   @if ($delegado2datos != "") -   <strong>{{ strtoupper($delegado2datos->name) }}</strong> @else  @endif </div>

    @if ($dato->notaencargodespachos == '')
        <div class="c"> Delegados Departamentales del Estado Civil en el {{$usuario->departamentonombre}} </div>
    @else
        <div class="c"> {{$dato->notaencargodespachos}} </div>
    @endif


    {{-- corte de pagina --}}
    {{-- <div class="page-break"></div> --}}

@endsection
