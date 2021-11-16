<?php

namespace App\View\Components\Shop;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Support\Facades\Cache;

class Navbar extends Component
{
    public $categories;
    public $subcategories;
    public $subsubcategories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Cache::remember('categories', 3600, function () {
            return Category::all();
        });
        $this->subcategories = Cache::remember('subcategories', 3600, function () {
            return Subcategory::all();
        });
        $this->subsubcategories = Cache::remember('subsubcategories', 3600, function () {
            return Subsubcategory::all();
        });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop.navbar');
    }
}
