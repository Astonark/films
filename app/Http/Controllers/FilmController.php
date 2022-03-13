<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;

class FilmController extends Controller
{
    public function index () {
        $films = Film::all();
        return view('film.show', compact('films'));
    }

    public function create() {
        $categories = Category::all();
        return view('film.create', compact('categories'));
    }

    public function store(FilmRequest $request) {
        $film = Film::create($request->validated());
        dd($request);
    }
}
