@extends('layouts.frontend.app')
@section('title', 'Clinica de Salud Dental')

@push('css')
<link href="{{asset('assets/frontend/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="breadcumb-area bg-img bg-gradient-overlay"
    style="background-image: url(../assets/frontend/images/bg-img/12.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h2 class="title">Nuestros Servicios</h2>
            </div>
        </div>
    </div>
</div>


<section class="dento-services-area mt-50 mb-50">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/ortodoncia.png')}}" alt="">
                    </div>
                    <h5>Ortodoncia</h5>

                </div>
            </div>


            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/endodoncia.png')}}" alt="">
                    </div>
                    <h5>Endodoncias</h5>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/implantes.png')}}" alt="">
                    </div>
                    <h5>Implantes Dentales</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/blanqueo.png')}}" alt="">
                    </div>
                    <h5>Blanqueamiento de Dientes</h5>

                </div>
            </div>


            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/extraccion.png')}}" alt="">
                    </div>
                    <h5>Extracciones</h5>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/muelasjuicio.png')}}" alt="">
                    </div>
                    <h5>Muelas del Juicio</h5>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/obturacion.png')}}" alt="">
                    </div>
                    <h5>Obturaciones</h5>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/coronas.png')}}" alt="">
                    </div>
                    <h5>Coronas</h5>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/images/core-img/infantil.png')}}" alt="">
                    </div>
                    <h5>Atención infantil</h5>

                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                    </div>
                    <h5></h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                    </div>
                    <h5 style="font-style:italic;">Y mucho más...</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-service--area text-center mb-50">
                    <div class="icon">
                    </div>
                    <h5></h5>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')

@endpush
