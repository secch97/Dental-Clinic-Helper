@extends('layouts.frontend.app')
@section('title', 'Clinica de Salud Dental')

@push('css')
<link href="{{asset('assets/frontend/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="breadcumb-area bg-img bg-gradient-overlay" style="background-image: url(../assets/frontend/images/bg-img/12.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h2 class="title">Sobre Nosotros</h2>
            </div>
        </div>
    </div>
</div>


<section class="dento-about-us-area mt-70">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-12 col-md-6">
                <div class="about-us-thumbnail mb-50">
                <img src="{{asset('assets/frontend/images/bg-img/15.jpg')}}" alt="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="about-us-content mb-50">

                    <div class="section-heading">
                        <h2>Sobre nosotros</h2>
                        <div class="line"></div>
                    </div>
                    <p style="text-align:justify;">Nuestra clínica incorpora tecnología moderna para una excelente realización de los tratamientos de nuestros pacientes.</p>
                    <p style="text-align:justify;">Nuestro compromiso es ofrecer al paciente una atención personalizada y de alta calidad con los medios precisos en unas modernas 
                    instalaciones, adaptándonos a las necesidades que se demanden en cada caso, con visión a futuro y un objeto de mejora continua.</p>
                    <div class="single-skills-area mt-30">
                        <h6>Experiencia</h6>
                        <div id="bar1" class="barfiller">
                            <span class="tip"></span>
                            <span class="fill" data-percentage="100"></span>
                        </div>
                    </div>

                    <div class="single-skills-area mt-30">
                        <h6>Equipos Modernos</h6>
                        <div id="bar2" class="barfiller">
                            <span class="tip"></span>
                            <span class="fill" data-percentage="100"></span>
                        </div>
                    </div>

                    <div class="single-skills-area mt-30">
                        <h6>Personal amigable</h6>
                        <div id="bar3" class="barfiller">
                            <span class="tip"></span>
                            <span class="fill" data-percentage="100"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="dento-border clearfix"></div>
</div>

<section class="dento-cta-area">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cta text-center mt-50 mb-100">
                    <i class="icon_genius"></i>
                    <h2><span class="counter">28</span></h2>
                    <h5>Años de Experiencia</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cta text-center mt-50 mb-100">
                    <i class="icon_heart_alt"></i>
                    <h2><span class="counter">300</span>+</h2>
                    <h5>Pacientes alegres</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cta text-center mt-50 mb-100">
                    <i class="icon_book_alt"></i>
                    <h2><span class="counter">25</span>+</h2>
                    <h5>Certificados</h5>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cta text-center mt-50 mb-100">
                    <i class="icon_id"></i>
<<<<<<< HEAD
                    <h2><span class="counter">1</span></h2>
=======
                    <h2><span class="counter">3</span></h2>
>>>>>>> c7dcd2e10fee720d7f97b476801f5e3945c0d129
                    <h5>Dentistas</h5>
                </div>
            </div>
        </div>
    </div>
</section>


<<<<<<< HEAD
<section class="dentist-area section-padding-100-0" align="center">
    <div class="container" align="center">
=======
<section class="dentist-area section-padding-100-0">
    <div class="container">
>>>>>>> c7dcd2e10fee720d7f97b476801f5e3945c0d129
        <div class="row">

            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Nuestros Dentistas</h2>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="row">

<<<<<<< HEAD
            <div class="col-12" align="center">
=======
            <div class="col-12 col-sm-6 col-md-4">
>>>>>>> c7dcd2e10fee720d7f97b476801f5e3945c0d129
                <div class="single-dentist-area mb-100">
                    <img src="{{asset('assets/frontend/images/bg-img/dentista1.png')}}" alt="">
                    <div class="dentist-content">

                        <div class="dentist-info bg-gradient-overlay">
<<<<<<< HEAD
                            <h5>Elvis Marisela Chamagua de Castillo</h5>
=======
                            <h5>Vanessa Morataya</h5>
>>>>>>> c7dcd2e10fee720d7f97b476801f5e3945c0d129
                            <p>Dentista General</p>
                        </div>
                    </div>
                </div>
            </div>

<<<<<<< HEAD
=======
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single-dentist-area mb-100">
                <img src="{{asset('assets/frontend/images/bg-img/dentista2.png')}}" alt="">

                    <div class="dentist-content">

                        <div class="dentist-info bg-gradient-overlay">
                            <h5>Ricardo Urrutia</h5>
                            <p>Ortodoncista</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="single-dentist-area mb-100">
                    <img src="{{asset('assets/frontend/images/bg-img/dentista1.png')}}" alt="">
                    <div class="dentist-content">

                        <div class="dentist-info bg-gradient-overlay">
                            <h5>Gabriela Peña</h5>
                            <p>Endodoncista</p>
                        </div>
                    </div>
                </div>
            </div>
>>>>>>> c7dcd2e10fee720d7f97b476801f5e3945c0d129
        </div>
    </div>
</section>


@endsection

@push('js')

@endpush
