<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Shop extends Component
{
    public function render()
    {
        $products = Product::paginate(12);

        return view('livewire.shop', ['products'=> $products])->layout('layouts.base');
    }
}
