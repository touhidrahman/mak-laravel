<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FeaturedImage;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function comingSoon()
    {
        return view('shop.coming-soon');
    }

    public function maint()
    {
        return view('shop.under-maintenance');
    }

    public function b2b()
    {
        return view('shop.under-maintenance');
    }

    public function services()
    {
        return view('shop.under-maintenance');
    }

    public function index()
    {
        return view('shop.home', [
            'trendingProducts' => Product::where('active', true)->take(6)->get(),
        ]);
    }

    public function shop(Request $request)
    {
        $query = Product::where('active', '=', true);
        if ($request->input('category_id')) {
            $query->where('category_id', '=', $request->input('category_id'));
        }
        if ($request->input('subcategory_id')) {
            $query->where('subcategory_id', '=', $request->input('subcategory_id'));
        }
        if ($request->input('subsubcategory_id')) {
            $query->where('subsubcategory_id', '=', $request->input('subsubcategory_id'));
        }
        $products = $query->with(['stocks'])->paginate(24);

        return view('shop.products.list', [
            'products' => $products,
            'relatedProducts' => $query->take(6)->get(),
        ]);
    }

    public function productDetails($slug)
    {
        $product =  Product::with(['stocks', 'images'])->where('slug', '=', $slug)->first();
        $available_sizes = [];
        $available_colors = [];
        foreach($product->stocks as $stock) {
            if (!in_array($stock->size, $available_sizes)) {
                array_push($available_sizes, $stock->size);
            }
            if (!in_array($stock->color, $available_colors)) {
                array_push($available_colors, $stock->color);
            }
        }
        $sizeSorted = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $sizes = array_intersect($sizeSorted, $available_sizes);

        $relatedProducts = Product::where('active', true)
            ->where('subcategory_id', $product->subcategory_id)
            ->latest()->take(6)->get();

        return view('shop.products.details', [
            'product' => $product,
            'available_colors' => $available_colors,
            'available_sizes' => $sizes,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
