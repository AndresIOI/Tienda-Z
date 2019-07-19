<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class CarritoController extends Controller
{
    //
    public function __construct(){
        if(!\Session::has('cart')) \Session::put('cart',array());
    }

    /* Mostrar Carrtio */
    public function show(){
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('tienda.carrito',compact('cart', 'total'));
    }

    /* Agregar Producto */
    public function add($id){
        $producto = Producto::where('id',$id)->first();
        $cart = \Session::get('cart');
        $producto->quantity = 1;
        $cart[$producto->id] = $producto;
        \Session::put('cart',$cart);
        return redirect()->route('cart-show');
    }

    /* Eliminar Producto */
    public function delete($id){
        $producto = Producto::where('id',$id)->first();
        $cart = \Session::get('cart');
        unset($cart[$producto->id]);
        \Session::put('cart',$cart);
        return redirect()->route('cart-show');
    }

    /* Actualizar cantidad */
    public function update($id, $quantity){
        $producto = Producto::where('id',$id)->first();
        $cart = \Session::get('cart');
        $cart[$producto->id]->quantity = $quantity;
        $cart = \Session::put('cart',$cart);
        return redirect()->route('cart-show');
    }

    /* Vaciar Carrito */
    public function trash(){
        \Session::forget('cart');
        return redirect()->route('cart-show');
    }

    /* Total */
    public function total(){
        $cart = \Session::get('cart');
        $total = 0;
        foreach ($cart as $producto) {
            $total += $producto->precio * $producto->quantity;
        }
        return $total;
    }

    /* Detalles del pedido */
    public function orderDetail(){
        if(count(\Session::get('cart')) <= 0) return redirect()->route('home');
        $cart = \Session::get('cart');
        $total = $this->total();
        return view('tienda.detalle-orden',compact('cart','total'));
    }
}
