@extends('layouts.frontend.app')
@section('title','Login')

@push('css')
<link href="{{asset('assets/frontend/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">

@endpush

@section('content')
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .col-xs-6.col-xs-offset-3 {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        width: 100%;
        margin-bottom: 15px;
    }

    .icon {
        padding: 10px;
        background: #00AEEF;
        color: white;
        min-width: 50px;
        text-align: center;
    }

    .input-field {
        width: 100%;
        padding: 5px;
        outline: none;
    }

    .input-field:focus {
        border: 2px solid #00AEEF;
    }

    /* Set a style for the submit button */
    .btn-login {
        background-color: #00AEEF;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        width: 50%;
        opacity: 0.9;
    }

    .btn:hover {
        opacity: 1;
    }

</style>
<div class="breadcumb-area bg-img bg-gradient-overlay"
    style="background-image: url(../assets/frontend/images/bg-img/12.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h2 class="title">Inicio de sesión</h2>
            </div>
        </div>
    </div>
</div>

<div class="breadcumb--con">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="comment_area clearfix">
    <ol>
        <li class="single_comment_area">
            <div class="comment-content d-flex">
                <div class="comment-author">
                </div>
                <div class="container">
                    <div class="row">


                        <div class="col-lg-8 col-md-12">
                            <div class="post-wrapper">
                                <div class="card-body">

                                    @if (session('message'))
                                    <div class="col-xs-6 col-xs-offset-6">

                                        <div class="alert alert-danger"
                                            style="justify-content: center;align-items: center;">
                                            {{ session('message') }}
                                        </div>
                                    </div>

                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group text-center"
                                            style="justify-content: center;align-items: center;">
                                            <div class="col-xs-6 col-xs-offset-6">
                                                <label for="email"
                                                    style="font-family:Montserrat;">{{ __('Correo Electrónico') }}</label>
                                            </div>

                                            <div class="col-xs-6 col-xs-offset-3">
                                                <i class="fa fa-envelope icon"></i>
                                                <input style="font-family:Montserrat;" id="email" type="text"
                                                    class="input-field" name="email" value="{{ old('email') }}"
                                                    pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                                                    title="Ingrese un correo electrónico valido" required
                                                    autocomplete="email">
                                            </div>

                                            @error('email')
                                            <p>
                                                <strong>{{ $message }}</strong>
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="form-group text-center">
                                            <div class="col-xs-6 col-xs-offset-6">
                                                <label for="password"
                                                    style="font-family:Montserrat;">{{ __('Contraseña') }}</label>
                                            </div>

                                            <div class="col-xs-6 col-xs-offset-3">
                                                <i class="fa fa-key icon"></i>
                                                <input style="font-family:Montserrat;" id="contraseña" type="password"
                                                    class="input-field" name="password" required
                                                    autocomplete="new-password">
                                            </div>

                                            @error('password')
                                            <p>
                                                <strong>{{ $message }}</strong>
                                            </p>
                                            @enderror
                                        </div>


                                        <div class="form-group text-center">
                                            <div class="col-xs-6 col-xs-offset-6">
                                                <div class="row justify-content-center">
                                                    <button style="font-family:Montserrat;" type="submit"
                                                        class="btn-login btn-primary">
                                                        {{ __('Iniciar sesión') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="form-group text-center">
                                            <div class="col-xs-6 col-xs-offset-6">
                                                <div class="row justify-content-center">
                                                    @if (Route::has('password.request'))
                                                    <a style="font-family:Montserrat;" class="btn-login btn-primary"
                                                        href="{{ route('password.request') }}">
                                                        {{ __('¿Olvidó su contraseña?') }}
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                </form>
                            </div><!-- post-wrapper -->
                        </div><!-- col-sm-8 col-sm-offset-2 -->
                    </div><!-- row -->

                </div><!-- container -->
            </div>
</div>
</li>
</ol>
</div>
<div class="breadcumb--con">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
