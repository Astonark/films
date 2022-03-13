<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Models\Actor;

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
        $category = Category::create($request->validated());
        return redirect('/actors');
    }
}
