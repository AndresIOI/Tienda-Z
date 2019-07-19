@extends('layouts.tienda')
@section('header')
<header class="header-inicio_sesion">
        <div class="barra-fixed">
            <div class="barra-navegacion">
                <nav class="navegacion">
                    <div class="logo-navegacion">
                        <a href="{{ route('home') }}"><h1>Tienda <span>Z</span></h1></a>
                    </div>
                    <div class="enlaces-navegacion">
                            <a href="{{ route('home') }}">Inicio</a>
                            <a href="{{ route('videojuegos') }}">Videojuegos</a>
                            <a href="{{ route('consolas') }}">Consolas</a>
                            <a href="{{ route('cart-show') }}">Carrito</a>
                            @if (Route::has('login'))
                                @auth
                                    <div class="dropdown">
                                        <a href="">{{ Auth::user()->name }}</a>
                                        <div class="dropdown-content">
                                            <a href="#" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Cerrar Sesion</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('inicio_sesion') }}">Iniciar Sesion</a>
                                    @if (Route::has('registro_usuario'))
                                        <a href="{{ route('registro_usuario') }}">Registrarse</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                </nav>
            </div>
        </div>
        <div class="header-mensaje-general contenedor">
            <div class="contenido-mensaje-general">
                <h1>Registro de usuario</h1>
            </div>   
        </div>
    </header>
    
@endsection
@section('contenido')
<div class="contenedor seccion">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-verde btn-lg">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection