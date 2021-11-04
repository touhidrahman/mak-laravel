<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $isActive = true;
        if ($request->input('active') && $request->input('active') != 'true') {
            $isActive = false;
        }
        $query = Product::where('active', '=', $isActive);
        $products = $query
            ->with(['category', 'subcategory', 'subsubcategory', 'stocks'])
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    public function show()
    {
        return view('admin.products.create', [
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);

        toast('Product created', 'success');
        return redirect()->route('admin.products.manage', $product->id);
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);

        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'string',
            'brand' => 'nullable|string',
            'season' => 'nullable|string',
            'material' => 'nullable|string',
            'description' => 'string',
            'seo_text' => 'string',
            'tags' => 'nullable|string',
            'dimension' => 'nullable|string',
            'weight' => 'nullable|string',
            'selling_price' => 'integer',
            'discounted_price' => 'nullable|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);

        toast('Product updated', 'success');
        return redirect()->route('admin.products.manage', $product->id);
    }

    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product->active) {
            $product->stocks()->delete();
            foreach($product->images() as $image) {
                Storage::disk('s3')->delete($image->path);
            }
            $product->images()?->delete();
            $product->delete();
            return redirect()->route('admin.products');
        }
        return back();
    }

    public function showManageForm($id)
    {
        return view('admin.products.manage', [
            'product' => Product::find($id),
            'colors' => Color::orderBy('name', 'ASC')->get(),
            'sizes' => ['XS', 'S', 'M', 'L', 'XL', 'XXL'],
            'stocks' => Stock::where('product_id', $id)->get(),
        ]);
    }

    public function manage(Request $request)
    {
        $data = $request->validate([
            'active' => 'required',
        ]);

        Product::find($request->id)->update($data);

        toast('Product updated', 'success');
        return back();
    }

}
