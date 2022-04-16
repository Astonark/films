<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Actor;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class FilmController extends Controller
{
    public function index () {
        $films = Film::all();
        return view('film.index', compact('films'));
    }

    public function create() {
        $categories = Category::all();
        return view('film.create', compact('categories'));
    }

    public function store(FilmRequest $request) {
        Film::create($request->validated());
        return redirect('/films');
    }

    public function delete(Request $request) {
        $film = Film::find($request->input('id'));
        $film->actors()->detach();
        $film->delete();
        return redirect('/films');
    }

    public function show($id) {
        $film = Film::find($id);
        $categories = Category::all();
        return view('film.edit', compact('film', 'categories'));
    }

    public function edit(Request $request, $id) {
        $film = Film::find($id);
        $film->title = $request->input('title');
        $film->running_time = $request->input('running_time');
        $film->category_id = $request->input('category_id');
        $film->synopsis = $request->input('synopsis');
        $film->save();
        return redirect('/films');
    }

    public function view ($id) {
        $film = Film::find($id);
        $all_actors = Actor::all();
        $actors = $film->actors;
        return view ('film.show', compact('film', 'actors', 'all_actors'));
    }

    public function linkActor(Request $request, $id) {
        $film = Film::find($id);
        try {
            $film->actors()->attach($request->input('actor_id'));
        } catch (\Throwable $exception) {
            return Redirect::back()->withErrors(['msg' => "L'acteur est déjà lié à ce film"]);
        }
        return redirect('/film/show/' . $id);
    }

    public function detachActor(Request $request) {
        $film = Film::find($request->input('film_id'));
        $film->actors()->detach($request->input('actor_id'));
        return redirect('/film/show/' . $request->input('film_id'));
    }
}
