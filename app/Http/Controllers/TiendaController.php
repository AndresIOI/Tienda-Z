<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class TiendaController extends Controller
{
    //
    public function index_videojuegos(){
        $videojuegos = Producto::where('categoria_id',2)->get();
        return view('tienda.videojuegos',compact('videojuegos'));
    }

    public function index_consolas(){
        $consolas = Producto::where('categoria_id',1)->get();
        return view('tienda.consolas',compact('consolas'));
    }

    public function carrito(){
        return view('tienda.carrito');
    }

    public function inicio_sesion(){
        return view('tienda.inicio_sesion');
    }

    public function registro_usuario(){
        return view('tienda.registro_usuario');
    }
}
