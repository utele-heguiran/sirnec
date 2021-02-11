    @extends('layouts.sirnec')
@section('guia') Portal de Servicios @endsection
@section('linkencabezado') @endsection

@section('titulo')
    <div class="row">
        <div class="col-12">
            <center>
                <h1>Portal de Gestion Institucional</h1>
                <h4>{{ Auth::user()->name }}</h4>
            </center>
        </div>
    </div>
@endsection

@section('contenido')
    <br>
    <center>
        <div class="row" >
            <div class="col-1"></div>

            <div class="dropdown col-2">
                <img src="{{ asset('images/2.png')}}" style="width:100%" class="dropdown-toggle" id="dropdownMenuOffset1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset1">
                  <a class="dropdown-item" href="usuarios">Usuarios</a>
                  <a class="dropdown-item" href="barrios">Barrios</a>
                  <a class="dropdown-item" href="oficinas">Oficinas </a>
                  <a class="dropdown-item" href="ubicaciones">Ubicaciones </a>
                  <a class="dropdown-item" href="titulosdeformacion">Tutulos de Formacion</a>
                  <a class="dropdown-item" href="scr">Carges de Archivos</a>
                </div>
            </div>
            <div class="dropdown col-2">
                <img src="{{ asset('images/10.png')}}" style="width:100%" class="dropdown-toggle" id="dropdownMenuOffset2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset2">
                  <a class="dropdown-item" href="raft">Raft-29/30</a>
                  <a class="dropdown-item" href="rechazos">Rechazos</a>
                  <a class="dropdown-item" href="devoluciones">Devoluciones</a>
                  <a class="dropdown-item" href="lotesregistrales">Lotes</a>
                  <a class="dropdown-item" href="posgrabacion">Posgrabacion</a>

                </div>
            </div>
            <div class="dropdown col-2">
                <img src="{{ asset('images/4.png')}}" style="width:100%" class="dropdown-toggle" id="dropdownMenuOffset3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset3">
                  <a class="dropdown-item" href="devolucionesacopio">Devoluciones</a>
                  <a class="dropdown-item" href="lotesacopio">Lotes</a>
                  <a class="dropdown-item" href="destruccionacopio">Destruccion de Material</a>
                  <a class="dropdown-item" href="stsacopio">Set Transfer Set</a>
                  <a class="dropdown-item" href="reprocesosacopio">Reprocesos</a>
                  <a class="dropdown-item" href="bitacora">Bitacora</a>
                  <a class="dropdown-item" href="produccion_envios">Produccion y Envios</a>
                  <a class="dropdown-item" href="produccion_espera">Produccion En Espera</a>
                </div>
            </div>
            <div class="dropdown col-2">
                <img src="{{ asset('images/13.png')}}" style="width:100%" class="dropdown-toggle" id="dropdownMenuOffset4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset4">
                  <a class="dropdown-item" href="despmaterial">Despacho Material</a>
                </div>
            </div>
            <div class="dropdown col-2">
                <img src="{{ asset('images/11.png')}}" style="width:100%" class="dropdown-toggle" id="dropdownMenuOffset5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset5">
                  <a class="dropdown-item" href="funcionarios">Funcionarios</a>
                  <a class="dropdown-item" href="contratos">Contratos</a>
                </div>
            </div>

            <div class="col-1"></div>
        </div>

        <div class="row" >
            <div class="col-5"></div>
            <div class="dropdown col-2">
                <img src="{{ asset('images/estadistica.png')}}" style="width:100%" class="dropdown-toggle" id="dropdownMenuOffset2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset2">
                  <a class="dropdown-item" href="informe">Informes</a>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
    </center>

@endsection


{{-- @section('scriptnecesario')
    <script type="text/javascript">
        Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
        })

    </script>
@endsection --}}
