@extends('layouts.frontend.app')
@section('title','Reestablecer')

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
    .btn-reestablecer {
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
                <h2 class="title">Reestablecer contraseña</h2>
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
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="form-group text-center"  style="justify-content: center;align-items: center;">
                                        <div class="col-xs-6 col-xs-offset-6">
                                            <label style="font-family:Montserrat;"
                                                for="email">{{ __('Correo Electrónico') }}</label>
                                        </div>
                                            <div class="col-xs-6 col-xs-offset-3">
                                                <i class="fa fa-envelope icon"></i>
                                                <input style="font-family:Montserrat;" id="email" type="email"
                                                    class="input-field" name="email" value="{{ old('email') }}" required
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

                                            <label style="font-family:Montserrat;"
                                                for="password">{{ __('Contraseña') }}</label>
                                        </div>
                                            <div class="col-xs-6 col-xs-offset-3">
                                                <i class="fa fa-key icon"></i>

                                                <input style="font-family:Montserrat;"
                                                    title="Su contraseña debe poseer almenos 8 caracteres de longitud, contener al menos una mayúscula, una minúscula y un número"
                                                    id="contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                    type="password" class="input-field" name="password" required
                                                    autocomplete="new-password">
                                            </div>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group text-center">
                                        <div class="col-xs-6 col-xs-offset-6">

                                            <label style="font-family:Montserrat;"
                                                for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                                        </div>
                                            <div class="col-xs-6 col-xs-offset-3">
                                                <i class="fa fa-key icon"></i>
                                                <input style="font-family:Montserrat;" id="password-confirm"
                                                    type="password" class="input-field" name="password_confirmation"
                                                    required autocomplete="new-password">
                                            </div>
                                        </div>


                                        <div class="form-group text-center">
                                        <div class="col-xs-6 col-xs-offset-6">
                                                <div class="row justify-content-center">
                                                    <button style="font-family:Montserrat;" type="submit"
                                                        class="btn-reestablecer btn-primary">
                                                        {{ __('Reestablecer contraseña') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ol>
</div>





@endsection