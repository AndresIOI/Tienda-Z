@extends('layouts.dashboard')
@section('contenido')
<div class="contenedor seccion">
    <form action="{{route('producto.store')}}" method="POST" class="formulario" enctype="multipart/form-data">
        @csrf
        <div class="contenido-formulario">
                <h2>Formulario de Creacion de Producto</h2>
                <label for="">SKU</label>
                <input name="sku" type="text" required>
                <label for="">Nombre del producto</label>
                <input name="nombre" type="text" required>
                <label for="">Tipo de producto</label>
                <select name="categoria" id="">
                    <option value="select">Seleccione el tipo del producto</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
                <label for="">Precio del producto</label>
                <input name="precio" type="text" required>
                <label for="">Imagen del producto</label>
                <input name="img" required type="file" src="" alt="">
                <button class="boton" type="submit">Crear</button>
        </div>
    </form>
</div>
@endsection