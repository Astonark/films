<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index() {
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    public function create() {
        return view('actors.create');
    }

    public function store(ActorRequest $request) {
        $film = Actor::create($request->validated());
        return redirect('/actors');
    }

    public function delete(Request $request) {
        $actor = Actor::find($request->input('id'));
        $actor->delete();
        return redirect('/actors');
    }

    public function show($id) {
        $actor = Actor::find($id);
        $actors = Actor::all();
        return view('actors.edit', compact('actor', 'actors'));
    }

    public function edit(Request $request, $id) {
        $actor = Actor::find($id);
        $actor->name = $request->input('name');
        $actor->save();
        return redirect('/actors');
    }
}