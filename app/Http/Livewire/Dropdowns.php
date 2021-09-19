<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class Dropdowns extends Component
{
    public $category;
    public $subcategories = [];
    public $subcategory;

    public function render()
    {
        if (!empty($this->category)) {
            $this->subcategories = Subcategory::where('category_id', $this->category)->get();
        }
        return view('livewire.dropdowns', ['categories' => Category::all()]);
    }

    // public function mount(Category $category, Subcategory $subcategory)
    // {
    //     $this->category = $category;
    //     $this->subcategory = $subcategory;
    // }
}
