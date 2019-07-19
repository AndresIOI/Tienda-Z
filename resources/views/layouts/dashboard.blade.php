<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">     
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://kit.fontawesome.com/a81a1eb85c.js"></script>
    <title>Dashboard - Tienda Z</title>
</head>
<body>
    <div class="grid-container">        
       <header class="header">
          <div><i class="fas fa-shopping-bag"></i><a href="{{route('dashboard')}}" class="header__title">Dashboard - Tienda Z</a></div>

         <div class="header__links">
            User - Admin
            <a href="{{route('home')}}">Ir a Tienda</a>
        </div>
         
       </header>

       <main class="main">     
         <div class="main-overview">
           <div class="overviewcard bg-rojo">
             <div class="overviewcard__icon">Crear Producto</div>
             <div class="overviewcard__info"><a href="{{ route('registro-producto') }}">Crear</a></div>
           </div>
           <div class="overviewcard bg-amarillo">
             <div class="overviewcard__icon">Ver todos los productos</div>
             <div class="overviewcard__info"><a href="{{ route('producto.index')}}">Ver</a></div>
           </div>
           <div class="overviewcard bg-azul">
             <div class="overviewcard__icon">Overview</div>
             <div class="overviewcard__info">Card</div>
           </div>
           <div class="overviewcard bg-verde">
             <div class="overviewcard__icon">Overview</div>
             <div class="overviewcard__info">Card</div>
           </div>
         </div>

         @yield('contenido')

       </main>
     
       <footer class="footer">
         <div class="footer__copyright">&copy; 2018 MTH</div>
         <div class="footer__signature">Made with love by pure genius</div>
       </footer>
     </div>
     <script src="js/jquery.js"></script>
     <script src="js/main.js"></script>
</body>
</html>