<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    public function show()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        $attr = request()->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($attr);

        return redirect('/admin/categories')->with('success', 'Category created');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $attr = request()->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::findOrFail($id)->update($attr);

        return redirect()->route('admin.categories')->with('success', 'Category updated');
    }

}
