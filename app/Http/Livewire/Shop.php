<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use WithPagination;
use Cart;

class Shop extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 6;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)
            ->associate(Product::class);
        session()->flash('success_message', 'Item added in cart');
        return redirect()->route('cart');
    }

    public function render()
    {
        switch ($this->sorting) {
            case 'date': $products = Product::sorting('created_at', 'DESC', $this->pagesize); break;
            case 'price': $products = Product::sorting('price', 'ASC', $this->pagesize); break;
            case 'price-desc': $products = Product::sorting('price', 'DESC', $this->pagesize); break;
            default: $products = Product::paginate($this->pagesize);
        }

        return view('livewire.shop', compact('products'))->layout('layouts.base');
    }
}

