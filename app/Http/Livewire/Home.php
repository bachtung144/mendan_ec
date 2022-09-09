<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $category = HomeCategory::find(1);
        $categories = Category::all();
        $noOfProducts = $category->no_of_products;

        return view('livewire.home', compact('categories','noOfProducts'))->layout('layouts.base');
    }
}
