<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Category' => 'required',
            'Description' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit($ID_Cat)
    {
        $category = Category::find($ID_Cat);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $ID_Cat)
    {
        $request->validate([
            'Category' => 'required',
            'Description' => 'required',
        ]);

        $category = Category::find($ID_Cat);
        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($ID_Cat)
    {
        Category::destroy($ID_Cat);

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
