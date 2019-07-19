@extends('layouts.tienda')
@section('header')
<header class="header-videojuegos">
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
                        <a href="{{ route('carrito') }}">Carrito</a>
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
                                @if (Auth::user()->rol_id == 2)
                                <a href="{{ route('dashboard') }}">Panel Admin</a>
                                @endif
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
            <h1>videojuegos</h1>
        </div>   
    </div>
</header>
@endsection
@section('contenido')
<section class="contenedor seccion">
        <div class="barra-general">
            <h1>Videojuegos</h1>
            <div class="filtos-busqueda">
                <h6>Ordenar por</h6>
                <select name="" id="">
                    <option value="">Precio de menor a mayor</option>
                    <option value="">Precio de mayor a menor</option>
                    <option value="">Alfabeticamente, A-Z</option>
                    <option value="">Alfabeticamente, Z-A</option>
                    <option value="">Mas Antiguos</option>
                    <option value="">Mas Recientes</option>
                </select>
            </div>
        </div>
        <div class="linea"></div>
        <div class="productos-general">
            @foreach ($videojuegos as $videojuego)
            <div class="producto-general">
                <img src="{{ asset('img/'.$videojuego->img) }}" alt="">
                <h4>{{$videojuego->nombre}}</h4>
                <p>Precio: $ {{number_format($videojuego->precio,2)}}</p>
            <a href="{{ route('cart-add',$videojuego->id) }}">Agregar al carrito</a>
            </div>
            @endforeach
        </div>
        
    </section>
@endsection