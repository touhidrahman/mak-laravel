<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function show()
    {
        return view('admin.products.create', [
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'colors' => Color::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            // 'brand' => '',
            // 'season' => '',
            // 'material' => '',
            // 'slug' => '',
        ]);

        Product::create($attributes);

        return redirect('admin')->with('success', 'Product created');

    }
}
