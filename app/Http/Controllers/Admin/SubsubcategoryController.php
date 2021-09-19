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
            'subsubcategories' => Subsubcategory::paginate(50),
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
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ]);

        @Subsubcategory::create($attr);

        toast('Sub-subcategory created', 'success');
        return redirect()->route('admin.subsubcategories');
    }

    public function edit($id)
    {
        $subsubcategory = Subsubcategory::findOrFail($id);
        $subcategories = Subcategory::where('category_id', $subsubcategory->category_id)->orderBy('name', 'ASC')->get();

        return view('admin.subsubcategories.edit', [
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'subcategories' => $subcategories,
            'subsubcategory' => $subsubcategory,
        ]);
    }

    public function update($id)
    {
        $attr = request()->validate([
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ]);

        @Subsubcategory::findOrFail($id)->update($attr);

        toast('Sub-subcategory updated', 'success');
        return redirect()->route('admin.subsubcategories');
    }

    public function destroy(Subsubcategory $subsubcategory)
    {
        $subsubcategory->delete();
        toast('Sub-subcategory deleted', 'success');
        return redirect()->route('admin.subsubcategories');
    }
}
