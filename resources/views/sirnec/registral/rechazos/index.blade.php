@extends('layouts.sirnec')
@section('guia') Rechazos @endsection
@section('linkencabezado') @endsection


    @section('titulo') 

        @if (count($data) > 0)
            @foreach($data as $row)@endforeach
            LISTADO DE RECHAZOS || " {{  $row->nombremunicipio }} " ||
        @else
            LISTADO DE RECHAZOS     
        @endif
        <a href="{{ route('home')}}"><img class="img-responsiveid float-right" style="width: 3.1%; height: 3.1%; margin-right: 8px; margin-top: -7px" src="{{ asset('images/home1.png')}}" title="Home" /></a>
    @endsection

    @section('contenido')
        <div class="row card-body">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="tabla" class="table table-hover text-center" data-toggle="dataTable" data-form="formulario" style="width:100%" >
                        <thead>
                            <tr>
                                <th>No. Identificacion</th>
                                <th>No. Preparacion</th>
                                <th>Nombre</th>
                                <th>Tramite</th>
                                <th>Codigo</th>
                                <th>Fecha Rechazo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr style="font-size: 14px;">
                                    <td> {{ $row->numdocumento }} </td>
                                    <td> {{ $row->numpreparacion }} </td>                              
                                    <td> {{ $row->name }} </td>                              
                                    <td> {{ $row->nombretramite }} </td>
                                    <td> {{ $row->codigosrechazo_id  }} </td>
                                    <td> {{ $row->fecrechazo }} </td>
                                    <td>
                                        <a href="{{ route('rechazo_editar', ['id' => $row->id ]) }}" title="Hacer Seguimiento"><span style="color: #007BFF;"><i class="fas fa-user-check" ></i></span></a> 
                                    </td>    
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>   
        </div> 
    @endsection

@section('scriptnecesario')
    <script>
        $(document).ready(function(){

           
        });

    </script>   
@endsection
