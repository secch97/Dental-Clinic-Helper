@extends('layouts.frontend.app')
@section('title', 'Clinica de Salud Dental')

@push('css')
<link href="{{asset('assets/frontend/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<section class="welcome-area">

    <div class="welcome-welcome-slide bg-img bg-gradient-overlay jarallax"
        style="background-image: url(../assets/frontend/images/bg-img/1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="welcome-text text-center">
                        <h2 data-animation="fadeInUp" data-delay="100ms">
                            Creemos que todos deberían tener fácil acceso a una excelente atención dental
                        </h2>
                        <p data-animation="fadeInUp" data-delay="300ms">
                            Nuestro objetivo para cada paciente es crear una hermosa sonrisa que se pueda disfrutar toda
                            la vida.
                        </p>
                        <div class="welcome-btn-group">
                            <a href="{{ route('Contacto') }}" class="btn dento-btn mx-2" data-animation="fadeInUp" data-delay="500ms">
                                Reserve su cita
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dento-contact-area mt-50 mb-50">
    <div class="container">
        <div class="row">
        </div>
        <div class="row">

            <div class="col-12 col-md-4">
                <br>
                <br>
                <br>
                <img src="{{asset('assets/frontend/images/core-img/collage.png')}}" alt="">
            </div>

            <div class="col-12 col-md-8">
                <div class="contact-form">

                    <div class="section-heading">
                        <h2>Satisfacción de todas sus necesidades dentales garantizada</h2>
                        <div class="line"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <p style="text-align:justify;">
                                Nuestra clínica dental se dedica a proporcionar la odontología general, familiar y
                                ortodoncia más actualizada.
                                Hemos crecido para proporcionar una instalación amigable para el paciente y sus
                                tratamientos.
                            </p>

                            <p style="text-align:justify;">
                                Nuestra misión es brindar atención de la más alta calidad, comodidad y servicio sin
                                precedentes.
                                Nos comprometemos a brindarle los mejores resultados, ya sea:
                                <li>
                                    <p>
                                        • Creando la sonrisa perfecta
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        • Reconstruyendo toda su boca
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        • Ayudándote a lograr un bienestar total
                                    </p>
                                </li>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials-area section-padding-100 bg-img bg-gradient-overlay jarallax clearfix"
    style="background-image: url('../assets/frontend/images/bg-img/13.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="testimonials-slides owl-carousel">

                    <div class="single-testimonial-slide d-flex align-items-center">

                        <div class="testimonial-thumb">
                        <img src="{{asset('assets/frontend/images/Perfil/saul.jpg')}}" alt="">
                        </div>

                        <div class="testimonial-content">
                            <h5>“Había estado evitando al dentista durante años debido a malas 
                            experiencias. La primera vez que asistí a la clínica me encontré
                            con un dentista muy tranquilo y servicial. Desde entonces he 
                            sido un paciente gracias al excelente trato y asesoramiento.”</h5>
                            <h6>Saúl Castillo</h6>
                            <p>Paciente</p>
                        </div>
                    </div>

                    <div class="single-testimonial-slide d-flex align-items-center">

                        <div class="testimonial-thumb">
                            <img src="{{asset('assets/frontend/images/Perfil/javier.jpg')}}" alt="">
                        </div>

                        <div class="testimonial-content">
                            <h5>“He estado buscando un dentista de buena calidad. Este lugar tenía excelentes críticas, así que me arriesgué. 
                            ¡Nunca pensé que estaría emocionado por mi cita con el dentista! El personal es realmente amable y me siento 
                            bienvenido cada vez que entro por esas puertas.”</h5>
                            <h6>Javier Melara</h6>
                            <p>Paciente</p>
                        </div>
                    </div>

                    
                    <div class="single-testimonial-slide d-flex align-items-center">

                        <div class="testimonial-thumb">
                            <img src="{{asset('assets/frontend/images/Perfil/david.jpg')}}" alt="">
                        </div>

                        <div class="testimonial-content">
                            <h5>“¡Amable personal!, ¡Siempre a tiempo!, ¡Ambiente agradable y limpio! Definitivamente recomendaría esta clínica a otros.”</h5>
                            <h6>David Iraheta</h6>
                            <p>Paciente</p>
                        </div>
                    </div>

                    
                    <div class="single-testimonial-slide d-flex align-items-center">

                        <div class="testimonial-thumb">
                            <img src="{{asset('assets/frontend/images/Perfil/mauricio.jpg')}}" alt="">
                        </div>

                        <div class="testimonial-content">
                            <h5>“Gran experiencia en general. La atención es muy minuciosa, siempre a tiempo y extremadamente agradable. 
                            La mayoría puede no disfrutar de sus experiencias de odontología, pero recomiendo esta clínica a todos. No encontrarás
                            una mejor clínica que esta.”</h5>
                            <h6>Mauricio Saca</h6>
                            <p>Paciente</p>
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dento-contact-area">
    <div class="container">
        <div class="row">
        </div>
        <div class="row">

            <div class="col-12 col-md-5">
                <div class="contact-form">

                    <div class="section-heading">
                        <h2>¿Por qué elegirnos?</h2>
                        <div class="line"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <p style="text-align:justify;">
                                Nuestros servicios integrales le permiten recibir toda la atención dental
                                necesaria aquí en nuestra clínica de salud dental, desde limpiezas y empastes
                                dentales hasta implantes y extracciones dentales.
                            </p>

                            <p style="text-align:justify;">
                                Su plan de tratamiento coincidirá perfectamente con sus necesidades,
                                estilo de vida y objetivos. Incluso si han pasado años desde la última vez que visitó al
                                dentista,
                                podemos ayudarlo. Nuestra cómoda clínica, equipo compasivo y tratamientos mínimamente
                                invasivos
                                lo ayudarán a sentirse completamente a gusto.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-7 mt-50 mb-50">
                <section class="dento-services-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-5">
                                <div class="single-service--area text-center mb-50">
                                    <div class="icon--">
                                        <img src="{{asset('assets/frontend/images/core-img/medal.png')}}" alt="">
                                    </div>
                                    <h5 style="text-align:center;">Compromiso con la excelencia</h5>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-5">
                                <div class="single-service--area text-center mb-50">
                                    <div class="icon--">
                                        <img src="{{asset('assets/frontend/images/core-img/tecnologia.png')}}" alt="">
                                    </div>
                                    <h5 style="text-align:center;">Tecnología de vanguardia</h5>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-5">
                                <div class="single-service--area text-center mb-50">
                                    <div class="icon--">
                                        <img src="{{asset('assets/frontend/images/core-img/cliente.png')}}" alt="">
                                    </div>
                                    <h5 style="text-align:center;">Enfocada en la atención al cliente</h5>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-5">
                                <div class="single-service--area text-center mb-50">
                                    <div class="icon--">
                                        <img src="{{asset('assets/frontend/images/core-img/plan.png')}}" alt="">
                                    </div>
                                    <h5 style="text-align:center;">Planes de tratamiento personalizados</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')

@endpush
