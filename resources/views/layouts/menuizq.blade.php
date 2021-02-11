<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <center>
        <a href="#" class="brand-link"><img src="{{ asset('images/logo-dark.png')}}" alt="SIRNEC" class="responsive-img" style="width: 6em;"></a>
    </center>
    
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if(Auth::user()->path == '')
                <div class="image"><img src="{{ asset('images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"></div>
            @else
                <div><img src="/storage/{{ Auth::user()->path }}" class="img-circle elevation-2" alt="Imagen del Usuario"></div>
            @endif

            <div class="info"><a href="#" class="d-block" style="font-size: 80%">{{ Auth::user()->name }}</a></div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Administracion<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('usuarios')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('barrios')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Barrios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('oficinas')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Oficinas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ubicaciones')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ubicaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('titulosdeformacion')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Titulos de Formacion</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('scr')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cargue Archivos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon far fa-building"></i>
                        <p>Oficinas Registrales<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('raft')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RAFT 29 / 30</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rechazos')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rechazos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('devoluciones')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Devoluciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lotesregistrales')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lotes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posgrabacion')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Posgrabacion</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fab fa-accusoft"></i>
                        <p>Centro de Acopio<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('devolucionesacopio')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Devoluciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lotesacopio')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lotes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('destruccionacopio')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Destrucion Material</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('stsacopio')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Set Tranfer Set</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reprocesosacopio')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reprocesos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bitacora')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bitacora</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produccion_envios')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produccion y Envio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produccion_espera')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produccion en Espera</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-truck-loading "></i>
                        <p>Almacen<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('despmaterial')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Despacho de Material</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-street-view"></i>
                        <p>Talento Humano<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('funcionarios')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Funcionarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contratos')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contratos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('informe')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Estadistica<span class="right badge badge-danger">New</span></p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>