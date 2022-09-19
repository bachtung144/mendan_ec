<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use WithPagination;
use Cart;

class Search extends Component
{
    public $sorting;
    public $pagesize;
    public $search;
    public $product_cate;
    public $product_cate_id;

    public function mount()
    {
        $this->sorting = config('default');
        $this->pagesize = config(6);
        $this->fill(request()->only('search', 'product_cate', 'product_cate_id'));
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
        $categories = Category::all();

        switch ($this->sorting)
        {
            case 'date': $products = Product::search($this->search, $this->product_cate_id, 'created_at', 'DESC', $this->pagesize); break;
            case 'price': $products = Product::search($this->search, $this->product_cate_id, 'price', 'ASC', $this->pagesize); break;
            case 'price-desc': $products = Product::search($this->search, $this->product_cate_id, 'price', 'DESC', $this->pagesize); break;
            default:  $products = Product::where('name', 'like', '%' . $this->search . '%')
                ->where('category_id', 'like', '%' . $this->product_cate_id . '%')
                ->paginate($this->pagesize);
        }

        return view('livewire.search', compact('products', 'categories'))->layout('layouts.base');
    }
}
