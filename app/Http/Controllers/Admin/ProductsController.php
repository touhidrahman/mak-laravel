<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        // if (($request->hasFile('thumb_1') == false || $request->hasFile('thumb_2') == false)) {
        //     toast('Cover images are required', 'error');
        //     return back();
        // }

        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'subsubcategory_id' => 'integer',
            'product_family_id' => 'integer',
            'brand' => 'string',
            'season' => 'string',
            'material' => 'string',
            'description' => 'string',
            'seo_text' => 'string',
            'slug' => '',
            'code' => '',
            'tags' => '',
            'size' => '',
            'color' => '',
            'qty' => 'integer',
            'selling_price' => 'integer',
            'discount_price' => 'integer',
            'thumb_1' => 'required|mimes:jpg,png,jpeg|max:2048',
            'thumb_2' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data['thumb_1'] = $this->uploadThumbnails($request, 'thumb_1');
        $data['thumb_2'] = $this->uploadThumbnails($request, 'thumb_2');

        Product::create($data);

        toast('Product created', 'success');
        return redirect()->route('admin.products');
    }

    /**
     * Returns uploaded URL
     */
    private function uploadThumbnails($request, $key)
    {
        if ($request->hasFile($key)) {
            $file = $request->file($key);
            $newName =  $request->name . '-' . time() . '.' . $file->getClientOriginalExtension();
            $filepath = $file->storeAs('catalog_images', $newName, 's3');
            return $filepath;
        }
        return '';
    }
}
