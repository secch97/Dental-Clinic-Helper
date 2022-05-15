<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{asset('assets/frontend/images/icons/favicon.ico')}}">

    <!-- Stylesheets -->
    <link href="{{asset('assets/frontend/style.css')}}" rel="stylesheet">

    <link href="{{asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{asset('assets/frontend/css/swiper.css')}}" rel="stylesheet">

    <link href="{{asset('assets/frontend/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/toastr.min.css')}}">
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}"
        rel="stylesheet" />

    @stack('css')
</head>

<body>
    @include('layouts.frontend.partial.header')
    @yield('content')
    @include('layouts.frontend.partial.footer')

    <!-- SCIPTS -->

    <script src="{{asset('assets/frontend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/tether.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/frontend/js/swiper.js')}}"></script>

    <script src="{{asset('assets/frontend/js/toastr.min.js')}}"></script>

    <!-- SCRIPTS PAGINA -->
    <script src="{{asset('assets/frontend/js/jquery.min.js')}}" type="50f895b435f5315745f6f95c-text/javascript"></script>
    <script src="{{asset('assets/frontend/js/popper.min.js')}}" type="50f895b435f5315745f6f95c-text/javascript"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}" type="50f895b435f5315745f6f95c-text/javascript"></script>
    <script src="{{asset('assets/frontend/js/dento.bundle.js')}}" type="50f895b435f5315745f6f95c-text/javascript"></script>
    <script src="{{asset('assets/frontend/js/default-assets/active.js')}}" type="50f895b435f5315745f6f95c-text/javascript"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="50f895b435f5315745f6f95c-text/javascript"></script>
    <script type="50f895b435f5315745f6f95c-text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');
    </script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="50f895b435f5315745f6f95c-|49" defer=""></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}">
    </script>
    <!-- FIN SCRIPS PAGINA -->
    <script type="text/javascript">
        $(document).on('click', '.show-modal-actualizarcuenta', function () {
            $('#modalactualizarcuenta').modal('show');
        });

    </script>

<script type="text/javascript">
        $(document).on('click', '.show-modal-actualizarcontraseña', function () {
            $('#modalactualizarcontraseña').modal('show');
        });

    </script>

<script>
        $(document).ready(function () {
            $('#tablaReservaCitas').DataTable({
                "order": [
                    [0, "desc"],
                    [1, "asc"]
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
                    url: "{{ route('CitasReservadasTabla') }}",
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
    @toastr_render

    @stack('js')

    <script src="{{asset('assets/frontend/js/scripts.js')}}"></script>
</body>

</html>