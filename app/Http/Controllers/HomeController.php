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
    public function index()
    {
        return view('welcome', [
            'trendingProducts' => Product::where('active', true)->take(6)->get(),
        ]);
    }

    public function shop(Request $request)
    {
        // Product::whereHas('stocks', function($q) {
        //     $q->where('size', '=', 'XXL');
        // })->paginate(10);

        $r = Product::whereHas('stocks', function($query) {
            // return $query->where(['qty', '>', 5]);
        })->paginate(24);

        return view('products.list', [
            'products' => Product::where('active', '=', true)->with(['stocks'])->paginate(24),
            'relatedProducts' => Product::where('active', true)->take(6)->get(),
        ]);
    }

    public function productDetails($id)
    {
        $product =  Product::with(['stocks', 'images'])->find($id);
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

        return view('products.details', [
            'product' => $product,
            'available_colors' => $available_colors,
            'available_sizes' => $available_sizes,
            'relatedProducts' => Product::where('active', true)->take(6)->get(),
        ]);
    }
}
