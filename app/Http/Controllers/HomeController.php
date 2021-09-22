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
        return view('shop', [
            'products' => Product::paginate(24),
        ]);
    }

    public function productDetails($id)
    {
        return view('product-details', [
            'product' => Product::find($id)->with(['stocks']),
        ]);
    }
}
