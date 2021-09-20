<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImages;
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
            'images' => ProductImages::where('product_id', $id)->get(),
        ]);
    }

    public function uploadImages(Request $request)
    {
        $data = $request->validate([
            'thumb_1' => 'mimes:jpg,png,jpeg|max:2048',
            'thumb_2' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $toSave = [];
        foreach(['thumb_1', 'thumb_2'] as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $url = $this->doUpload($file, $request->id);
                $toSave[$key] = $url;
            }
        }

        $images = $request->file('images');
        $i = 0;
        foreach($images as $image) {
            ProductImages::insert([
                'product_id' => $request->id,
                'path' => $this->doUpload($image, $request->id),
                'serial' => $i,
            ]);
            $i++;
        }

        if (count($toSave) > 0) {
            Product::findOrFail($request->id)->update($toSave);

            toast('Images uploaded', 'success');
            return back();
        }

        toast('Uploading images failed', 'error');
        return back();
    }

    private function doUpload($file, $productId)
    {
        $newName =  $productId . '/' . hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
        $filepath = $file->storeAs('catalog_images', $newName, 's3');
        Storage::disk('s3')->setVisibility($filepath, 'public');
        return Storage::disk('s3')->url($filepath);
    }
}
