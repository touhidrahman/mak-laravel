<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        return view('admin.subcategories.index', [
            'subcategories' => Subcategory::paginate(50),
        ]);
    }

    public function show()
    {
        return view('admin.subcategories.create', [
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function store()
    {
        $attr = request()->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        @Subcategory::create($attr);

        return redirect('/admin/subcategories')->with('success', 'Subcategory created');
    }
}
