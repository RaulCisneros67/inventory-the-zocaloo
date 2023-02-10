<?php

use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;

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


Route::get('/productos', [CarritoController::class,"index"])->name('products.index');;
Route::get('/', [CarritoController::class,"index"])->name('products.index');;

Route::post('/cart-add',    [CarritoController::class,'store'])->name('cart.add');

Route::get('/cart-checkout',[CarritoController::class,'cart'])->name('cart.checkout');

Route::delete('/cart-destroy',  [CarritoController::class,'destroy'])->name('cart.destroy');

Route::post('/cart-removeitem',  [CarritoController::class,'removeitem'])->name('cart.removeitem');


Route::get('/products', [CarritoController::class, 'update'])->name("products.update");

Route::delete('/products/{id}',  [CarritoController::class,'eliminarProducto'])->name('eliminar.item');
Route::get('/products/{id}',  [CarritoController::class,'editProduct'])->name('editProduct.item');
Route::put('/products/{id}',  [CarritoController::class,'actualizarProduc'])->name('actualizarProduc.item');
Route::post('/products',  [CarritoController::class,'agregarProduct'])->name('products.create');

Route::get('/crear', function () {

    return view('products.create');
});
