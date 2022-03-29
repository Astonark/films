<?php

use App\Http\Controllers\ActorController;
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
Route::delete('/film/delete', [FilmController::class, 'delete'])->name('film.delete');
Route::get('/film/edit/{id}', [FilmController::class, 'show'])->name('film.edit.show');
Route::put('/film/edit/{id}', [FilmController::class, 'edit'])->name('film.edit.perform');
Route::get('/film/show/{id}', [FilmController::class, 'view'])->name('film.show');
Route::post('/film/show/{id}', [FilmController::class, 'linkActor'])->name('actor.film.link');
Route::delete('/film/show/', [FilmController::class, 'detachActor'])->name('actor.datach');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/category-create', [CategoryController::class, 'create'])->name('category-create');
Route::post('/category-create', [CategoryController::class, 'store'])->name('category-store');
Route::delete('category/delete', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/category/edit/{id}', [CategoryController::class, 'show'])->name('category.edit.show');
Route::put('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit.perform');


Route::get('/actors', [ActorController::class, 'index'])->name('actors');
Route::get('/actor-create', [ActorController::class, 'create'])->name('actor.create');
Route::post('/actor-create', [ActorController::class, 'store'])->name('actor-store');
Route::delete('/actor/delete', [ActorController::class, 'delete'])->name('actor.delete');
Route::get('/actor/edit/{id}', [ActorController::class, 'show'])->name('actor.edit.show');
Route::put('/actor/edit/{id}', [ActorController::class, 'edit'])->name('actor.edit.perform');
