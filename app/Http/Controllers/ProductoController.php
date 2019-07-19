<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return view('dashboard.producto.table_show', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('dashboard.producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->file('img')){
            $file = $request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
        }
        $producto = new Producto();
        $producto->sku = $request->sku;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cantidad = 0;
        $producto->categoria_id = $request->categoria;
        $producto->img = $name;
        $producto->save();
        
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('dashboard.producto.edit',compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $producto = Producto::find($id);
        $producto->sku = $request->sku;
        $producto->nombre = $request->nombre;
        $producto->categoria_id = $request->categoria;
        $producto->precio = $request->precio;
        if($request->file('img')){
            \File::delete(public_path('img/'.$producto->img));
            $file = $request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
            $producto->img = $name;
        }
        $producto->update();
        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addQuantity($id){
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('dashboard.producto.addCantidad',compact('producto','categorias'));
    }

    public function updateQuantity(Request $request, $id){
        $producto = Producto::find($id);
        $producto->cantidad = $request->cantidad;
        $producto->update();
        return redirect()->route('producto.index');
    }
    public function cantidad($id){
        return Producto::find($id)->cantidad;
    }
}
