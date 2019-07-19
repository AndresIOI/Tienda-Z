<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">     
    <script src="https://kit.fontawesome.com/a81a1eb85c.js"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Tienda Zared</title>
</head>
<body class="sitio">
    @yield('header')
    <main class="contenido-sitio">
        @yield('contenido')
    </main>
    <footer class="footer-sitio">
        <div class="contenido-footer contenedor">
            <div class="footer">
                <h5>Informacion</h5>
                <h6><a href="">Informacion de Envios</a></h6>
                <h6><a href="">Términos y Condiciones</a></h6>
                <h6><a href="">Politicas de privacidad</a></h6>
            </div>
            <div class="footer">
                <h5>Mi Cuenta</h5>
                <h6><a href="">Cuenta</a></h6>
                <h6><a href="">Historial de Pedidos</a></h6>
                <h6><a href="">Carrito de Compras</a></h6>
            </div>
            <div class="footer">
                <h5>Atencion Al Cliente</h5>
                <h6><a href=""> Teléfonos:
                    (0155) 55 12 78 42 Frikiplaza
                    (0155) 76 53 14 82 Coapa</a></h6>
                <h6><a href="">Correo electrónico:
                    correo@games.mx</a></h6>
            </div>
            <div class="footer">
                <h5>Formas De Pago</h5>
                <h6><a href="">Paypal</a></h6>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>