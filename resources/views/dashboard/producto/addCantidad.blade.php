@extends('layouts.dashboard')
@section('contenido')
<div class="contenedor seccion">
    <form action="{{route('updateQuantity',$producto->id)}}" method="POST" class="formulario">
        @csrf
        <div class="contenido-formulario">
                <h2>Formulario para Agregar Cantidad de Producto</h2>
                <label for="">Imagen</label>
                <img src="{{ asset('img/'.$producto->img) }}" class="img-edit" alt="" >
                <label for="">SKU</label>
                <input name="sku" type="text" value="{{ $producto->sku }}" disabled>
                <label for="">Nombre del producto</label>
                <input name="nombre" type="text" value="{{ $producto->nombre }}" disabled>
                <label for="">Cantidad</label>
                <input name="cantidad" type="number" min="0" value="{{ $producto->cantidad }}" required>

                <button class="boton" type="submit">Actualizar Cantidad</button>
        </div>
    </form>
</div>
@endsection