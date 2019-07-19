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
                <h1>Iniciar Sesion</h1>
            </div>   
        </div>
    </header>
    
@endsection
@section('contenido')
<div class="contenedor seccion inicio_sesion">
        <div class="row row_inicio">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inicio de sesion') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-lg bg-verde">
                                        {{ __('Iniciar sesion') }}
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