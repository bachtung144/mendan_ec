<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use WithPagination;
use Cart;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $categorySlug;

    public function mount($categorySlug)
    {
        $this->sorting = 'default';
        $this->pagesize = 6;
        $this->categorySlug = $categorySlug;
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
        $category = Category::where('slug', $this->categorySlug)->first();
        $categoryId = $category->id;
        $categoryName = $category->name;

        if ($this->sorting == 'date') {
            $products = Product::where('category_id', $categoryId)->orderby('created_at', 'DESC')
                ->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $products = Product::where('category_id', $categoryId)->orderby('price', 'ASC')
                ->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::where('category_id', $categoryId)->orderby('price', 'DESC')
                ->paginate($this->pagesize);
        } else {
            $products = Product::where('category_id', $categoryId)->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.category-component', compact('products', 'categories', 'categoryName'))
            ->layout('layouts.base');
    }
}
