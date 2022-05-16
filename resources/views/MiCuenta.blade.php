@extends('layouts.frontend.app')

@section('title', 'Clinica de Salud Dental')

@push('css')
<link href="{{asset('assets/frontend/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<style>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }

</style>

<div class="breadcumb-area bg-img bg-gradient-overlay"
    style="background-image: url(../assets/frontend/images/bg-img/12.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h2 class="title">Mi Cuenta</h2>
            </div>
        </div>
    </div>
</div>

<section class="dento-contact-area mt-50 mb-100">
    <div class="container">

        <div class="row">


            <div class="col-12 col-md-12">
                <div class="contact-form">

                    <section
                        class="book-an-oppointment-area section-padding-100 bg-img bg-gradient-overlay jarallax clearfix"
                        style="background-image: url('../assets/frontend/images/bg-img/5.jpg');">
                        <div class="container">
                            <div class="row">

                                <div class="col-12">
                                    <div class="section-heading text-center white">
                                        <h2>Datos Personales</h2>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="appointment-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 style="color:white;">
                                                    Nombre Completo:
                                                </h4 style="">
                                                <div class="form-group mb-30">

                                                    <input readonly type="text" name="nombreUsuario" id="nombreUsuario"
                                                        class="form-control" placeholder="Nombre Completo"
                                                        value="{{Auth::User()->nombre}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 style="color:white;">
                                                    Usuario:
                                                </h4 style="">
                                                <div class="form-group mb-30">
                                                    <input readonly disabled type="text" name="usuario" id="usuario"
                                                        class="form-control" placeholder="Usuario"
                                                        value="{{Auth::User()->usuario}}" required>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <h4 style="color:white;">
                                                    Correo Electrónico:
                                                </h4 style="">
                                                <div class="form-group mb-30">
                                                    <input readonly disabled type="email" name="emailUsuario"
                                                        id="emailUsuario" class="form-control"
                                                        value="{{Auth::User()->email}}" placeholder="Correo Electrónico"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 style="color:white;">
                                                    Fecha de creación:
                                                </h4 style="">
                                                <div class="form-group mb-30">
                                                    <input readonly disabled type="text" name="fechaCreacionUsuario"
                                                        id="fechaCreacionUsuario" class="form-control"
                                                        placeholder="Fecha de Creación"
                                                        value="{{Auth::User()->fecha_creacion}}" required>
                                                </div>

                                            </div>
                                            <div class="col-12 text-center">
                                                <a href="#" name="actualizar"
                                                    class="show-modal-actualizarcuenta btn dento-btn btn-sm">
                                                    <i class="fa fa-pencil"></i> Actualizar Datos
                                                </a>
                                                &nbsp;
                                                <a href="#"
                                                    class="show-modal-actualizarcontraseña btn dento-btn btn-sm">
                                                    <i class="fa fa-lock"></i> Actualizar Contraseña
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- #END# Left Sidebar -->
<style>
    .dataTableParentHidden {
        overflow: hidden;
        height: 0px;
        width: 100%;
    }

</style>

<section class="dento-contact-area mt-50 mb-100" style="justify-content: center;align-items: center;">
        <div class="row" style="justify-content: center;align-items: center;">
                <div id="dataTableWrapper" style="width:50%" class="dataTableParentHidden">
                    <div class="table-responsive">
                        <table id="tablaReservaCitas"
                            class="table table-bordered table-striped table-hover js-basic-example dataTable text-center"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="font-family:Candara; font-size:15px;" class="text-center">Fecha de la
                                        cita:</th>
                                    <th style="font-family:Candara; font-size:15px;" class="text-center">Hora de la
                                        cita:
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
</section>


