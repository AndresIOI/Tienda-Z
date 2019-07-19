@extends('layouts.tienda')
@section('header')
<header class="header-sitio">
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
        <div class="header-mensaje contenedor">
            <div class="contenido-mensaje">
                <h4>Bienvenido a la <span>Tienda Z</span></h4>
                <h1>La mejor tienda para comprar videojuegos y consolas en México</h1>
                <div class="botones-header">
                    <a href="videojuegos.html" class="boton">Videojuegos</a>
                    <a href="consolas.html" class="boton">Consolas</a>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('contenido')
<section class="seccion-productos-inicio seccion">
        <div class="seccion-nintendo contenedor">
            <div class="titulo-nintendo">
                <h2>Ultimas Consolas Agregadas</h2>
            </div>
            <div class="productos">
                @foreach ($consolas as $consola)
                <div class="producto">
                    <a href=""><img src="{{ asset('img/'.$consola->img) }}"></a>
                    <h4>{{$consola->nombre}}</h4>
                    <p>$ {{number_format($consola->precio,2)}}</p>
                    @if ($consola->cantidad == 0)
                    <a>Producto fuera de stock</a>
                    @else
                    <a href="{{ route('cart-add',$consola->id) }}">Agregar al carrito</a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        <div class="seccion-xbox contenedor">
                <div class="titulo-xbox">
                    <h2>Ultimos Videojuegos Agregados</h2>
                </div>
                <div class="productos">
                    @foreach ($videojuegos as $videojuego)
                    <div class="producto">
                        <a href=""><img src="{{ asset('img/'.$videojuego->img) }}"></a>
                        <h4>{{$videojuego->nombre}}</h4>
                        <p>$ {{number_format($videojuego->precio,2)}}</p>
                        @if ($videojuego->cantidad == 0)
                        <a>Producto fuera de stock</a>
                        @else
                        <a href="{{ route('cart-add',$videojuego->id) }}">Agregar al carrito</a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
    </section>
@endsection