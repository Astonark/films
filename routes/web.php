<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\CategoryController;
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
    return view('home');
});

Route::get('/films', [FilmController::class, 'index'])->name('films');
Route::get('/film-create', [FilmController::class, 'create'])->name('film-create');
Route::post('/film-create', [FilmController::class, 'store'])->name('film-store');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category-create', [CategoryController::class, 'create'])->name('category-create');
Route::post('/category-create', [CategoryController::class, 'store'])->name('category-store');
