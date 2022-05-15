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
                <h2 class="title">Contacto</h2>
            </div>
        </div>
    </div>
</div>

<section class="dento-contact-area mt-50 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="google-maps mb-100">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1938.0594535829764!2d-89.2156331534069!3d13.711247420731592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f633066a1b56ebb%3A0xa77693a761e19f49!2sCalle%20Los%20Sisimiles%203007%2C%20San%20Salvador!5e0!3m2!1ses-419!2ssv!4v1583720487978!5m2!1ses-419!2ssv"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-12 col-md-4">
                <div class="contact-information">
                    <h5>Dirección</h5>
                    <p>CP, 1101 Calle Los Sisimiles, #3007, Colonia Miramonte, San Salvador</p>
                    <h5>Télefono</h5>
                    <p>(503) 2290-1865</p>
                    <h5>Correo Electrónico</h5>
                    <p>info.miramontedental@gmail.com</p>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="contact-form">

                    <section
                        class="book-an-oppointment-area section-padding-100 bg-img bg-gradient-overlay jarallax clearfix"
                        style="background-image: url('../assets/frontend/images/bg-img/12.jpg');">
                        <div class="container">
                            <div class="row">

                                <div class="col-12">
                                    <div class="section-heading text-center white">
                                        @guest
                                        @if (Route::has('register'))
                                        <h2>Reserve su cita</h2>
                                        <h2>(Se necesita iniciar sesión)</h2>
                                        <div class="line"></div>
                                        @endif
                                        @else
                                        @if (Route::has('register'))
                                        <h2>Reserve su cita</h2>
                                        <div class="line"></div>
                                        @endif
                                        @endguest
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">

                                    <div class="appointment-form">
                                        <form autocomplete="off" method="post" id="formreservarcita"
                                            action="{{route('ReservarCita')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @guest
                                                    @if (Route::has('register'))
                                                    <div class="form-group mb-30">
                                                        <input type="text" name="nombreReserva" id="nombreReserva"
                                                            class="form-control" placeholder="Nombre Completo" required
                                                            disabled>
                                                    </div>
                                                    @endif
                                                    @else
                                                    @if (Auth::user()->Role_id==2)
                                                    <div class="form-group mb-30">
                                                        <input type="hidden" name="idUserReserva" id="idUserReserva"
                                                            class="form-control" value="{{Auth::User()->User_id}}">
                                                        <input type="text" name="nombreReserva" id="nombreReserva"
                                                            class="form-control" placeholder="Nombre Completo"
                                                            value="{{Auth::User()->nombre}}" required readonly>
                                                    </div>
                                                    @endif
                                                    @endguest

                                                </div>
                                                <div class="col-md-6">
                                                    @guest
                                                    @if (Route::has('register'))
                                                    <div class="form-group mb-30">
                                                        <input type="text" name="telefonoReservaCita"
                                                            id="telefonoReservaCita" class="form-control"
                                                            placeholder="Télefono"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                            maxlength="8" pattern="[267][0-9]{7}" required disabled>
                                                    </div>
                                                    @endif
                                                    @else
                                                    @if (Auth::user()->Role_id==2)
                                                    <div class="form-group mb-30">
                                                        <input type="text" name="telefonoReservaCita"
                                                            id="telefonoReservaCita" class="form-control"
                                                            placeholder="Télefono"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                            maxlength="8" pattern="[267][0-9]{7}" required>
                                                    </div>
                                                    @endif
                                                    @endguest

                                                </div>
                                                <div class="col-md-6">
                                                    @guest
                                                    @if (Route::has('register'))
                                                    <div class="form-group mb-30">
                                                        <input type="email" name="your-email" class="form-control"
                                                            placeholder="Correo Electrónico" required disabled>
                                                    </div>
                                                    @endif
                                                    @else
                                                    @if (Auth::user()->Role_id==2)
                                                    <div class="form-group mb-30">
                                                        <input type="email" name="your-email" class="form-control"
                                                            placeholder="Correo Electrónico"
                                                            value="{{Auth::User()->email}}" required readonly>
                                                    </div>
                                                    @endif
                                                    @endguest
                                                </div>
                                                <div class="col-md-6">
                                                    @guest
                                                    @if (Route::has('register'))

                                                    <div class="form-group mb-30">
                                                        <input type="text" name="direccionReservaCita"
                                                            id="direccionReservaCita" class="form-control"
                                                            placeholder="Dirección" 
                                                            maxlength="100"
                                                            required disabled>
                                                    </div>
                                                    @endif
                                                    @else
                                                    @if (Auth::user()->Role_id==2)
                                                    <div class="form-group mb-30">
                                                        <input type="text" name="direccionReservaCita"
                                                            id="direccionReservaCita" class="form-control"
                                                            placeholder="Dirección" 
                                                            maxlength="100"
                                                            required>
                                                    </div>
                                                    @endif
                                                    @endguest

                                                </div>
                                                <div class="col-md-6">
                                                    @guest
                                                    @if (Route::has('register'))
                                                    <div class="form-group mb-30">
                                                        <input type="date" id="fechaReservaCita" name="fechaReservaCita"
                                                            class="form-control"
                                                            value="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                                                            min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required
                                                            disabled>
                                                    </div>
                                                    @endif
                                                    @else
                                                    @if (Auth::user()->Role_id==2)
                                                    <div class="form-group mb-30">
                                                        <input type="date" id="fechaReservaCita" name="fechaReservaCita"
                                                            class="form-control"
                                                            value="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                                                            min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                                    </div>
                                                    @endif
                                                    @endguest
                                                </div>
                                                <div class="col-md-6">
                                                    @guest
                                                    @if (Route::has('register'))
                                                    <div class="form-group mb-30">
                                                        <select name="horaReservaCita" id="horaReservaCita"
                                                            class="form-control" required disabled>
                                                            <option selected disabled value="">Escoja su horario
                                                            </option>
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
                                                    @endif
                                                    @else
                                                    @if (Auth::user()->Role_id==2)
                                                    <div class="form-group mb-30">
                                                        <select name="horaReservaCita" id="horaReservaCita"
                                                            class="form-control" required>
                                                            <option selected disabled value="">Escoja su horario
                                                            </option>
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
                                                    @endif
                                                    @endguest
                                                </div>
                                                <div class="col-12">
                                                    @guest
                                                    @if (Route::has('register'))
                                                    <div class="form-group mb-30">
                                                        <textarea name="descripcionReservaCita"
                                                            id="descripcionReservaCita" class="form-control"
                                                            placeholder="Escriba el motivo de la cita" 
                                                            maxlength="100"
                                                            required
                                                            disabled></textarea>
                                                    </div>
                                                    @endif
                                                    @else
                                                    @if (Auth::user()->Role_id==2)
                                                    <div class="form-group mb-30">
                                                        <textarea name="descripcionReservaCita"
                                                            id="descripcionReservaCita" class="form-control"
                                                            placeholder="Escriba el motivo de la cita"
                                                            maxlength="100"
                                                            required></textarea>
                                                    </div>
                                                    @endif
                                                    @endguest

                                                </div>
                                                <div class="col-12 text-center">
                                                    @guest
                                                    @if (Route::has('register'))
                                                    <button type="submit" class="btn dento-btn" disabled>Reservar
                                                        ahora</button>
                                                    @endif
                                                    @else
                                                    @if (Auth::user()->Role_id==2)
                                                    <button type="submit" class="btn dento-btn">Reservar ahora</button>
                                                    @endif
                                                    @endguest
                                                </div>
                                            </div>
                                        </form>
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


@endsection

@push('js')

@endpush
