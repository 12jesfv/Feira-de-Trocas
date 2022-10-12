<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categorias;

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


Route::get('/categorias', function () {
    return view('categorias');
});

// Route::get('categorias', Categoria::class);

Route::get('projetos', App\Http\Livewire\Projetos::class)
    ->name('projetos');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
