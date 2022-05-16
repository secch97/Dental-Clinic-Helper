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
                            <a style="font-family:Candara; font-size:13px;"
                                href="{{route('HistorialDeTratamientos')}}">Historial de Tratamientos</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a style="font-family:Candara; font-size:15px;" href="{{route('GestionDeCitas')}}">
                        <i class="material-icons">today</i>
                        <span style="font-family:Candara; font-size:13px;">Gestión de Citas</span>
                    </a>
                </li>

                <li class="active">
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

    <div class="block-header">
        <h2 style="font-family:Candara; font-size:25px; text-align:center;"> ESTADISTICAS DE RESERVACIÓN DE CITAS DE LA
            CLINICA DENTAL
        </h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">announcement</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL DE CITAS RESERVADAS PENDIENTES</div>
                    <div class="number count-to" data-from="0" data-to="{{$citasPendientes}}" data-speed="500"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">assignment_turned_in</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL DE CITAS RESERVADAS COMPLETADAS</div>
                    <div class="number count-to" data-from="0" data-to="{{$citasCompletadas}}" data-speed="500"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">grid_off</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL DE CITAS RESERVADAS CANCELADAS</div>
                    <div class="number count-to" data-from="0" data-to="{{$citasCanceladas}}" data-speed="500"
                        data-fresh-interval="20">
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="font-family:Candara; font-size:25px; text-align:center;"> GESTIÓN DE RESERVACIÓN DE CITAS
                        DE LA CLÍNICA
                    </h2>
                </div>
                <div class="body">
                    <div id="dataTableWrapper" style="width:100%" class="dataTableParentHidden">
                        <div class="table-responsive">
                            <table id="tablaReservaCitas"
                                class="table table-bordered table-striped table-hover js-basic-example dataTable text-center"
                                cellspacing="0" style="font-size:13px;width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Fecha de la
                                            cita:</th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Hora de la
                                            cita:
                                        </th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Solicitada
                                            por:</th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Télefono:
                                        </th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Dirección:
                                        </th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Razón de la
                                            cita:</th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Estado</th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Acción</th>
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


{{-- Modal Mostrar paciente de la cita --}}
<div id="modalmostrarpacientereservacita" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document"
        style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) !important;">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-family:Candara; font-size:20px;">INFORMACIÓN DEL SOLICITANTE
                </h4>
                <hr>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                <h3 class="modal-title" style="font-family:Candara; font-size:20px;text-align:center;">DATOS DEL
                    SOLICITANTE</h3>
                <br>
                <div class="form-group">
                    <label class="col-form-label" for="nombre" style="font-family:Arial; font-size:15px;">Nombre
                        Completo:</label>
                    <input readonly disabled pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+" title="Ingrese unicamente letras"
                        type="text" class="form-control" id="nombre" name="nombre"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                        placeholder="Ingrese el nombre completo del solicitante" required>
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="usuario"
                        style="font-family:Arial; font-size:15px;">Usuario:</label>
                    <input readonly disabled type="text" class="form-control" id="usuario" name="usuario"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                        placeholder="Ingrese el usuario" required>
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="correo" style="font-family:Arial; font-size:15px;">Correo
                        Electrónico:</label>
                    <input readonly disabled type="text" class="form-control" id="correo" name="correo"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                        placeholder="Ingrese el correo" required>
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="telefono"
                        style="font-family:Arial; font-size:15px;">Télefono:</label>
                    <input readonly disabled type="text" class="form-control" id="telefono" name="telefono"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                        placeholder="Ingrese el télefono" required>
                </div>


                <div class="form-group">
                    <label class="col-form-label" for="direccion"
                        style="font-family:Arial; font-size:15px;">Dirección:</label>
                    <input readonly disabled type="text" class="form-control" id="direccion" name="direccion"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                        placeholder="Ingrese el dirección" required>
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

