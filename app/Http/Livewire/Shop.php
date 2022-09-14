<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 6;
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

