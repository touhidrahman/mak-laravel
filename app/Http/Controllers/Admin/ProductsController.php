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
        $products = Product::paginate(20);
        return view('admin.products.index', [
            'products' => $products,
        ]);
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
            'selling_price' => 'integer',
            'discount_price' => 'integer',
        ]);

        Product::create($data);

        toast('Product created', 'success');
        return redirect()->route('admin.products');
    }

    public function manage($id)
    {
        return view('admin.products.manage', [
            'product' => Product::find($id),
        ]);
    }

    public function uploadThumbnails(Request $request, $key)
    {
        $data = $request->validate([
            'thumb_1' => 'required|mimes:jpg,png,jpeg|max:2048',
            'thumb_2' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        // TODO heavily wrong
        if ($request->hasFile($key)) {
            $file = $request->file($key);
            $newName =  $request->name . '-' . time() . '.' . $file->getClientOriginalExtension();
            $filepath = $file->storeAs('catalog_images', $newName, 's3');

            Product::findOrFail($request->id)->update(['thumb_1' => $filepath]);

            toast('Thumbnail uploaded', 'success');
            return back();
        }

        toast('Uploading thumbnail failed', 'error');
        return back();
    }
}
