<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [UsersController::class, 'index'])->name('userdex');
Route::get('/user/tambah', [UsersController::class, 'create'])->name('usercre');
Route::post('/user', [UsersController::class, 'store'])->name('userstore');
Route::get('/user/{id}', [UsersController::class, 'edit'])->name('usersdit');
Route::put('/user/{id}', [UsersController::class, 'update'])->name('usersupdate');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('usersdel');

Route::get('/product', [ProductsController::class, 'index'])->name('prodex');

