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
    <div class="c"><strong>“Por la cual se Prórroga un nombramiento de personal de libre nombramiento y <br> remoción en la Planta Global de la Delegación del Valle del Cauca”</strong></div>
    <br><br>
    <div class="col-md-12" style="text-align: justify;margin-left: 30px;margin-right: 30px;">
        <strong style="font-size: 13px">LOS SEÑORES DELEGADOS DEPARTAMENTALES DEL {{$usuario->departamentonombre}},</strong> en ejercicio de sus atribuciones legales, en especial la que le confiere el numeral 1° del Art. 33 del Decreto 2241 de 1986 y de acuerdo a las disposiciones contenidas en el literal c) del Art. 20 de la Ley 1350 del 6 de agosto de 2009 y,
    </div>
    <br><br>
    <div class="c"><strong>CONSIDERANDO:</strong></div>
    <br>
    <div style="text-align: justify;">Que, mediante la ley 1350 del 6 de agosto de 2009, se reglamentó la carrera administrativa Especial de la Registraduria Nacional del estado Civil, y se dictaron normas que regulan la Gerencia Publica. <br><br>
        Que, el empleo de {{$dato->cargofunc}} {{$dato->codigofunc}}-{{$dato->gradofunc}} es un cargo que pertenece al Nivel Directivo de la Entidad, conforme lo establece el artículo 4º y 5º del Decreto ley 1011. <br><br>
        Que, los cargos que conllevan ejercicio de responsabilidad directiva tienen el carácter de empleos de gerencia publica y son de libre nombramiento y remoción conforme lo establece el Artículo 61 de la ley 1350 de 2009. <br><br>
        Que, el artículo 63 de la citada norma dispone: <br><br>
        ARTICULO 63 <strong>“PROCEDIMIENTO DE INGRESO A LOS EMPLEADOS DE NATURALEZA GERENCIAL”</strong><br><br>
        <div style="margin-left: 30px;text-align: justify;">
            1.	Sin perjuicio de los márgenes de discrecionalidad que caracteriza a estos empleos, la competencia profesional es el criterio que prevalecerá en el nombramiento de los empleados que ejerzan funciones gerenciales. <br><br>
            2.	Para la designación del empleado se tendrán en cuenta los criterios de mérito, capacidad y experiencia para el desempeño del empleo, y se podrá (…)  <br><br>
            <strong>Parágrafo:</strong> en todo caso, la decisión del nombramiento del empleado corresponderá a la autoridad nominadora. <br><br>
        </div>
        Que, con el fin de ser aprobada la prórroga de su nombramiento, por parte del Señor Registrador Nacional del Estado Civil, los Delegados Departamentales de la Delegación Departamental del {{$dato->nombredepartamento}}, mediante oficio N° DD-{{$dato->nombredepartamento}}-GTGAF-{{$dato->oficpostulacion}}  de fecha {{ \Carbon\Carbon::parse($dato->fechaoficiopostulacion)->locale('es')->isoFormat('LL') }}, enviaron la postulación de la hoja de vida del Doctor(a) <strong> {{strtoupper($dato->nombrefunc1)}}</strong>, identificada con la cedula de ciudadanía No. {{number_format($dato->cedulafuncionario, 0, ',', '.')}}, para desempeñar el cargo de {{strtoupper($dato->cargofunc)}} {{$dato->codigofunc}}-{{$dato->gradofunc}}, de la {{$dato->nombreoficina}}. <br><br>
        Que, los Delegados Departamentales de la Delegación del {{$dato->nombredepartamento}}, certifican que el Doctor(a) {{strtoupper($dato->nombrefunc1)}}, identificada con la cedula de ciudadanía No.{{number_format($dato->cedulafuncionario, 0, ',', '.')}}, cuenta con la idoneidad y experiencia requerida para desempeñar el cargo de {{ strtoupper($dato->cargofunc)}} {{$dato->codigofunc}}-{{$dato->gradofunc}}, dentro del marco del Articulo 63 de la ley 1350 de 2009. <br><br>
        Que, mediante comunicación de fecha {{ \Carbon\Carbon::parse($dato->fechaviavilidad)->locale('es')->isoFormat('LL') }}, del Despacho del Registrador Nacional del Estado Civil, se aprueba la prórroga del nombramiento del Doctor(a) <strong> {{strtoupper($dato->nombrefunc1)}}</strong>, identificada con la cedula de ciudadanía No. {{number_format($dato->cedulafuncionario, 0, ',', '.')}} para desempeñar el cargo de {{strtoupper($dato->cargofunc)}} {{$dato->codigofunc}}-{{$dato->gradofunc}}, de la {{strtoupper($dato->nombreoficina)}}, por el termino de tres (03) meses, a partir del {{ \Carbon\Carbon::parse($dato->fechainicial)->locale('es')->isoFormat('LL') }}, hasta {{ \Carbon\Carbon::parse($dato->fechaterminacion)->locale('es')->isoFormat('LL') }}, inclusive. <br><br>
        Que, por lo anteriormente expuesto,<br><br>
    </div>

    <div class="c"><strong>RESUELVEN:</strong></div><br>
    <div style="text-align: justify;">
       <strong>ARTICULO PRIMERO:</strong> Prorrogar el nombramiento en la Planta Global de la Delegación del {{$dato->nombredepartamento}}, establecida mediante el Decreto ley 1012 de 2000, al servidor(a) pública Doctor(a)<strong> {{strtoupper($dato->nombrefunc1)}}</strong>, identificada con la cedula de ciudadanía No. {{number_format($dato->cedulafuncionario, 0, ',', '.')}}, para desempeñar el cargo de {{strtoupper($dato->cargofunc)}} {{$dato->codigofunc}}-{{$dato->gradofunc}} de la {{$dato->nombreoficina}}, empleo de libre nombramiento y Remoción de la Entidad, con una asignación básica mensual de $ {{number_format($dato->sueldofunc, 0, ',', '.')}}, conforme a las consideraciones expuestas, sin perjuicio de la facultad discrecional para su remoción, a partir del {{ \Carbon\Carbon::parse($dato->fechainicial)->locale('es')->isoFormat('LL') }}, hasta {{ \Carbon\Carbon::parse($dato->fechaterminacion)->locale('es')->isoFormat('LL') }}, inclusive. <br><br>
       <strong>ARTICULO SEGUNDO:</strong> El nombramiento a que se refiere el artículo anterior finalizará al término del mismo, sin que para ello se requiera acto administrativo ni comunicación alguna, en todo caso podrá darse por terminado en cualquier momento. <br><br>
       <strong>ARTICULO TERCERO:</strong> De conformidad con los establecido en el numeral 9 del artículo 26 del Decreto 2241 de 1986 (Código electoral), el presente acto administrativo será remitido al Despacho del Registrador Nacional del Estado Civil para la aprobación respectiva. <br><br>
       <strong>ARTICULO CUARTO: </strong>De acuerdo a lo dispuesto por la ley 190 de 1995, en sus artículos 13,14 y 15 para tomar posesión del cargo, el nominado deberá presentar declaración juramentada de bienes y rentas. <br><br>
       <strong>ARTICULO QUINTO: </strong>El presente Acto Administrativo rige a partir de su expedición, siempre y cuando exista aprobación por parte del Nivel Central. <br><br>
    </div>
    <br>
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