{{-- Modal Mi Cuenta --}}
<div id="modalactualizarcuenta" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document"
        style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) !important;">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;align-items: center;">
                <h4 class="modal-title" style="text-align:center;font-family:Candara; font-size:20px;"> ACTUALIZACIÓN DE
                    DATOS PERSONALES
                </h4>
                <hr>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                <form autocomplete="off" method="post" id="formeditar" action="{{route('EditarCuenta')}}">
                    @csrf
                    <h3 class="modal-title" style="font-family:Candara; font-size:20px;text-align:center;">DATOS DE LA
                        CUENTA:</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-form-label" for="nombreUsuario"
                            style="font-family:Arial; font-size:15px;">Nombre
                            Completo:</label>
                        <input pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+" title="Ingrese unicamente letras" type="text"
                            class="form-control" id="nombreUsuario" name="nombreUsuario"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese su nombre completo" value="{{Auth::User()->nombre}}" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="usuario"
                            style="font-family:Arial; font-size:15px;">Usuario:</label>
                        <input pattern="(.){5,15}"
                            title="Ingrese un usuario que contenga como mínimo 5 caracteres y como máximo 15"
                            type="text" class="form-control" id="usuario" name="usuario"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese su nombre de usuario" value="{{Auth::User()->usuario}}" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="emailUsuario"
                            style="font-family:Arial; font-size:15px;">Correo Electrónico:</label>
                        <input pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Ingrese un correo electrónico valido"
                            type="text" class="form-control" id="emailUsuario" name="emailUsuario"
                            style="font-family:Arial; font-size:15px;border: 1px solid #AED6F1;border-radius:5px"
                            placeholder="Ingrese su correo electrónico" value="{{Auth::User()->email}}" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="button_action" id="button_action" value="registrar" />
                <button class="btn dento-btn" type="submit" id="actualizar" style="font-family:Candara; font-size:15px;"
                    value="actualizar">
                    <i class="fa fa-pencil"></i> Actualizar Información
                </button>
                <button class="btn dento-btn" type="button" data-dismiss="modal"
                    style="font-family:Candara; font-size:15px;">
                    <i class="fa fa-times"></i> Cerrar
                </button>
            </div>
            </form>
        </div>
    </div>
</div>


{{-- Modal Actualizar Contraseña --}}
<div id="modalactualizarcontraseña" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document"
        style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%) !important;">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;align-items: center;">
                <h4 class="modal-title" style="text-align:center;font-family:Candara; font-size:20px;"> ACTUALIZACIÓN DE
                    CONTRASEÑA
                </h4>
                <hr>
            </div>
            <div class="modal-body" style="max-height: calc(100vh - 200px);overflow-y: auto;">
                <form autocomplete="off" method="post" id="formeditar" action="{{route('Cambio_Contraseña_Post')}}">
                    @csrf
                    <h3 class="modal-title" style="font-family:Candara; font-size:20px;text-align:center;">COMPLETAR LOS
                        SIGUIENTES CAMPOS:</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-form-label" for="password" style="font-family:Arial; font-size:15px;">Nueva
                            Contraseña:</label>
                        <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="La contraseña debe poseer almenos 8 caracteres de longitud, contener al menos una mayúscula, una minúscula y un número"
                            type="password" class="form-control" id="password" name="password"
                            placeholder="Inserte una contraseña" style="font-family:Candara; font-size:15px;" required>
                    </div>
                    <label class="col-form-label" for="password_confirm"
                        style="font-family:Arial; font-size:15px;">Confirmar Contraseña:</label>
                    <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="La contraseña debe poseer almenos 8 caracteres de longitud, contener al menos una mayúscula, una minúscula y un número"
                        type="password" class="form-control" id="password_confirm" name="password_confirm"
                        placeholder="Confirme su contraseña" style="font-family:Candara; font-size:15px;" required>
                    <div class="form-group">

                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="button_action" id="button_action" value="registrar" />
                <button class="btn dento-btn" type="submit" id="actualizar" style="font-family:Candara; font-size:15px;"
                    value="actualizar">
                    <i class="fa fa-lock"></i> Actualizar Contraseña
                </button>
                <button class="btn dento-btn" type="button" data-dismiss="modal"
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
