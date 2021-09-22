<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories', 3600 * 24, function () {
            return Category::all();
        });
        $subcategories = Cache::remember('subcategories', 3600 * 24, function () {
            return Subcategory::all();
        });
        $subsubcategories = Cache::remember('subsubcategories', 3600 * 24, function () {
            return Subsubcategory::all();
        });

        return view('welcome', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'subsubcategories' => $subsubcategories,
        ]);
    }
}
