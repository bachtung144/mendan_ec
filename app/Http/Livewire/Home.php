<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $category = HomeCategory::find(config('constant.first_home_cate'));
        $categories = Category::all();
//        $noOfProducts = $category->no_of_products;

        return view('livewire.home', compact('categories'))->layout('layouts.base');
    }
}
