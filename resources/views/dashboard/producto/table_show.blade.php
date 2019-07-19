@extends('layouts.dashboard')
@section('contenido')
<div class="contenedor seccion tabla_productos">
    <table>
        <thead>
            <tr>
                <td>Imagen del producto</td>
                <td>SKU</td>
                <td>Nombre del producto</td>
                <td>Tipo de producto</td>
                <td>Precio del producto</td>
                <td>Cantidad</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td><img src="img/{{ $producto->img }}" alt=""></td>
                <td>{{ $producto->sku }}</td>
                <td>{{ $producto->nombre}}</td>
                <td>{{ $producto->categoria->categoria}}</td>
                <td>$ {{ number_format($producto->precio,2)}}</td>
                <td>{{ $producto->cantidad}}</td>
                <td><a href="{{ route('producto.edit',$producto->id)}}"><i class="far fa-edit" title="Editar Producto"></i></a> | <a href="{{ route('addQuantity',$producto->id) }}"><i class="far fa-plus-square" title="Actualizar Cantidad"></i></a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection