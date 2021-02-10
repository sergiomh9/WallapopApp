<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BackendCategoriaController;
use App\Http\Controllers\BackendProductoController;
use App\Http\Controllers\BackendContactoController;
use App\Http\Controllers\BackendQuieroController;
use App\Http\Controllers\BackendUserController;
use App\Http\Controllers\FrontendController;

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
     return view('frontend.index');
});




Auth::routes(['verify' => true]);


Route::get('/', [FrontendController::class, 'index']);
Route::get('/index', [FrontendController::class, 'indexlogged'])->name('indexlogged');

Route::get('frontend/producto/{id}', [FrontendController::class, 'showProducto'])->name('producto.showproducto');
Route::get('producto/create', [FrontendController::class, 'create'])->name('producto.create');
Route::post('producto/create', [FrontendController::class, 'store'])->name('producto.create');
Route::post('producto/cart', [FrontendController::class, 'addcart'])->name('producto.cart');
Route::get('cart/{id}', [FrontendController::class, 'cart'])->name('cart');
Route::post('buy/{id}/{idquiero}', [FrontendController::class, 'update'])->name('buy');
Route::post('contact/{id}', [FrontendController::class, 'createContact'])->name('createContact');
Route::get('delete/{id}', [FrontendController::class, 'destroy']);


// User

Route::get('/configuracion', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [FrontendController::class, 'indexlogged'])->name('indexlogged');

Route::get('segunda', [App\Http\Controllers\HomeController::class, 'segunda'])->name('segunda');

Route::post('password/change', [UserController::class, 'changePassword'])->name('password.change')->middleware('verified');
Route::post('user/change', [UserController::class, 'changeUser'])->name('user.change')->middleware('verified');

Route::get('email/restore/{id}/{email}', [UserController::class, 'restoreEmail'])->name('email.restore')->middleware('signed');
Route::post('email/restore/{id}/{email}', [UserController::class, 'restorePreviousEmail'])->name('email.restore')->middleware('signed');


//Backend

Route::get('backend', [BackendController::class, 'main'])->name('backend.main')->middleware('auth');

Route::resource('backend/categoria', BackendCategoriaController::class, ['names' => 'backend.categoria'])->middleware('auth');
Route::resource('backend/producto', BackendProductoController::class, ['names' => 'backend.producto'])->middleware('auth');
Route::resource('backend/contacto', BackendContactoController::class, ['names' => 'backend.contacto'])->middleware('auth');
Route::resource('backend/quiero', BackendQuieroController::class, ['names' => 'backend.quiero'])->middleware('auth');
Route::resource('backend/user', BackendUserController::class, ['names' => 'backend.user'])->middleware('auth');