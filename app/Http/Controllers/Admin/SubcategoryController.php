<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Toaster;

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

    public function edit($id)
    {
        return view('admin.subcategories.edit', [
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

        return redirect()->route('admin.subcategories')->with('success', 'Subcategory Updated');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        toast('Subcategory deleted', 'success');
        return redirect()->route('admin.subcategories');
    }

    public function ajaxGetSubsubcategories($subcategory_id)
    {
        $subsubcategories = Subsubcategory::where('subcategory_id', $subcategory_id)->orderBy('name', 'ASC')->get();
        return json_encode($subsubcategories);
    }
}
