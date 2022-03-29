<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(CategoryRequest $request) {
        $category = Category::create($request->validated());
        return redirect('/categories');
    }

    public function delete(Request $request) {
        $category = Category::find($request->input('id'));
        $category->destroy($request->input('id'));
        return redirect('/categories');
    }

    public function show($id) {
        $category = Category::find($id);
        $categories = Category::all();
        return view('categories.edit', compact('category', 'categories'));
    }

    public function edit(Request $request, $id) {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect('/categories');
    }
}
