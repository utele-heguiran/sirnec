@extends('layouts.formatoresolucionpdf')

<div>
    <center>
        <img style="width: 32%;margin-top: -120px"  src="../public/images/logo1.png">
    </center>
</div>

@section('textocarta')
    @foreach ($user as $usuario)@endforeach
    @foreach ($dataincapacidad as $dato)@endforeach

    <br>
    <div class="c"><strong>RESOLUCIÓN No. {{ $dato->numresolucion }}</strong></div>
    <div class="c"><strong>({{ \Carbon\Carbon::parse($dato->fecharesolucion)->locale('es')->isoFormat('LL') }})</strong></div>
    <br><br>
    <div class="c"><strong>“Por La Cual Se Efectúan Unos Nombramientos En Provisionalidad”</strong></div>
    <br><br>
    <div class="col-md-12" style="text-align: justify;margin-left: 30px;margin-right: 30px;">
        <strong style="font-size: 13px;">LOS SEÑORES DELEGADOS DEPARTAMENTALES DEL {{$usuario->departamentonombre}},</strong> en ejercicio de sus atribuciones legales, en especial la que le confiere el numeral 1° del Art. 33 del Decreto 2241 de 1986 y de acuerdo a las disposiciones contenidas en el literal c) del Art. 20 de la Ley 1350 del 6 de agosto de 2009 y,
    </div>
    <br><br>
    <div class="c"><strong>CONSIDERANDO:</strong></div>
    <br>
    <div style="text-align: justify;"> Que el literal c) del artículo 20 de la Ley 1350 de 2009, establece: <br><br> (...) <br><br> c) Nombramiento provisional discrecional: Esta clase de nombramiento es excepcional y sólo procederá por especiales razones del servicio. El término de la provisionalidad se podrá hacer hasta por seis (6) meses improrrogables, deberá constar expresamente en la providencia de nombramiento. En el transcurso del término citado se deberá abrir el concurso respectivo para proveer el empleo definitivamente; <br><br>Que, el artículo 276 de la Ley 1450 de 2011, amplió hasta el 6 de agosto de 2012, el término para la implementación del sistema de carrera especial de la Entidad, establecido en el artículo 65 de la Ley 1350 de 2009. <br><br>Que, la Registraduría Nacional del Estado Civil, se encuentra adelantando las actividades de la primera fase del proyecto para la implementación de los procesos de selección en el marco del sistema especial de carrera. <br><br>  Que en virtud de lo anterior los señores Delegados Departamentales solicitaron Viabilidad para nombrar personal provisional en los casos y lugares indicados. <br><br> Que mediante aprobacion de Viabilidad de fecha {{ \Carbon\Carbon::parse($dato->fechaviavilidad)->locale('es')->isoFormat('LL') }} , enviada por el despacho del Gerente del Talento Humano, se autorizo nombrar al Funcionario(a) <strong>{{strtoupper($dato->nombrefunc1)}}</strong> identificada con Cedula de Ciudadania No. {{number_format($dato->cedulafuncionario, 0, ',', '.')}} a partir del {{ \Carbon\Carbon::parse($dato->fechainicial)->locale('es')->isoFormat('LL') }}  y hasta por el término de la incapacidad del servidor(a) <strong> {{strtoupper($dato->nombrefunc2)}}</strong> <br><br>Que, por lo anteriormente expuesto,</div>
    <div class="c"><strong>RESUELVEN:</strong></div><br>
    <div style="text-align: justify;"><strong>ARTÍCULO PRIMERO: Nombrar,</strong> Provisionalmente de manera discrecional en la planta global de la Delegacion del {{ ucwords(strtolower($dato->nombredepartamento)) }} a la Señor(a) <strong>{{strtoupper($dato->nombrefunc1)}}</strong> identificada con Cedula de Ciudadania No. {{number_format($dato->cedulafuncionario, 0, ',', '.')}}, en el cargo de <strong> {{$dato->cargofunc}} {{$dato->codigofunc}}-{{$dato->gradofunc}} </strong> en la {{strtoupper($dato->nombreoficina)}} - {{$dato->nombredepartamento}}, con una asignación básica mensual de ${{number_format($dato->sueldofunc, 0, ',', '.')}}, desde el {{ \Carbon\Carbon::parse($dato->fechainicial)->locale('es')->isoFormat('LL') }} hasta el {{ \Carbon\Carbon::parse($dato->fechaterminacion)->locale('es')->isoFormat('LL') }}, inclusive, y/o mientras dure incapacidad del servidor(a) <strong> {{strtoupper($dato->nombrefunc2)}}</strong>.</div>
    <br>
    <div style="text-align: justify;"><strong>ARTÍCULO SEGUNDO:</strong> la duración de estos nombramientos provisionales y encargos serán hasta los días señalados inclusive, y finalizarán al termino del mismo, sin que para ello se requiera acto administrativo ni comunicación alguna, en todo caso podrán darse por terminados en cualquier momento. <br><br><strong>ARTÍCULO TERCERO:</strong> la Remuneración, del personal nombrado se fijará de acuerdo con lo establecido en el artículo 1° del Decreto 1029 del 6 de Julio de 2019. <br><br><strong>ARTÍCULO CUARTO:</strong> De acuerdo con lo dispuesto por la ley 190 de 1995, en sus artículos 13, 14 y 15, para tomar posesión del cargo, el nominado deberá presentar declaración juramentada de bienes y rentas. <br><br><strong>ARTÍCULO QUINTO:</strong> Comunicación y Recursos. Comunicar la presente resolución al Grupo de Salarios y Prestaciones de la Delegacion y al nivel central, enviar coipa original a las historias laborales de los servidores que se relacionaron en el artículo 1ro de la presente resolución e informar que contra a presente no opera recurso alguno. <br><br></div>
    <div class="c"><strong>COMUNIQUESE Y CUMPLASE; </strong></div>
    <br><br>
    <div class="c"> Dada en {{$usuario->municipionombre}}, el dia {{ \Carbon\Carbon::parse($dato->fecharesolucion)->locale('es')->isoFormat('LL') }}.</div>
    <br><br><br><br>

    <div class="c"><strong>{{ strtoupper($dato->nombredelegado1) }}</strong>   @if ($delegado3datos != "") -   <strong>{{ strtoupper($delegado3datos->name) }}</strong> @else  @endif </div>

    @if ($dato->notaencargodespachos == '')
        <div class="c"> Delegados Departamentales del Estado Civil en el {{$usuario->departamentonombre}} </div>
    @else
        <div class="c"> {{$dato->notaencargodespachos}} </div>
    @endif


    {{-- corte de pagina --}}
    {{-- <div class="page-break"></div> --}}

@endsection
