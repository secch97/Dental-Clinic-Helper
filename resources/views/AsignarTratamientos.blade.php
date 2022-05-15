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

                <li class="active">
                    <a style="font-family:Candara; font-size:15px;" href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span style="font-family:Candara; font-size:13px;">Gestión de Tratamientos</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a style="font-family:Candara; font-size:13px;"
                                href="{{route('GestionDeTratamientos')}}">Tratamientos de la clínica</a>
                        </li>
                        <li class="active">
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
                    <h2 style="font-family:Candara; font-size:25px; text-align:center;"> LISTA DE PACIENTES DE LA
                        CLÍNICA </h2>
                </div>
                <div class="body">
                    <div id="dataTableWrapper" style="width:100%" class="dataTableParentHidden">
                        <div class="table-responsive">
                            <table id="tablaListaPacientes"
                                class="table table-bordered table-striped table-hover js-basic-example dataTable text-center"
                                cellspacing="0" width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Nombre
                                            Completo</th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Télefono
                                            Fijo</th>
                                        <th style="font-family:Candara; font-size:15px;" class="text-center">Télefono
                                            Móvil</th>
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

{{-- Modal Asignar Prestamo --}}
<div id="modalcrearplandetratamiento" class="modal fade" role="dialog" style="overflow-y:auto;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-family:Candara; font-size:20px;">ASIGNACIÓN DE TRATAMIENTOS</h4>
                <hr>
            </div>
            <div class="modal-body">
                <h3 class="modal-title" style="font-family:Candara; font-size:20px;text-align:center;">DATOS DEL
                    PACIENTE</h3>
                <br>
                <form autocomplete="off" method="post" id="formregistro" action="{{route('Asignar_Tratamiento')}}">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label" for="nombre" style="font-family:Arial; font-size:15px;">Nombre
                            Completo:</label>
                        <input readonly disabled pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+" title="Ingrese unicamente letras" type="text"
                            class="form-control" id="nombre" name="nombre"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese el nombre completo del paciente" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="edad"
                            style="font-family:Arial; font-size:15px;">Edad:</label>
                        <input readonly disabled type="number" size="2" min="0" max="120" oninput="validity.valid||(value='');"
                            class="form-control" id="edad" name="edad"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese la edad del paciente" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="direccion"
                            style="font-family:Arial; font-size:15px;">Dirección:</label>
                        <input readonly disabled type="text" class="form-control" id="direccion" name="direccion"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese la dirección del paciente" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="telefonofijo"
                            style="font-family:Arial; font-size:15px;">Télefono
                            Fijo:</label>
                        <input readonly disabled oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            type='text' maxlength="8" onkeydown="return event.key != 'Enter';" id="telefonofijo"
                            pattern="[2][0-9]{7}" name="telefonofijo" class="form-control"
                            title="Ingrese un número de télefono fijo válido"
                            placeholder="Ingrese un número de télefono fijo"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="telefonomovil"
                            style="font-family:Arial; font-size:15px;">Télefono
                            Móvil:</label>
                        <input readonly disabled oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            type='text' maxlength="8" onkeydown="return event.key != 'Enter';" id="telefonomovil"
                            pattern="[267][0-9]{7}" name="telefonomovil" class="form-control"
                            title="Ingrese un número de télefono móvil válido"
                            placeholder="Ingrese un número de télefono móvil"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="observaciones"
                            style="font-family:Arial; font-size:15px;">Observaciones</label>
                        <textarea readonly disabled maxlength="1000" id="observaciones" name="observaciones" rows="3" cols="66"
                            style="display:block; border: 1px solid #AED6F1;border-radius:5px; overflow: auto;font-family:Arial; font-size:15px;"
                            placeholder="Ingrese las observaciones del paciente" required></textarea>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id">
                    </div>

                    <hr>
                    <h3 class="modal-title" style="font-family:Candara; font-size:20px;text-align:center;">DATOS DEL
                        TRATAMIENTO</h3>     
                        <div class="form-group">
                        <label class="col-form-label" for="tratamiento"
                            style="font-family:Arial; font-size:15px;">Tratamiento a asignar:</label>
                        <br>
                        <select class="js-example-basic-single" name="tratamiento" id="tratamiento"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px;width:100%;"
                            required>
                            <option selected disabled value="">Seleccionar una opción</option>
                            @foreach($tratamientos as $tratamientos)
                            <option value="{{$tratamientos->tratamiento_id}}">
                                {{$tratamientos->nombreTratamiento}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="cantidad" style="font-family:Arial; font-size:15px;">Cantidad:</label>
                        <input type="number" step="1" min="0" max="1000" oninput="validity.valid||(value='');"
                            class="form-control" id="cantidad" name="cantidad"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese la cantidad de tratamientos a realizar" required>
                    </div>   

                    <div class="form-group">
                        <label class="col-form-label" for="descripcion"
                            style="font-family:Arial; font-size:15px;">Descripción:</label>
                        <textarea maxlength="1000" id="descripcion" name="descripcion" rows="3" cols="66"
                            style="display:block; border: 1px solid #AED6F1;border-radius:5px; overflow: auto;font-family:Arial; font-size:15px;"
                            placeholder="Ingrese la descripción del tratamiento" required></textarea>
                    </div>

            </div>
            <hr>
            <div class="modal-footer">
                <input type="hidden" name="button_action" id="button_action" value="registrar" />
                <button class="btn btn-info" type="submit" id="registrar" style="font-family:Candara; font-size:15px;"
                    value="registrar">
                    <i class="fa fa-file-text-o"></i> Registrar Tratamiento
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
