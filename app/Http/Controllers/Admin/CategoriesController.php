<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function store()
    {
        $attr = request()->validate([]);

        Category::create($attr);

        return back()->with('success', 'Category created');
    }
}
