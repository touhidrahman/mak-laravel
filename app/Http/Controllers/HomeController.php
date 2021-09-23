<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function shop(Request $request)
    {
        // Product::whereHas('stocks', function($q) {
        //     $q->where('size', '=', 'XXL');
        // })->paginate(10);

        $r = Product::whereHas('stocks', function($query) {
            // return $query->where(['qty', '>', 5]);
        })->paginate(24);

        return view('product-list', [
            'products' => Product::where('active', '=', true)->with(['stocks'])->paginate(24),
        ]);
    }

    public function productDetails($id)
    {
        return view('product-details', [
            'product' => Product::find($id)->with(['stocks']),
        ]);
    }
}