{{-- Modal Mostrar paciente de la cita --}}
<div id="modalmostrarservacitadatos" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document"
        style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) !important;">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-family:Candara; font-size:20px;">INFORMACIÓN DE LA CITA SOLICITADA
                </h4>
                <hr>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                <h3 class="modal-title" style="font-family:Candara; font-size:20px;text-align:center;">DATOS DE LA CITA</h3>
                <br>
                <div class="form-group">
                    <label class="col-form-label" for="fecha" style="font-family:Arial; font-size:15px;">Fecha de la
                        cita:</label>
                    <input type="date" id="fecha" name="fecha" class="form-control"
                        min="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px" required>
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="hora" style="font-family:Arial; font-size:15px;">Hora de la
                        cita:</label>
                    <select class="js-example-basic-single" name="hora" id="hora"
                        style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px;width:100%;"
                        required>
                        <option selected disabled value="">Escoja un horario:</option>
                        <option value="8:00 A.M a 10:00 A.M">8:00 A.M a 10:00 A.M
                        </option>
                        <option value="10:00 A.M a 12:00 M.D">10:00 A.M a 12:00 M.D
                        </option>
                        <option value="01:00 P.M a  03:00 P.M">01:00 P.M a 03:00 P.M
                        </option>
                        <option value="03:00 P.M a 05:00 P.M">03:00 P.M a 05:00 P.M
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-form-label" for="descripcionCita" style="font-family:Arial; font-size:15px;">Razón de la
                        cita:</label>
                    <textarea maxlength="1000" id="descripcionCita" name="descripcionCita" rows="3" cols="66"
                        style="display:block; border: 1px solid #AED6F1;border-radius:5px; overflow: auto;font-family:Arial; font-size:15px;"
                        placeholder="Ingrese la descripción del tratamiento" required></textarea>
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


{{-- Modal Editar cita --}}
<div id="modaleditarreservacita" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document"
        style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) !important;">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-family:Candara; font-size:20px;">INFORMACIÓN DE LA CITA
                </h4>
                <hr>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                <form autocomplete="off" method="post" id="formregistro" action="{{route('EditarReservaCita')}}">
                    @csrf
                    <input type="hidden" id="reservaid" name="reservaid">
                    <div class="form-group">
                        <label class="col-form-label" for="estadoCita" style="font-family:Arial; font-size:15px;">Estado
                            de
                            la
                            cita:</label>
                        <br>
                        <select class="js-example-basic-single" name="estadoCita" id="estadoCita"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px;width:100%;"
                            required>
                            <option selected disabled value="">Seleccionar una opción</option>
                            <option value=1>Pendiente</option>
                            <option value=2>Confirmada</option>
                            <option value=3>Completada</option>
                            <option value=4>Cancelada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="fecha" style="font-family:Arial; font-size:15px;">Fecha de la
                            cita:</label>
                        <input type="date" id="fecha" name="fecha" class="form-control"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="hora" style="font-family:Arial; font-size:15px;">Hora de la
                            cita:</label>
                        <select class="js-example-basic-single" name="hora" id="hora"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px;width:100%;"
                            required>
                            <option selected disabled value="">Escoja un horario:</option>
                            <option value="8:00 A.M a 10:00 A.M">8:00 A.M a 10:00 A.M
                            </option>
                            <option value="10:00 A.M a 12:00 M.D">10:00 A.M a 12:00 M.D
                            </option>
                            <option value="01:00 P.M a  03:00 P.M">01:00 P.M a 03:00 P.M
                            </option>
                            <option value="03:00 P.M a 05:00 P.M">03:00 P.M a 05:00 P.M
                            </option>
                        </select>
                    </div>
            </div>
            <hr>
            <div class="modal-footer">
                <input type="hidden" name="button_action" id="button_action" value="registrar" />
                <button class="btn btn-info" type="submit" id="registrar" style="font-family:Candara; font-size:15px;"
                    value="registrar">
                    <i class="fa fa-pencil"></i>
                    Actualizar Cita
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
