<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(10);
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
        try {
            $category->destroy($request->input('id'));
            return redirect('/categories');
        } catch (\Throwable $e  ) {
            return Redirect::back()->withErrors(['msg' => 'La catégorie ne peut pas être supprimé car elle est lié à un film']);
        }
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
