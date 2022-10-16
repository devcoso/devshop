<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth', 'verified')->group( function (){
    
});

Route::middleware('auth', 'admin')->group( function (){
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/admin/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::get('/admin/categorias/edit/{categoria}', [CategoriaController::class, 'edit'])->name('categorias.edit');
});

require __DIR__.'/auth.php';
