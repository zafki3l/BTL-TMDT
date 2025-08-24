<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        return redirect()->route('categories.index')->with('message', 'create new category successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update($id, StoreCategoryRequest $request)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        return redirect()->route('categories.index')->with('message', 'Update cagetory succesfully');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Delete cagetory succesfully');
    }
}
