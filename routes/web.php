<?php

use App\Http\Controllers\FilmController;
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
