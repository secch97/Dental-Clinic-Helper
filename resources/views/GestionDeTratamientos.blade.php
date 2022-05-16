@extends('layouts.backend.app')

@section('title', 'Administración')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">

@endpush

@section('content')
<div class="container-fluid">
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('/assets/frontend/images/Perfil/dentista.png') }}" width="55" height="55"
                    alt="Profile Image" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                    style="font-family:Arial; font-size:13.5px;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                    {{Auth::User()->nombre}}</div>
                @if(Auth::User()->Role_id==1)
                <div class="email"
                    style="font-family:Arial; font-size:12px;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                    Administrador</div>
                @else
                <div class="email"
                    style="font-family:Arial; font-size:12px;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
                    Usuario</div>
                @endif
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right" style="margin-top: -3px;width: 200px;">
                        <li><a style="font-family:Candara; font-size:13px;" href="{{ route('Cambio_Contraseña')}}"><i
                                    class="material-icons">lock</i>Cambiar Contraseña</a></li>
                        <li><a style="font-family:Candara; font-size:13px;" href="{{ route('Principal')}}"><i
                                    class="material-icons">home</i>Página principal</a></li>
                        <li><a style="font-family:Candara; font-size:13px;" href="{{ route('logout') }}"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form><i class="material-icons">exit_to_app</i>Cerrar Sesión
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header" style="font-family:Candara; font-size:13px;">MENÚ DE NAVEGACIÓN</li>
                <li>
                    <a style="font-family:Candara; font-size:15px;" href="{{route('Administrador')}}">
                        <i class="material-icons">home</i>
                        <span style="font-family:Candara; font-size:13px;">Inicio</span>
                    </a>
                </li>
                <li>
                    <a style="font-family:Candara; font-size:15px;" href="{{route('GestionDeUsuarios')}}">
                        <i class="material-icons">person</i>
                        <span style="font-family:Candara; font-size:13px;">Gestión de Usuarios</span>
                    </a>
                </li>
                <li>
                    <a style="font-family:Candara; font-size:15px;" href="{{route('GestionDePacientes')}}">
                        <i class="material-icons">assignment_ind</i>
                        <span style="font-family:Candara; font-size:13px;">Gestión de Pacientes</span>
                    </a>
                </li>

                <li>
                    <a style="font-family:Candara; font-size:15px;" href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span style="font-family:Candara; font-size:13px;">Gestión de Tratamientos</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a style="font-family:Candara; font-size:13px;"
                                href="{{route('GestionDeTratamientos')}}">Tratamientos de la clínica</a>
                        </li>
                        <li>
                            <a style="font-family:Candara; font-size:13px;"
                                href="{{route('AsignarTratamientos')}}">Asignación de Tratamientos</a>
                        </li>
                        <li>
                            <a style="font-family:Candara; font-size:13px;" href="{{route('HistorialDeTratamientos')}}">Historial de Tratamientos</a>
                        </li> 
                    </ul>
                </li>

                
                <li>
                    <a style="font-family:Candara; font-size:15px;" href="{{route('GestionDeCitas')}}">
                        <i class="material-icons">today</i>
                        <span style="font-family:Candara; font-size:13px;">Gestión de Citas</span>
                    </a>
                </li>

                
                <li>
                    <a style="font-family:Candara; font-size:15px;" href="{{route('GestionDeReservaCitas')}}">
                        <i class="material-icons">notifications</i>
                        <span style="font-family:Candara; font-size:13px;">Gestión de Citas Reservadas</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div style="font-family:Candara; font-size:10px;" class="copyright">
                &copy; 2019 <a href="javascript:void(0);">SISTEMA DE GESTIÓN DENTAL</a>.
            </div>
            <div style="font-family:Candara; font-size:10px;" class="version">
                <b>Versión: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <style>
        .dataTableParentHidden {
            overflow: hidden;
            height: 0px;
            width: 100%;
        }

    </style>
    <style>
        select:invalid {
            height: 0px !important;
            opacity: 0 !important;
            position: absolute !important;
            display: flex !important;
        }

        select:invalid[multiple] {
            margin-top: 15px !important;
        }

    </style>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="font-family:Candara; font-size:25px; text-align:center;"> TRATAMIENTOS DE LA CLINICA </h2>
                </div>
                <div class="body">
                    <div id="dataTableWrapper" style="width:100%" class="dataTableParentHidden">
                        <div class="table-responsive">
                            <table id="tablaTratamientos"
                                class="table table-bordered table-striped table-hover js-basic-example dataTable text-center"
                                cellspacing="0" width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">ID</th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Nombre
                                            del Tratamiento</th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Costo del
                                            Tratamiento ($)</th>
                                        <th class="text-center" style="padding:15px;">
                                            <a href="#" class="create-modal btn btn-primary btn-sm">
                                                <i class="fa fa-plus-square"></i>
                                                &nbsp Registrar Tratamiento
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Crear Tratamiento --}}
<div id="modalcreartratamiento" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document"
        style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) !important;">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-family:Candara; font-size:20px;">REGISTRO DE TRATAMIENTO</h4>
                <hr>
            </div>
            <div class="modal-body">

                <form autocomplete="off" method="post" id="formregistro" action="{{route('Añadir_Tratamiento')}}">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label" for="nombre" style="font-family:Arial; font-size:15px;">Nombre
                            del Tratamiento:</label>
                        <input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+" title="Ingrese unicamente letras" type="text"
                            class="form-control" id="nombre" name="nombre"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese el nombre completo del paciente" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="usuario" style="font-family:Arial; font-size:15px;">Costo del
                            Tratamiento ($):</label>
                        <input type="number" step="0.01" min="0.00" max="10000.00" oninput="validity.valid||(value='');"
                            class="form-control" id="costo" name="costo"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese la edad del paciente" required>
                    </div>
            </div>
            <hr>
            <div class="modal-footer">
                <input type="hidden" name="button_action" id="button_action" value="registrar" />
                <button class="btn btn-info" type="submit" id="registrar" style="font-family:Candara; font-size:15px;"
                    value="registrar">
                    <i class="fa fa-plus-square"></i>
                    Registrar Tratamiento
                </button>
                <button class="btn btn-info" type="button" data-dismiss="modal"
                    style="font-family:Candara; font-size:15px;">
                    <i class="fa fa-times"></i>
                    Cerrar
                </button>
            </div>

            </form>
        </div>
    </div>
