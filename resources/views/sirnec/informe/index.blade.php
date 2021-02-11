@extends('layouts.sirnec')
@section('guia') Informes @endsection
@section('linkencabezado') @endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/jvectormap/jquery-jvectormap-2.0.5.css') }}"  type="text/css">
@endsection

@section('titulo')
    @foreach($data as $row)@endforeach
    INFORMES DE GESTION - DELEGACION  {{ $row->name }}

    <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    {{-- <a href="" data-toggle="modal" data-target="#reporteraft11"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/reportes.png')}}" title="Generar RAFT - 11" /></a> --}}
@endsection

@section('contenido')
    <br>
    <div class="row">
        <div class="col-md-6">
            <center>
                <div id="my-map" style="width: 450px; height: 400px; "></div>
            </center>
        </div>
        <div class="col-md-6">
            <center>
                <div class=" col-10 list-group">
                    <a style="margin-top: 5px;text-align: left" href="#" class="list-group-item alert alert-info" role="alert" data-toggle="modal" data-target="#informeraft30"><li>Consolidado de Gestion RAFT-30</li></a>
                    <a style="margin-top: 5px;text-align: left" href="#" class="list-group-item alert alert-info" role="alert" data-toggle="modal" data-target="#informerechazos"><li>Ranking de Rechazos</li></a>
                    <a style="margin-top: 5px;text-align: left" href="#" class="list-group-item alert alert-info" role="alert" data-toggle="modal" data-target="#informedevoluciones"><li>Ranking de Devoluciones</li></a>
                    <a style="margin-top: 5px;text-align: left" href="#" class="list-group-item alert alert-info" role="alert" data-toggle="modal" data-target="#rasra14pdf"><li>Bateria de Indicadores RAS RA-14 Rechazos</li></a>
                    <a style="margin-top: 5px;text-align: left" href="#" class="list-group-item alert alert-info" role="alert" data-toggle="modal" data-target="#rasra13pdf"><li>Bateria de Indicadores RAS RA-13 Devoluciones</li></a>
                </div>
            </center>
        </div>
    </div>
    @foreach ($resulprod as $item)
        {!! Form::number($item['id'] , $item['cantidad'], ['id'=>$item['id'], 'hidden'] ) !!}
    @endforeach



    {{-- modal consolidado informe raft30 --}}
    <div class="modal fade bd-example-modal-lg" name='informeraft30' id="informeraft30" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Consolidado de Gestion RAFT-30</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'informe_raft30pdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <center>
                                    <strong>Fecha Inicial</strong>
                                    {!! Form::date('fechainicial', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
                                </center>
                            </div>
                            <div class="col-md-3">
                                <center>
                                    <strong>Fecha Final</strong>
                                    {!! Form::date('fechafinal', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
                                </center>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <a class="btn btn-info" href="{{ route('informe')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                            <button type="submit" class="btn btn-info">Generar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- fin modal informe raft30  --}}


    {{-- modal consolidado ranking de rechazos --}}
    <div class="modal fade bd-example-modal-lg" name='informerechazos' id="informerechazos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Ranking de Rechazos</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'informe_rechazospdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <center>
                                    <strong>Fecha Inicial</strong>
                                    {!! Form::date('fechainicial', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
                                </center>
                            </div>
                            <div class="col-md-3">
                                <center>
                                    <strong>Fecha Final</strong>
                                    {!! Form::date('fechafinal', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
                                </center>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <a class="btn btn-info" href="{{ route('informe')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                            <button type="submit" class="btn btn-info">Generar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- fin modal informe ranking de rechazos  --}}

    {{-- modal consolidado ranking de devoluciones --}}
    <div class="modal fade bd-example-modal-lg" name='informedevoluciones' id="informedevoluciones" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Ranking de Devoluciones</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'informe_devolucionespdf', 'method'=>'POST', 'autocomplete'=> 'off']) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <center>
                                    <strong>Fecha Inicial</strong>
                                    {!! Form::date('fechainicial', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
                                </center>
                            </div>
                            <div class="col-md-3">
                                <center>
                                    <strong>Fecha Final</strong>
                                    {!! Form::date('fechafinal', \Carbon\Carbon::now(), ['class'=>'form-control form-control-sm', 'required'=>'required']) !!}
                                </center>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <a class="btn btn-info" href="{{ route('informe')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                            <button type="submit" class="btn btn-info">Generar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- fin modal informe ranking de Devoluciones  --}}

    {{-- modal consolidado rasra14 de rechazos --}}
    <div class="modal fade bd-example-modal-lg" name='rasra14pdf' id="rasra14pdf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Bateria de Indicadores RASRA14 "Rechazos"</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::model($dataanalisisrasra14, ['route' => ['informe_rasra14pdf', $dataanalisisrasra14[0]->id], 'method' => 'PUT']) !!}
                    <div class="modal-body">

                        {!!Form::number('id', $dataanalisisrasra14[0]->id, ['hidden'])!!}

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">

                                <div class="accordion" id="accordionExample">

                                    <div class="card ">
                                        <div class="card-header" style="background:#F6F8FB" id="headingOne">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                                Analisis y Accion de Mejora - "Primer Trimestre"
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">

                                                @if (empty($dataanalisisrasra14[0]->analisis1trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea class="form-control" name="analisis1trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="analisis1trimestre" aria-label="With textarea" >{{ $dataanalisisrasra14[0]->analisis1trimestre }}</textarea>
                                                    </div>
                                                @endif
                                                <br>
                                                @if (empty($dataanalisisrasra14[0]->accionmejora1trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea class="form-control" name="accionmejora1trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="accionmejora1trimestre" aria-label="With textarea" >{{ $dataanalisisrasra14[0]->accionmejora1trimestre }}</textarea>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card ">
                                        <div class="card-header" style="background:#F6F8FB" id="headingTwo">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                                Analisis y Accion de Mejora - "Segundo Trimestre"
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">

                                                @if (empty($dataanalisisrasra14[0]->analisis2trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea class="form-control" name="analisis2trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="analisis2trimestre" aria-label="With textarea" >{{ $dataanalisisrasra14[0]->analisis2trimestre }}</textarea>
                                                    </div>
                                                @endif
                                                <br>
                                                @if (empty($dataanalisisrasra14[0]->accionmejora2trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea class="form-control" name="accionmejora2trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="accionmejora2trimestre" aria-label="With textarea" >{{ $dataanalisisrasra14[0]->accionmejora2trimestre }}</textarea>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card ">
                                        <div class="card-header" style="background:#F6F8FB" id="headingTree">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                                Analisis y Accion de Mejora - "Tercer Trimestre"
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapseTree" class="collapse" aria-labelledby="headingTree" data-parent="#accordionExample">
                                            <div class="card-body">

                                                @if (empty($dataanalisisrasra14[0]->analisis3trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                           <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea class="form-control" name="analisis3trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="analisis3trimestre" aria-label="With textarea" >{{ $dataanalisisrasra14[0]->analisis3trimestre }}</textarea>
                                                    </div>
                                                @endif
                                                <br>
                                                @if (empty($dataanalisisrasra14[0]->accionmejora3trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea class="form-control" name="accionmejora3trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="accionmejora3trimestre" aria-label="With textarea" >{{ $dataanalisisrasra14[0]->accionmejora3trimestre }}</textarea>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card ">
                                        <div class="card-header" style="background:#F6F8FB" id="headingFour">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                                Analisis y Accion de Mejora - "Cuarto Trimestre"
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                            <div class="card-body">

                                                @if (empty($dataanalisisrasra14[0]->analisis4trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                           <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea class="form-control" name="analisis4trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="analisis4trimestre" aria-label="With textarea" >{{ $dataanalisisrasra14[0]->analisis4trimestre }}</textarea>
                                                    </div>
                                                @endif
                                                <br>
                                                @if (empty($dataanalisisrasra14[0]->accionmejora4trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea class="form-control" name="accionmejora4trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="accionmejora4trimestre" aria-label="With textarea" >{{ $dataanalisisrasra14[0]->accionmejora4trimestre }}</textarea>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="modal-footer">
                                    <center>
                                        <a class="btn btn-info" href="{{ route('informe')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                        <button type="submit" class="btn btn-info">Generar</button>
                                    </center>
                                </div>
                            </div>

                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- fin modal informe rasra14 de rechazos  --}}

    {{-- modal consolidado rasra13 de rechazos --}}
    <div class="modal fade bd-example-modal-lg" name='rasra13pdf' id="rasra13pdf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #006400;text-shadow: 4px 4px 4px rgb(99, 98, 98);">Bateria de Indicadores RASRA13 "Devoluciones"</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::model($dataanalisisrasra13, ['route' => ['informe_rasra13pdf', $dataanalisisrasra13[0]->id], 'method' => 'PUT']) !!}
                    <div class="modal-body">

                        {!!Form::number('id', $dataanalisisrasra13[0]->id, ['hidden'])!!}

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">

                                <div class="accordion" id="accordionExample2">

                                    <div class="card ">
                                        <div class="card-header" style="background:#F6F8FB" id="headingCuatro">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseCuatro" aria-expanded="false" aria-controls="collapseCuatro" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                                Analisis y Accion de Mejora - "Primer Trimestre"
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapseCuatro" class="collapse" aria-labelledby="headingCuatro" data-parent="#accordionExample2">
                                            <div class="card-body">

                                                @if (empty($dataanalisisrasra13[0]->analisis1trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea class="form-control" name="analisis1trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="analisis1trimestre" aria-label="With textarea" >{{ $dataanalisisrasra13[0]->analisis1trimestre }}</textarea>
                                                    </div>
                                                @endif
                                                <br>
                                                @if (empty($dataanalisisrasra13[0]->accionmejora1trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea class="form-control" name="accionmejora1trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="accionmejora1trimestre" aria-label="With textarea" >{{ $dataanalisisrasra13[0]->accionmejora1trimestre }}</textarea>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card ">
                                        <div class="card-header" style="background:#F6F8FB" id="headingCinco">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseCinco" aria-expanded="false" aria-controls="collapseCinco" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                                Analisis y Accion de Mejora - "Segundo Trimestre"
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapseCinco" class="collapse" aria-labelledby="headingCinco" data-parent="#accordionExample2">
                                            <div class="card-body">

                                                @if (empty($dataanalisisrasra13[0]->analisis2trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea class="form-control" name="analisis2trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="analisis2trimestre" aria-label="With textarea" >{{ $dataanalisisrasra13[0]->analisis2trimestre }}</textarea>
                                                    </div>
                                                @endif
                                                <br>
                                                @if (empty($dataanalisisrasra13[0]->accionmejora2trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea class="form-control" name="accionmejora2trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="accionmejora2trimestre" aria-label="With textarea" >{{ $dataanalisisrasra13[0]->accionmejora2trimestre }}</textarea>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card ">
                                        <div class="card-header" style="background:#F6F8FB" id="headingSeis">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseSeis" aria-expanded="false" aria-controls="collapseSeis" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                                Analisis y Accion de Mejora - "Tercer Trimestre"
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapseSeis" class="collapse" aria-labelledby="headingSeis" data-parent="#accordionExample2">
                                            <div class="card-body">

                                                @if (empty($dataanalisisrasra13[0]->analisis3trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea class="form-control" name="analisis3trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="analisis3trimestre" aria-label="With textarea" >{{ $dataanalisisrasra13[0]->analisis3trimestre }}</textarea>
                                                    </div>
                                                @endif
                                                <br>
                                                @if (empty($dataanalisisrasra13[0]->accionmejora3trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea class="form-control" name="accionmejora3trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="accionmejora3trimestre" aria-label="With textarea" >{{ $dataanalisisrasra13[0]->accionmejora3trimestre }}</textarea>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card ">
                                        <div class="card-header" style="background:#F6F8FB" id="headingSiete">
                                            <h2 class="mb-0">
                                            <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseSiete" aria-expanded="false" aria-controls="collapseSiete" style="font-family: footlight MT Light, gabriola,Lucida Calligraphy; color: #DC3545;text-shadow: 1px 1px 1px rgb(99, 98, 98); font-size: 18px;">
                                                Analisis y Accion de Mejora - "Cuarto Trimestre"
                                            </button>
                                            </h2>
                                        </div>

                                        <div id="collapseSiete" class="collapse" aria-labelledby="headingSiete" data-parent="#accordionExample2">
                                            <div class="card-body">

                                                @if (empty($dataanalisisrasra13[0]->analisis4trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea class="form-control" name="analisis4trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Analisis</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="analisis4trimestre" aria-label="With textarea" >{{ $dataanalisisrasra13[0]->analisis4trimestre }}</textarea>
                                                    </div>
                                                @endif
                                                <br>
                                                @if (empty($dataanalisisrasra13[0]->accionmejora4trimestre))
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea class="form-control" name="accionmejora4trimestre" aria-label="With textarea"></textarea>
                                                    </div>
                                                @else
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Accion de Mejora</span>
                                                        </div>
                                                        <textarea disabled class="form-control" name="accionmejora4trimestre" aria-label="With textarea" >{{ $dataanalisisrasra13[0]->accionmejora4trimestre }}</textarea>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="modal-footer">
                                    <center>
                                        <a class="btn btn-info" href="{{ route('informe')}}" style="text-decoration:none;color:#FFFFFF" >Cerrar</a>
                                        <button type="submit" class="btn btn-info">Generar</button>
                                    </center>
                                </div>
                            </div>

                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- fin modal informe rasra13 de rechazos  --}}

@endsection


@section('scriptsplugins')
    <script type="text/javascript" src="{{ asset('assets/jvectormap/jquery.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/jvectormap/jquery-jvectormap-2.0.5.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/jvectormap/jquery-jvectormap-co-mill.js') }}"></script>
@endsection

@section('scriptnecesario')
    <script>

        $(document).ready(function(){

            //pone dentro de la ventana modal el focus en el input
            $('#informeraft30').on('shown.bs.modal', function () {
                $('#fechainicial').focus();
            });

        });

        var data = {
            "CO-VAC":document.getElementById(31).value,
            "CO-BOY":document.getElementById(5).value,
            "CO-COR":document.getElementById(12).value,
            "CO-HUI":document.getElementById(19).value,
            "CO-VAU":document.getElementById(68).value,
            "CO-NSA":document.getElementById(25).value,
            "CO-RIS":document.getElementById(24).value,
            "CO-VID":document.getElementById(72).value,
            "CO-BOL":document.getElementById(16).value,
            "CO-CUN":document.getElementById(17).value,
            "CO-GUV":document.getElementById(54).value,
            "CO-CAU":document.getElementById(46).value,
            "CO-CAS":document.getElementById(44).value,
            "CO-CAQ":document.getElementById(9).value,
            "CO-CES":document.getElementById(11).value,
            "CO-SAN":document.getElementById(27).value,
            "CO-ATL":document.getElementById(3).value,
            "CO-AMA":document.getElementById(60).value,
            "CO-MET":document.getElementById(52).value,
            "CO-MAG":document.getElementById(21).value,
            "CO-ARA":document.getElementById(40).value,
            "CO-GUA":document.getElementById(50).value,
            "CO-SAP":document.getElementById(56).value,
            "CO-CAL":document.getElementById(7).value,
            "CO-QUI":document.getElementById(26).value,
            "CO-LAG":document.getElementById(48).value,
            "CO-TOL":document.getElementById(29).value,
            "CO-SUC":document.getElementById(28).value,
            "CO-PUT":document.getElementById(64).value,
            "CO-NAR":document.getElementById(23).value,
            "CO-CHO":document.getElementById(13).value,
            "CO-DC":document.getElementById(15).value,
            "CO-ANT":document.getElementById(1).value,
        };

        $('#my-map').vectorMap({
            map: 'co_mill', // el mapa del mundo
            // series: {
            //     regions: [{
            //     values: data, // los valores
            //     //scale: ['#55FF55', '#555555'], // el rango de colores
            //     normalizeFunction: 'polynomial' // la formula de normalizacion de datos
            //     }]
            // },
            onRegionTipShow: function(e, el, code){ // al seleccionar una region se muestra el valor que tengan en el array
                el.html(el.html()+' (Produccion: '+data[code]+')');
            }
        });

    </script>
@endsection



