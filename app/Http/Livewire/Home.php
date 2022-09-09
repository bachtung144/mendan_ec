<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $category = HomeCategory::find(1);
        $categories = Category::all();
        $noOfProducts = $category->no_of_products;
        $products = Product::where('category_id', $category->id)->get()->take($noOfProducts);

        return view('livewire.home', compact('categories','noOfProducts', 'products'))->layout('layouts.base');
    }
}