</div>

{{-- Modal Mostrar Tratamiento --}}
<div id="modalmostrartratamiento" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document"
        style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) !important;">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-family:Candara; font-size:20px;">INFORMACIÓN DEL TRATAMIENTO
                </h4>
                <hr>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label class="col-form-label" for="nombre" style="font-family:Arial; font-size:15px;">Nombre
                        del Tratamiento:</label>
                    <input readonly pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+" title="Ingrese unicamente letras" type="text"
                        class="form-control" id="nombre" name="nombre"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                        placeholder="Ingrese el nombre completo del paciente" required>
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="usuario" style="font-family:Arial; font-size:15px;">Costo del
                        Tratamiento ($):</label>
                    <input readonly type="number" step="0.01" min="0.00" max="10000.00"
                        oninput="validity.valid||(value='');" class="form-control" id="costo" name="costo"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                        placeholder="Ingrese la edad del paciente" required>
                </div>
            </div>
            <hr>
            <div class="modal-footer">
                <input type="hidden" name="button_action" id="button_action" value="registrar" />
                <button class="btn btn-info" type="button" data-dismiss="modal"
                    style="font-family:Candara; font-size:15px;">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>

        </div>
    </div>
</div>

{{-- Modal Editar Tratamiento --}}
<div id="modaleditartratamiento" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document"
        style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) !important;">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-family:Candara; font-size:20px;">ACTUALIZACIÓN DE TRATAMIENTO</h4>
                <hr>
            </div>
            <div class="modal-body">

                <form autocomplete="off" method="post" id="formeditar" action="{{route('Editar_Tratamiento')}}">
                    @csrf

                    <div class="form-group">
                        <label class="col-form-label" for="nombre" style="font-family:Arial; font-size:15px;">Nombre
                            del Tratamiento:</label>
                        <input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+" title="Ingrese unicamente letras" type="text"
                            class="form-control" id="nombre" name="nombre"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese el nombre completo del paciente" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="usuario" style="font-family:Arial; font-size:15px;">Costo del
                            Tratamiento ($):</label>
                        <input type="number" step="0.01" min="0.00" max="10000.00" oninput="validity.valid||(value='');"
                            class="form-control" id="costo" name="costo"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese la edad del paciente" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id">
                    </div>
            </div>
            <hr>
            <div class="modal-footer">
                <input type="hidden" name="button_action" id="button_action" value="registrar" />
                <button class="btn btn-info" type="submit" id="registrar" style="font-family:Candara; font-size:15px;"
                    value="registrar">
                    <i class="fa fa-pencil"></i> Actualizar Tratamiento
                </button>
                <button class="btn btn-info" type="button" data-dismiss="modal"
                    style="font-family:Candara; font-size:15px;">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>

            </form>
        </div>
    </div>
</div>


@endsection


@push('js')

@endpush
