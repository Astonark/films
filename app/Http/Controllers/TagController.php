<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index() {
        $tags = Tag::paginate(10);
        return view('tags.index', compact('tags'));
    }

    public function create() {
        return view('tags.create');
    }

    public function store(TagRequest $request) {
        Tag::create($request->validated());
        return redirect('/tags');
    }
}
