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
                <h2>Nintendo Switch</h2>
            </div>
            <div class="productos">
                <div class="producto">
                    <a href=""><img src="img/nintendo_switch.jpg"></a>
                    <h4>Nintendo Switch</h4>
                    <p>Precio: $8,000</p>
                    <a href="">Agregar al carrito</a>
                </div>
                <div class="producto">
                    <a href=""><img src="img/mario_bros.jpg"></a>
                    <h4>Mario Maker 2</h4>
                    <p>Precio: $8,000</p>
                    <a href="">Agregar al carrito</a>
                </div>
                <div class="producto">
                    <a href=""><img src="img/pokemon.jpg"></a>
                    <h4>Pokemon Let's Go - Pikachu</h4>
                    <p>Precio: $8,000</p>
                    <a href="">Agregar al carrito</a>
                </div>
            </div>
        </div>
        <div class="seccion-xbox contenedor">
                <div class="titulo-xbox">
                    <h2>Xbox One</h2>
                </div>
                <div class="productos">
                    <div class="producto">
                        <a href=""><img src="img/xbox.jpg"></a>
                        <h4>Xbox Ones</h4>
                        <p>Precio: $8,000</p>
                        <a href="">Agregar al carrito</a>
                    </div>
                    <div class="producto">
                        <a href=""><img src="img/batV.jpg"></a>
                        <h4>Battlefield V</h4>
                        <p>Precio: $8,000</p>
                        <a href="">Agregar al carrito</a>
                    </div>
                    <div class="producto">
                        <a href=""><img src="img/darksider.jpg"></a>
                        <h4>Darksaiders</h4>
                        <p>Precio: $8,000</p>
                        <a href="">Agregar al carrito</a>
                    </div>
                </div>
            </div>
            <div class="seccion-playstation contenedor">
                    <div class="titulo-playstation">
                        <h2>Playstation 4</h2>
                    </div>
                    <div class="productos">
                        <div class="producto">
                            <a href=""><img src="img/playstation.jpg"></a>
                            <h4>Playstation 4 Pro</h4>
                            <p>Precio: $8,000</p>
                            <a href="">Agregar al carrito</a>
                        </div>
                        <div class="producto">
                            <a href=""><img src="img/destiny.jpg"></a>
                            <h4>Destiny 2</h4>
                            <p>Precio: $8,000</p>
                            <a href="">Agregar al carrito</a>
                        </div>
                        <div class="producto">
                            <a href=""><img src="img/ark.jpg"></a>
                            <h4>ARK Survival Evolved</h4>
                            <p>Precio: $8,000</p>
                            <a href="">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
    </section>
@endsection