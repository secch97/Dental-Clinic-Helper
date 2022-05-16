<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- CSS -->
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{asset('assets/frontend/images/icons/favicon.ico')}}">
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Google Fonts -->
    <link href="{{ asset('assets/backend/css/iconfont/material-icons.css')}}" rel="stylesheet" type="text/css">
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Waves Effect CSS -->
    <link href="{{ asset('assets/backend/plugins/node-waves/waves.css')}}" rel="stylesheet" />
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Animation CSS -->
    <link href="{{ asset('assets/backend/plugins/animate-css/animate.css')}}" rel="stylesheet" />
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- DataTable CSS -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}"
        rel="stylesheet" />

    <link
        href="{{ asset('assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
        rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}"
        rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Custom CSS -->
    <link href="{{ asset('assets/backend/css/style.css')}}" rel="stylesheet">
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Panel de Administración AdminBSB: Temas.-->
    <link href="{{ asset('assets/backend/css/themes/all-themes.css')}} " rel="stylesheet" />
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Notificaciones Toastr CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/toastr.min.css')}}">
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/vendor/chosen/chosen.css')}}">
    <!-- FIN CSS -->
    @stack('css')
</head>

<body class="theme-blue-grey">
    <!-- Cargador de página -->
    <!-- #FIN# de cargador de página -->
    <!-- Overlay para barras laterales -->
    <div class="overlay"></div>
    <!-- #FIN# de Overlay para barras laterales -->
    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #FIN# de barra de búsqueda -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('layouts.backend.partial.topbar')
    <!-- #Top Bar -->
    <section>
        @include('layouts.backend.partial.sidebar')
    </section>

    <section class="content">
        @yield('content')
    </section>

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!--                                          S C R I P T S                                                -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- SCIPTS -->
    <!-- Bootstrap y Jquery Core Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.min.js')}} "></script>
    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js')}} "></script>

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.js')}} "></script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Select Plugin Js -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}} "></script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/node-waves/waves.js')}} "></script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!--Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}">
    </script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <script>
        $(document).ready(function () {
            $('#tablaUsuarios').DataTable({
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Usuario:"
                },
                "ajax": {
                    url: "{{ route('TablaUsuarios') }}",
                },
                "columns": [{
                        data: 'User_id',
                        name: 'users.User_id'
                    },
                    {
                        data: 'usuario',
                        name: 'users.usuario'
                    },
                    {
                        data: 'nombre',
                        name: 'users.nombre'
                    },
                    {
                        data: 'email',
                        name: 'users.email'
                    },
                    {
                        data: 'nombre_rol',
                        name: 'roles.nombre_rol',
                        orderable: true
                    },
                    {
                        data: 'estado',
                        name: 'users.estado',
                        orderable: true
                    },
                    {
                        data: 'fecha_creacion',
                        name: 'users.fecha_creacion'
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaPacientes').DataTable({
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Paciente:"
                },
                "ajax": {
                    url: "{{ route('TablaPacientes') }}",
                },
                "columns": [{
                        data: 'paciente_id',
                        name: 'pacientes.paciente_id'
                    },
                    {
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },

                    {
                        data: 'telefonoFijoPaciente',
                        name: 'pacientes.telefonoFijoPaciente'
                    },
                    {
                        data: 'telefonoMovilPaciente',
                        name: 'pacientes.telefonoMovilPaciente',
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaTratamientos').DataTable({
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Tratamiento:"
                },
                "ajax": {
                    url: "{{ route('TablaTratamientos') }}",
                },
                "columns": [{
                        data: 'tratamiento_id',
                        name: 'tratamientos.tratamiento_id'
                    },
                    {
                        data: 'nombreTratamiento',
                        name: 'tratamientos.nombreTratamiento'
                    },

                    {
                        data: 'costoTratamiento',
                        name: 'tratamientos.costoTratamiento'
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaListaPacientes').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Paciente:"
                },
                "ajax": {
                    url: "{{ route('TablaPacientes2') }}",
                },
                "columns": [{
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },

                    {
                        data: 'telefonoFijoPaciente',
                        name: 'pacientes.telefonoFijoPaciente'
                    },
                    {
                        data: 'telefonoMovilPaciente',
                        name: 'pacientes.telefonoMovilPaciente',
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaHistorialTratamientos').DataTable({
                "order": [
                    [0, "desc"],
                    [1, "asc"],
                ],
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Tratamiento Asignado:"
                },
                "ajax": {
                    url: "{{ route('TablaHistorialDeTratamientos') }}",
                },
                "columns": [{
                        data: 'fechaCreacionTratamiento',
                        name: 'plandetratamientos.fechaCreacionTratamiento'
                    },

                    {
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },
                    {
                        data: 'nombreTratamiento',
                        name: 'tratamientos.nombreTratamiento',
                    },
                    {
                        data: 'cantidad',
                        name: 'plandetratamientos.cantidad',
                    },
                    {
                        data: 'costoTratamiento',
                        name: 'tratamientos.costoTratamiento',
                    },
                    {
                        data: 'costoTotal',
                        name: 'plandetratamientos.costoTotal',
                    },
                    {
                        data: 'abonoTratamiento',
                        name: 'plandetratamientos.abonoTratamiento',
                    },
                    {
                        data: 'saldoTratamiento',
                        name: 'plandetratamientos.saldoTratamiento',
                    },
                    {
                        data: 'estado',
                        orderable: false
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaHistorialPacientes').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Paciente:"
                },
                "ajax": {
                    url: "{{ route('TablaPacientes3') }}",
                },
                "columns": [{
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },

                    {
                        data: 'telefonoFijoPaciente',
                        name: 'pacientes.telefonoFijoPaciente'
                    },
                    {
                        data: 'telefonoMovilPaciente',
                        name: 'pacientes.telefonoMovilPaciente',
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaCitas').DataTable({
                "order": [
                    [0, "desc"],
                    [1, "asc"],
                    [2, "asc"],

                ],
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Cita:"
                },
                "ajax": {
                    url: "{{ route('TablaCitas') }}",
                },
                "columns": [{
                        data: 'fechaCita',
                        name: 'citas.fechaCita'
                    },
                    {
                        data: 'horaCita',
                        name: 'citas.horaCita'
                    },
                    {
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },
                    {
                        data: 'nombreTratamiento',
                        name: 'tratamientos.nombreTratamiento'
                    },
                    {
                        data: 'descripcionCita',
                        name: 'citas.descripcionCita',
                    },
                    {
                        data: 'costoTotal',
                        name: 'plandetratamientos.costoTotal',
                    },
                    {
                        data: 'abonoCita',
                        name: 'citas.abonoCita',
                    },
                    {
                        data: 'saldoCita',
                        name: 'citas.saldoCita',
                    },
                    {
                        data: 'estadoCita',
                        orderable: false
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaCitas2').DataTable({
                "order": [
                    [0, "desc"],
                    [1, "asc"],
                    [2, "asc"],

                ],
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Cita:"
                },
                "ajax": {
                    url: "{{ route('TablaCitas2') }}",
                },
                "columns": [{
                        data: 'fechaCita',
                        name: 'citas.fechaCita'
                    },
                    {
                        data: 'horaCita',
                        name: 'citas.horaCita'
                    },
                    {
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },
                    {
                        data: 'nombreTratamiento',
                        name: 'tratamientos.nombreTratamiento'
                    },
                    {
                        data: 'descripcionCita',
                        name: 'citas.descripcionCita',
                    },
                    {
                        data: 'costoTotal',
                        name: 'plandetratamientos.costoTotal',
                    },
                    {
                        data: 'abonoCita',
                        name: 'citas.abonoCita',
                    },
                    {
                        data: 'saldoCita',
                        name: 'citas.saldoCita',
                    },
                    {
                        data: 'estadoCita',
                        orderable: false
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaHistorialDeTratamientos2').DataTable({
                "order": [
                    [0, "desc"],
                    [1, "asc"],
                ],
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Tratamiento Asignado:"
                },
                "ajax": {
                    url: "{{ route('TablaHistorialDeTratamientos2') }}",
                },
                "columns": [

                    {
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },
                    {
                        data: 'nombreTratamiento',
                        name: 'tratamientos.nombreTratamiento',
                    },
                    {
                        data: 'descripcion',
                        name: 'plandetratamientos.descripcion',
                    },
                    {
                        data: 'cantidad',
                        name: 'plandetratamientos.cantidad',
                    },
                    {
                        data: 'costoTratamiento',
                        name: 'tratamientos.costoTratamiento',
                    },
                    {
                        data: 'costoTotal',
                        name: 'plandetratamientos.costoTotal',
                    },
                    {
                        data: 'abonoTratamiento',
                        name: 'plandetratamientos.abonoTratamiento',
                    },
                    {
                        data: 'saldoTratamiento',
                        name: 'plandetratamientos.saldoTratamiento',
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaReservaCitas').DataTable({
                "order": [
                    [0, "desc"],
                    [1, "asc"],
                    [2, "asc"]
                ],
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Cita:"
                },
                "ajax": {
                    url: "{{ route('CitasReservadasTabla2') }}",
                },
                "columns": [

                    {
                        data: 'fechaReservaCita',
                        name: 'reservacitas.fechaReservaCita'
                    },
                    {
                        data: 'horaReservaCita',
                        name: 'reservacitas.horaReservaCita',
                    },
                    {
                        data: 'nombre',
                        name: 'users.nombre',
                    },
                    {
                        data: 'telefonoReservaCita',
                        name: 'reservacitas.telefonoReservaCita',
                    },
                    {
                        data: 'direccionReservaCita',
                        name: 'reservacitas.direccionReservaCita',
                    },
                    {
                        data: 'descripcionReservaCita',
                        name: 'reservacitas.descripcionReservaCita',
                    },
                    {
                        data: 'estadoReservaCita',
                        name: 'reservacitas.estadoReservaCita',
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#tablaReservaCitas2').DataTable({
                "order": [
                    [0, "desc"],
                    [1, "asc"],
                    [2, "asc"]
                ],
                "processing": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Cita:"
                },
                "ajax": {
                    url: "{{ route('CitasReservadasTabla3') }}",
                },
                "columns": [

                    {
                        data: 'fechaReservaCita',
                        name: 'reservacitas.fechaReservaCita'
                    },
                    {
                        data: 'horaReservaCita',
                        name: 'reservacitas.horaReservaCita',
                    },
                    {
                        data: 'nombre',
                        name: 'users.nombre',
                    },
                    {
                        data: 'telefonoReservaCita',
                        name: 'reservacitas.telefonoReservaCita',
                    },
                    {
                        data: 'direccionReservaCita',
                        name: 'reservacitas.direccionReservaCita',
                    },
                    {
                        data: 'descripcionReservaCita',
                        name: 'reservacitas.descripcionReservaCita',
                    },
                    {
                        data: 'estadoReservaCita',
                        name: 'reservacitas.estadoReservaCita',
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
            $('#dataTableWrapper').removeClass('dataTableParentHidden');
        });

    </script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Scripts para muestra de modal -->
    <!-- Script 1: Muestra de modal "crear" registros -->
    <script type="text/javascript">
        $(document).on('click', '.create-modal', function () {
            $('#modalcrear').modal('show');
            $(".modal-body #tipo").val('').change().trigger("chosen:updated");;
            $('#formregistro')[0].reset();
        });

    </script>

    <!-- Script 2: Muestra de modal "mostrar" usuarios -->
    <script type="text/javascript">
        $(document).on('click', '.show-modal', function () {
            var nombre = $(this).data('nombre');
            var usuario = $(this).data('usuario');
            var correo = $(this).data('correo');
            var tipousuario = $(this).data('tipousuario');
            var estado = $(this).data('estado');
            var fecha = $(this).data('fecha');
            if (estado == 1) {
                estado = "Activo";
            } else {
                estado = "Inactivo";
            }
            $(".modal-body #nombre").val(nombre);
            $(".modal-body #usuario").val(usuario);
            $(".modal-body #correo").val(correo);
            $(".modal-body #tipo").val(tipousuario);
            $(".modal-body #estado").val(estado);
            $(".modal-body #fecha").val(fecha);
            $('#modalmostrar').modal('show');
        });

    </script>

    <!-- Script 3: Muestra de modal "editar" usuarios-->
    <script type="text/javascript">
        $(document).on('click', '.edit-modal', function () {
            var nombre = $(this).data('nombre');
            var usuario = $(this).data('usuario');
            var tipousuario = $(this).data('tipousuario');
            var estado = $(this).data('estado');
            var correo = $(this).data('correo');
            var fecha = $(this).data('fecha');
            var id = $(this).data('id');
            $(".modal-body #nombre").val(nombre);
            $(".modal-body #usuario").val(usuario);
            $(".modal-body #tipo2").val(tipousuario).change().trigger("chosen:updated");;
            $(".modal-body #estado").val(estado).change().trigger("chosen:updated");;
            $(".modal-body #correo").val(correo);
            $(".modal-body #id").val(id).change().trigger("chosen:updated");;
            $('#modaleditar').modal('show');
        });

    </script>

    <!-- Script 4: Muestra de modal "cambiar contraseña" de usuarios-->
    <script type="text/javascript">
        $(document).on('click', '.password-modal', function () {
            var id = $(this).data('id');
            $(".modal-body #id").val(id).change().trigger("chosen:updated");;
            $('#modalpassword').modal('show');
        });

    </script>

    <!-- Script 5: Crear pacientes -->
    <script type="text/javascript">
        $(document).on('click', '.create-modal', function () {
            $('#modalcrearpaciente').modal('show');
            $('#formregistro')[0].reset();
        });

    </script>

    <!-- Script 5: Mostrar pacientes -->
    <script type="text/javascript">
        $(document).on('click', '.show-modal-paciente', function () {
            var nombrePaciente = $(this).data('nombrepaciente');
            var edadPaciente = $(this).data('edadpaciente');
            var direccionPaciente = $(this).data('direccionpaciente');
            var telefonoFijoPaciente = $(this).data('telefonofijopaciente');
            var telefonoMovilPaciente = $(this).data('telefonomovilpaciente');
            var observacionesPaciente = $(this).data('observacionespaciente');

            $(".modal-body #nombremostrar").val(nombrePaciente);
            $(".modal-body #edad").val(edadPaciente);
            $(".modal-body #direccion").val(direccionPaciente);
            $(".modal-body #telefonofijo").val(telefonoFijoPaciente);
            $(".modal-body #telefonomovil").val(telefonoMovilPaciente);
            $(".modal-body #observaciones").val(observacionesPaciente);
            $('#modalmostrarpaciente').modal('show');
        });

    </script>

    <!-- Script 6: Editar pacientes -->
    <script type="text/javascript">
        $(document).on('click', '.edit-modal-paciente', function () {
            var nombrePaciente = $(this).data('nombrepaciente');
            var edadPaciente = $(this).data('edadpaciente');
            var direccionPaciente = $(this).data('direccionpaciente');
            var telefonoFijoPaciente = $(this).data('telefonofijopaciente');
            var telefonoMovilPaciente = $(this).data('telefonomovilpaciente');
            var observacionesPaciente = $(this).data('observacionespaciente');
            var idPaciente = $(this).data('idpaciente')
            $(".modal-body #nombre").val(nombrePaciente);
            $(".modal-body #edad").val(edadPaciente);
            $(".modal-body #direccion").val(direccionPaciente);
            $(".modal-body #telefonofijo").val(telefonoFijoPaciente);
            $(".modal-body #telefonomovil").val(telefonoMovilPaciente);
            $(".modal-body #observaciones").val(observacionesPaciente);
            $(".modal-body #id").val(idPaciente);
            $('#modaleditarpaciente').modal('show');
        });

    </script>

    <!-- Script 5: Crear Tratamiento -->
    <script type="text/javascript">
        $(document).on('click', '.create-modal', function () {
            $('#modalcreartratamiento').modal('show');
            $('#formregistro')[0].reset();
        });

    </script>

    <!-- Script 5: Mostrar Tratamientos -->
    <script type="text/javascript">
        $(document).on('click', '.show-modal-tratamiento', function () {
            var nombreTratamiento = $(this).data('nombretratamiento');
            var costoTratamiento = $(this).data('costotratamiento');

            $(".modal-body #nombre").val(nombreTratamiento);
            $(".modal-body #costo").val(costoTratamiento);
            $('#modalmostrartratamiento').modal('show');
        });

    </script>

    <!-- Script 6: Editar Tratamientos -->
    <script type="text/javascript">
        $(document).on('click', '.edit-modal-tratamiento', function () {
            var nombreTratamiento = $(this).data('nombretratamiento');
            var costoTratamiento = $(this).data('costotratamiento');
            var idTratamiento = $(this).data('idtratamiento')

            $(".modal-body #nombre").val(nombreTratamiento);
            $(".modal-body #costo").val(costoTratamiento);
            $(".modal-body #id").val(idTratamiento);
            $('#modaleditartratamiento').modal('show');
        });

    </script>

    <!-- Script 6: Editar Tratamientos -->
    <script type="text/javascript">
        $(document).on('click', '.show-modal-crearplantratamiento', function () {
            $('#formregistro')[0].reset();
            var nombrePaciente = $(this).data('nombrepaciente');
            var edadPaciente = $(this).data('edadpaciente');
            var direccionPaciente = $(this).data('direccionpaciente');
            var telefonoFijoPaciente = $(this).data('telefonofijopaciente');
            var telefonoMovilPaciente = $(this).data('telefonomovilpaciente');
            var observacionesPaciente = $(this).data('observacionespaciente');
            var idPaciente = $(this).data('id')

            $(".modal-body #nombre").val(nombrePaciente);
            $(".modal-body #edad").val(edadPaciente);
            $(".modal-body #direccion").val(direccionPaciente);
            $(".modal-body #telefonofijo").val(telefonoFijoPaciente);
            $(".modal-body #telefonomovil").val(telefonoMovilPaciente);
            $(".modal-body #observaciones").val(observacionesPaciente);
            $(".modal-body #id").val(idPaciente);
            $('#modalcrearplandetratamiento').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-historialtratamientospacientes', function () {
            var nombrePaciente = $(this).data('nombrepaciente');
            var edadPaciente = $(this).data('edadpaciente');
            var direccionPaciente = $(this).data('direccionpaciente');
            var telefonoFijoPaciente = $(this).data('telefonofijo');
            var telefonoMovilPaciente = $(this).data('telefonomovil');
            var observacionesPaciente = $(this).data('observaciones');





            $(".modal-body #nombre").val(nombrePaciente);
            $(".modal-body #edad").val(edadPaciente);
            $(".modal-body #direccion").val(direccionPaciente);
            $(".modal-body #telefonofijo").val(telefonoFijoPaciente);
            $(".modal-body #telefonomovil").val(telefonoMovilPaciente);
            $(".modal-body #observaciones").val(observacionesPaciente);


            $('#modalmostrartratamientoasignadopaciente').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-historialtratamientosdatos', function () {

            var estado = $(this).data('estadotratamiento');
            if (estado == 1) {
                estado = 'Activo'
            } else if (estado == 2) {
                estado = 'Finalizado'
            } else {
                estado = 'Cancelado'
            }

            var usuario = $(this).data('nombreusuario');
            var tratamientoAsignado = $(this).data('nombretratamiento');
            var descripcionTratamiento = $(this).data('descripciontratamiento');
            var cantidadTratamiento = $(this).data('cantidadtratamiento');
            var costoUnitarioTratamiento = $(this).data('costotratamiento');
            var costoTotalTratamiento = $(this).data('costototaltratamiento');
            var abonoTratamiento = $(this).data('abonotratamiento');
            var saldoTratamiento = $(this).data('saldotratamiento');

            $(".modal-body #estado").val(estado);
            $(".modal-body #usuario").val(usuario);
            $(".modal-body #tratamiento").val(tratamientoAsignado);
            $(".modal-body #descripcion").val(descripcionTratamiento);
            $(".modal-body #cantidad").val(cantidadTratamiento);
            $(".modal-body #costounitario").val(costoUnitarioTratamiento);
            $(".modal-body #costototal").val(costoTotalTratamiento);
            $(".modal-body #abono").val(abonoTratamiento);
            $(".modal-body #saldo").val(saldoTratamiento);
            $('#modalmostrartratamientoasignado').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.edit-modal-historialtratamientos', function () {
            var idpaciente = $(this).data('idpaciente');
            var nombrePaciente = $(this).data('nombrepaciente');
            var edadPaciente = $(this).data('edadpaciente');
            var direccionPaciente = $(this).data('direccionpaciente');
            var telefonoFijoPaciente = $(this).data('telefonofijo');
            var telefonoMovilPaciente = $(this).data('telefonomovil');
            var observacionesPaciente = $(this).data('observaciones');

            var estado = $(this).data('estadotratamiento');


            var tratamientoid = $(this).data('idtratamiento');
            var descripcionTratamiento = $(this).data('descripciontratamiento');
            var cantidadTratamiento = $(this).data('cantidadtratamiento');
            var costoUnitarioTratamiento = $(this).data('costotratamiento');
            var costoTotalTratamiento = $(this).data('costototaltratamiento');
            var abonoTratamiento = $(this).data('abonotratamiento');
            var saldoTratamiento = $(this).data('saldotratamiento');
            var plantratamientoid = $(this).data('idplantratamiento');
            $(".modal-body #idpaciente").val(idpaciente);
            $(".modal-body #nombre").val(nombrePaciente);
            $(".modal-body #edad").val(edadPaciente);
            $(".modal-body #direccion").val(direccionPaciente);
            $(".modal-body #telefonofijo").val(telefonoFijoPaciente);
            $(".modal-body #telefonomovil").val(telefonoMovilPaciente);
            $(".modal-body #observaciones").val(observacionesPaciente);

            $(".modal-body #estado").val(estado).change().trigger("chosen:updated");;
            $(".modal-body #tratamiento").val(tratamientoid).change().trigger("chosen:updated");;
            $(".modal-body #descripcion").val(descripcionTratamiento);
            $(".modal-body #cantidad").val(cantidadTratamiento);

            $(".modal-body #idplantratamiento").val(plantratamientoid);

            $('#modaleditartratamientoasignado').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.modal-pacienteshistorial', function () {

            $('#modalpacienteshistorial').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.elegir-paciente', function () {
            var idpaciente = $(this).data('idpaciente');
            var nombrePaciente = $(this).data('nombrepaciente');
            var edadPaciente = $(this).data('edadpaciente');
            var direccionPaciente = $(this).data('direccionpaciente');
            var telefonoFijoPaciente = $(this).data('telefonofijopaciente');
            var telefonoMovilPaciente = $(this).data('telefonomovilpaciente');
            var observacionesPaciente = $(this).data('observacionespaciente');
            $(".modal-body #idpaciente").val(idpaciente);
            $(".modal-body #nombre").val(nombrePaciente);
            $(".modal-body #edad").val(edadPaciente);
            $(".modal-body #direccion").val(direccionPaciente);
            $(".modal-body #telefonofijo").val(telefonoFijoPaciente);
            $(".modal-body #telefonomovil").val(telefonoMovilPaciente);
            $(".modal-body #observaciones").val(observacionesPaciente);

            $('#modalpacienteshistorial').modal('hide');

        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.create-modal', function () {
            $('#modalcrearcita').modal('show');
            $('#formregistro')[0].reset();
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.modal-selecciontratamiento', function () {

            $('#modalselecciontratamiento').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('hidden.bs.modal', '.modal', function () {
            $('.modal:visible').length && $(document.body).addClass('modal-open');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.elegir-tratamiento', function () {

            var idPlanDeTratamiento = $(this).data('idplantratamiento');
            var nombrePaciente = $(this).data('nombrepaciente');
            var tratamientoAsignado = $(this).data('tratamientoasignado');
            var descripcionTratamiento = $(this).data('descripciontratamiento');
            var costoTotalTratamiento = $(this).data('costototaltratamiento');



            $(".modal-body #idplantratamiento").val(idPlanDeTratamiento);
            $(".modal-body #paciente").val(nombrePaciente);
            $(".modal-body #tratamientoasignado").val(tratamientoAsignado);
            $(".modal-body #descripcion").val(descripcionTratamiento);
            $(".modal-body #costototal").val(costoTotalTratamiento);

            $('#modalselecciontratamiento').modal('hide');

        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-citaspaciente', function () {

            var nombrePaciente = $(this).data('nombrepaciente');
            var edadPaciente = $(this).data('edadpaciente');
            var direccionPaciente = $(this).data('direccionpaciente');
            var telefonoFijoPaciente = $(this).data('telefonofijo');
            var telefonoMovilPaciente = $(this).data('telefonomovil');
            var observacionesPaciente = $(this).data('observaciones');


            $(".modal-body #nombre").val(nombrePaciente);
            $(".modal-body #edad").val(edadPaciente);
            $(".modal-body #direccion").val(direccionPaciente);
            $(".modal-body #telefonofijo").val(telefonoFijoPaciente);
            $(".modal-body #telefonomovil").val(telefonoMovilPaciente);
            $(".modal-body #observaciones").val(observacionesPaciente);

            $('#modalmostrarpacientecita').modal('show');

        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-citastratamiento', function () {

            var estadoTratamiento = $(this).data('estadotratamiento');
            var creadoPor = $(this).data('nombreusuario');
            var nombreTratamiento = $(this).data('nombretratamiento');
            var descripcionTratamiento = $(this).data('descripciontratamiento');
            var cantidadTratamiento = $(this).data('cantidadtratamiento');
            var costoTratamiento = $(this).data('costotratamiento');
            var costoTotalTratamiento = $(this).data('costototaltratamiento');
            var abonoTratamiento = $(this).data('abonotratamiento');
            var saldoTratamiento = $(this).data('saldotratamiento');
            if (estadoTratamiento == 1) {
                estadoTratamiento = 'Activo'
            } else if (estadoTratamiento == 2) {
                estadoTratamiento = 'Finalizado'
            } else {
                estadoTratamiento = 'Cancelado'
            }
            $(".modal-body #estado").val(estadoTratamiento);
            $(".modal-body #usuario").val(creadoPor);
            $(".modal-body #tratamiento").val(nombreTratamiento);
            $(".modal-body #descripcion").val(descripcionTratamiento);
            $(".modal-body #cantidad").val(cantidadTratamiento);
            $(".modal-body #costounitario").val(costoTratamiento);
            $(".modal-body #costototal").val(costoTotalTratamiento);
            $(".modal-body #abono").val(abonoTratamiento);
            $(".modal-body #saldo").val(saldoTratamiento);

            $('#modalmostrartratamientocita').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-citas', function () {

            var citaCreadaPor = $(this).data('nombreusuario');
            var estadoCita = $(this).data('estadocita');
            var fechaCita = $(this).data('fechacita');
            var horaCita = $(this).data('horacita');
            var descripcionCita = $(this).data('descripcioncita');
            var precioTotal = $(this).data('costototaltratamiento');
            var abonoCita = $(this).data('abonocita');
            var saldoCita = $(this).data('saldocita');
            if (estadoCita == 1) {
                estadoCita = 'Pendiente'
            } else if (estadoCita == 2) {

                estadoCita = 'Confirmada'
            } else if (estadoCita == 3) {
                estadoCita = 'Completada'
            } else {
                estadoCita = 'Cancelada'
            }

            $(".modal-body #citaCreadaPor").val(citaCreadaPor);
            $(".modal-body #estadoCita").val(estadoCita);
            $(".modal-body #fecha").val(fechaCita);
            $(".modal-body #hora").val(horaCita).change().trigger("chosen:updated");;
            $(".modal-body #descripcion").val(descripcionCita);
            $(".modal-body #precioCita").val(precioTotal);
            $(".modal-body #abonoCita").val(abonoCita);
            $(".modal-body #saldoCita").val(saldoCita);

            $('#mostrardatoscita').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.edit-modal-historialcitas', function () {

            var estadoCita = $(this).data('estadocita');
            var fechaCita = $(this).data('fechacita');
            var horaCita = $(this).data('horacita');
            var descripcionCita = $(this).data('descripcioncita');
            var abonoCita = $(this).data('abonocita');
            var idCita = $(this).data('idcita')

            $('.modal-body #citaid').val(idCita);
            $(".modal-body #estadoCita").val(estadoCita).change().trigger("chosen:updated");;
            $(".modal-body #fecha").val(fechaCita);
            $(".modal-body #hora").val(horaCita).change().trigger("chosen:updated");;
            $(".modal-body #descripcionCita").val(descripcionCita);
            $('#editardatoscita').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.agregar-abono-modal', function () {
            var abonoCita = $(this).data('abonocita');
            var idCita = $(this).data('idcita');

            $(".modal-body #abonoCita").val(abonoCita);
            $(".modal-body #idcita").val(idCita);

            $('#editarabono').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-tablatratamientos', function () {
            var id = $(this).data('id')
            $(".modal-body #id").val(id);
            $(".modal-body #nombre").val(nombre);
            $('#modaltratamientosporpaciente').modal('show');
            $("#tablatratamientosporpaciente").dataTable().fnDestroy();

            $('#tablatratamientosporpaciente').DataTable({
                retrieve: true,
                "order": [
                    [1, "asc"],
                    [0, "desc"]
                ],
                "processing": true,
                "bDestroy": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Tratamiento:"
                },
                "ajax": {

                    url: "{{ route('TablaTratamientosPorPacientes') }}",
                    data: {
                        'usuario': id
                    },
                },
                "columns": [{
                        data: 'fechaCreacionTratamiento',
                        name: 'plandetratamientos.fechaCreacionTratamiento'
                    },

                    {
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },
                    {
                        data: 'nombreTratamiento',
                        name: 'tratamientos.nombreTratamiento',
                    },
                    {
                        data: 'cantidad',
                        name: 'plandetratamientos.cantidad',
                    },
                    {
                        data: 'costoTratamiento',
                        name: 'tratamientos.costoTratamiento',
                    },
                    {
                        data: 'costoTotal',
                        name: 'plandetratamientos.costoTotal',
                    },
                    {
                        data: 'abonoTratamiento',
                        name: 'plandetratamientos.abonoTratamiento',
                    },
                    {
                        data: 'saldoTratamiento',
                        name: 'plandetratamientos.saldoTratamiento',
                    },
                    {
                        data: 'estado',
                        orderable: false
                    }
                ]
            });


            $('#dataTableWrapper').removeClass('dataTableParentHidden');

        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-tablacitasporpaciente', function () {
            var id = $(this).data('id')
            $(".modal-body #id").val(id);
            $('#modalcitasporpaciente').modal('show');
            $("#tablacitasporpaciente").dataTable().fnDestroy();

            $('#tablacitasporpaciente').DataTable({
                retrieve: true,
                "order": [
                    [0, "desc"],
                    [1, "asc"],
                    [2, "asc"]
                ],
                "processing": true,
                "bDestroy": true,
                "bProcessing": true,
                "serverSide": true,
                "paging": true,
                "bServerSide": true,
                "bJQueryUI": true,
                "bDeferRender": true,
                "language": {
                    "search": "Buscar Cita:"
                },
                "ajax": {

                    url: "{{ route('TablaCitasPorPaciente') }}",
                    data: {
                        'usuario': id
                    },
                },
                "columns": [{
                        data: 'fechaCita',
                        name: 'citas.fechaCita'
                    },
                    {
                        data: 'horaCita',
                        name: 'citas.horaCita'
                    },
                    {
                        data: 'nombrePaciente',
                        name: 'pacientes.nombrePaciente'
                    },
                    {
                        data: 'nombreTratamiento',
                        name: 'tratamientos.nombreTratamiento'
                    },
                    {
                        data: 'descripcionCita',
                        name: 'citas.descripcionCita',
                    },
                    {
                        data: 'costoTotal',
                        name: 'plandetratamientos.costoTotal',
                    },
                    {
                        data: 'abonoCita',
                        name: 'citas.abonoCita',
                    },
                    {
                        data: 'saldoCita',
                        name: 'citas.saldoCita',
                    },
                    {
                        data: 'estadoCita',
                        orderable: false
                    }
                ]
            });


            $('#dataTableWrapper').removeClass('dataTableParentHidden');

        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-reservacitaspaciente', function () {
            var nombre = $(this).data('nombresolicitante');
            var usuario = $(this).data('usuario');
            var correo = $(this).data('correo');
            var telefono = $(this).data('telefono');
            var direccion = $(this).data('direccion');

            $(".modal-body #nombre").val(nombre);
            $(".modal-body #usuario").val(usuario);
            $(".modal-body #correo").val(correo);
            $(".modal-body #telefono").val(telefono);
            $(".modal-body #direccion").val(direccion);


            $('#modalmostrarpacientereservacita').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal-reservacitasdatos', function () {
            var fecha = $(this).data('fecha');
            var hora = $(this).data('hora');
            var razon = $(this).data('razon');

            $(".modal-body #fecha").val(fecha);
            $(".modal-body #hora").val(hora).change().trigger("chosen:updated");;
            $(".modal-body #descripcionCita").val(razon);

            $('#modalmostrarservacitadatos').modal('show');
        });

    </script>


    <script type="text/javascript">
        $(document).on('click', '.show-modal-reservacitaseditar', function () {
            var fecha = $(this).data('fecha');
            var hora = $(this).data('hora');
            var id = $(this).data('id');
            var estado = $(this).data('estado');

            $(".modal-body #fecha").val(fecha);
            $(".modal-body #hora").val(hora).change().trigger("chosen:updated");;
            $(".modal-body #estadoCita").val(estado).change().trigger("chosen:updated");;

            $(".modal-body #reservaid").val(id);
            $('#modaleditarreservacita').modal('show');
        });

    </script>

    <script>
        $(document).ready(function () {
            /* $("#menuNavegacion li").click(function (e) {
                 $('#menuNavegacion li').removeClass('active');
                 $(this).addClass("active");
             })*/
            $('li').each(function () {
                if (window.location.href.indexOf($(this).find('a:first').attr('href')) > -1) {
                    $(this).addClass('active').siblings().removeClass('active').parents('li').addClass('active').siblings().removeClass('active');
                }

            });
        });

    </script>




    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}} ">
    </script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}} ">
    </script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}} "></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}} "></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}} "></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}} ">
    </script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}} ">
    </script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Jquery CountTo Plugin Js (Animación de conteo para estadísticas) -->
    <script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js')}} "></script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Raphael & Morris Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js')}} "></script>
    <script src="{{ asset('assets/backend/plugins/morrisjs/morris.js')}} "></script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Custom Js -->
    <script src="{{ asset('assets/backend/js/admin.js')}} "></script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Demo Js -->
    <script src="{{ asset('assets/backend/js/demo.js')}} "></script>
    <script src="{{ asset('assets/backend/plugins/momentjs/moment.js')}} "></script>
    <script src="{{ asset('assets/backend/plugins/momentjs/moment-with-locales.js')}} "></script>

    <script
        src="{{ asset('assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}} ">
    </script>

    <script src="{{ asset('assets/backend/js/pages/index.js')}} "></script>
    <script src="{{asset('assets/frontend/js/script.js')}}"></script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Notificaciones Toastr Js -->
    <script src="{{asset('assets/frontend/js/toastr.min.js')}}"></script>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <script src="{{asset('assets/frontend/vendor/chosen/chosen.jquery.js')}}"></script>


    <script>
        $('.js-example-basic-single').chosen({
            width: "inherit",
            no_results_text: "El dato solicitado no ha sido encontrado"
        });

    </script>





    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Inicio de scripts al ingresar datos invalidos -->
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script type="text/javascript">
        $('#modalcrear').modal('show');

    </script>
    @endif
    <!-- Fin de scripts al ingresar datos invalidos -->
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->
    @toastr_render
    @stack('js')
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->

</body>

</html>
