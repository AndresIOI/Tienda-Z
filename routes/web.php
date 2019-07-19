<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('tienda.index');
})->name('home');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


/* Rutas de Dasboard */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/registro-producto', 'ProductoController@create')->name('registro-producto');
/* Rutas de Tienda*/
Route::get('/productos/videojuegos','TiendaController@index_videojuegos')->name('videojuegos');
Route::get('/productos/consolas','TiendaController@index_consolas')->name('consolas');
Route::get('/carrito','TiendaController@carrito')->name('carrito');
Route::get('/inicio-sesion','TiendaController@inicio_sesion')->name('inicio_sesion');
Route::get('/registro-usuario', 'TiendaController@registro_usuario')->name('registro_usuario');
/* Rutas de productos */
Route::resource('producto', 'ProductoController');
Route::get('/producto/{id}/addQuantity','ProductoController@addQuantity')->name('addQuantity');
Route::post('/producto/{id}/updateQuantity','ProductoController@updateQuantity')->name('updateQuantity');
/* Rutas de Carrito */
Route::get('cart/show','CarritoController@show')->name('cart-show');
Route::get('cart/add/{product}','CarritoController@add')->name('cart-add');
Route::get('cart/delete/{product}', 'CarritoController@delete')->name('cart-delete');
Route::get('cart/trash','CarritoController@trash')->name('cart-trash');
Route::get('cart/update/{product}/{quantity?}','CarritoController@update')->name('cart-update');
Route::get('order-detail', [
	'middleware' => 'auth',
	'as' => 'order-detail',
	'uses' => 'CarritoController@orderDetail'
]);
/* Rutas de Pago */
//Routes PayPal
Route::get('/payment', 'PaymentController@postPayment')->name('payment');
Route::get('/payment/status', 'PaymentController@getPaymentStatus')->name('payment.status');