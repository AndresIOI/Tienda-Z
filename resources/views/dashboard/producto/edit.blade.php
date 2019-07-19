@extends('layouts.dashboard')
@section('contenido')
<div class="contenedor seccion">
    <form action="{{route('producto.update',$producto->id)}}" method="POST" class="formulario" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="contenido-formulario">
                <h2>Formulario para Editar Producto</h2>
                <label for="">Imagen</label>
                <img src="{{ asset('img/'.$producto->img) }}" class="img-edit" alt="">
                <label for="">SKU</label>
                <input name="sku" type="text" value="{{ $producto->sku }}" required>
                <label for="">Nombre del producto</label>
                <input name="nombre" type="text" value="{{ $producto->nombre }}" required>
                <label for="">Tipo de producto</label>
                <select name="categoria" id="">
                    <option value="{{ $producto->categoria_id }}">{{ $producto->categoria->categoria }}</option>
                    @foreach ($categorias as $categoria)
                    @if ($producto->categoria->categoria != $categoria->categoria)
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                    @endif
                    @endforeach
                </select>
                <label for="">Precio del producto</label>
                <input name="precio" type="text" value="{{ $producto->precio }}" required>
                <label for="">Imagen del producto</label>
                <input name="img"  type="file" src="" alt="">
                <button class="boton" type="submit">Crear</button>
        </div>
    </form>
</div>
@endsection