<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class DashboardController extends Controller
{
    //
    public function index(){
        $consolas = Producto::where('categoria_id',1)->count();
        $videojuegos = Producto::where('categoria_id',2)->count();
        return view('dashboard.index',compact('consolas','videojuegos'));
    }
}
