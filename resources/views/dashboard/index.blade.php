@extends('layouts.dashboard')
@section('contenido')
<div class="h seccion">
    <div class="main-cards">
        <div class="card bg-videojuegos">
          <h3>Productos Totales : <span>{{ $consolas + $videojuegos}}</span></h3>
        </div>
        <div class="card bg-consolas">
          <h3>Productos Tipo Consolas: <span>{{$consolas}}</span></h3>
        </div>
        <div class="card bg-videojuego">
          <h3>Productos Tipo Videojuegos: <span>{{$videojuegos}}</span></h3>
        </div>
    </div>
 </div>
@endsection