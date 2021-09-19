<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\Category;

class SubsubcategoryController extends Controller
{
    public function index()
    {
        return view('admin.subsubcategories.index', [
            'subcategories' => Subsubcategory::paginate(50),
        ]);
    }

    public function show()
    {
        return view('admin.subsubcategories.create', [
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

    public function edit($id)
    {
        return view('admin.subsubcategories.edit', [
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'subcategory' => Subcategory::findOrFail($id),
        ]);
    }

    public function update($id)
    {
        $attr = request()->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        @Subcategory::findOrFail($id)->update($attr);

        return redirect()->route('admin.subsubcategories')->with('success', 'Subcategory Updated');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        toast('Subcategory deleted', 'success');
        return redirect()->route('admin.subsubcategories');
    }
}
