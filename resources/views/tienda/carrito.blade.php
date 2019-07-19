@extends('layouts.tienda')
@section('header')
<header class="header-carrito">
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
        <div class="header-mensaje-general contenedor">
            <div class="contenido-mensaje-general">
                <h1>Carrito</h1>
            </div>   
        </div>
    </header>
@endsection
@section('contenido')
<section class="contenedor seccion">
        <div class="barra-general">
            <h1>Carrito</h1>
            <a href="{{ route('cart-trash') }}" class="boton-trash-cart">Vaciar Carrito</a>
        </div>
        <div class="linea"></div>
        <div class="carrito">
            <table>
                <thead>
                    <tr>
                        <td>Imagen</td>
                        <td>Nombre de Producto</td>
                        <td>Cantidad</td>
                        <td>Precio Unitario</td>
                        <td>Total</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @if (count($cart))
                    @foreach ($cart as $producto)
                        <tr>
                            <td><img src="{{ asset('img/'.$producto->img) }}" alt=""></td>
                            <td>{{ $producto->nombre}}</td>
                            <td>
                                <input 
                                    type="number"
                                    min="1"
                                    max="{{$producto->cantidad}}"
                                    value="{{ $producto->quantity }}"
                                    id="product_{{ $producto->id }}"
                                    
                                >
                                <a 
                                    href="#" 
                                    class="btn btn-warning btn-update-item"
                                    id="actualizar"
                                    data-href="{{ route('cart-update', $producto->id) }}"
                                    data-id = "{{ $producto->id }}"
                                >
                                <i class="fas fa-sync"></i>
                                </a>  
                            </td>
                            <td>{{ number_format($producto->precio,2) }}</td>
                            <td>{{ number_format($producto->precio * $producto->quantity,2) }}</td>
                            <td>		
                                <a href="{{ route('cart-delete', $producto->id) }}" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <td></td>
                    <td></td>
                    <td style="padding:20px 0;">No hay productos en Carrito</td>
                    @endif
            </table>
        </div>
        <div class="linea"></div>
        <div class="totales">
            <div class="totales-flex">
                    <div class="total-flex">
                            <h3>Subtotal: </h3>
                            <p>$ {{ number_format($total,2)}}</p>
                        </div>
                        <div class="total-flex">
                            <h3>Envio: </h3>
                            <p>$100</p>
                        </div>
                        <div class="total-flex">
                            <h3>Total: </h3>
                            <p>$ {{number_format($total + 100,2)}}</p>
                        </div>
            </div>
            <a href="{{ route('payment') }}" class="boton color-negro borde-negro">Pagar con Paypal</a>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
    $(".btn-update-item").on('click',function(e){
        var id = $(this).data('id');
        var href = $(this).data('href');
        var quantity = $("#product_"+ id).val();
            quantity=Number.parseFloat(quantity);
                    
                e.preventDefault();
                window.location.href = href + "/" + quantity;


        });

});</script>
@endsection