<?php

namespace App\Http\Livewire;

use App\Models\Images;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Livewire\Component;
use Cart;

class Detail extends Component
{
    /**
     * @var ProductRepositoryInterface|mixed
     */
    protected $productRepo;
    public $slug;

    public function mount($slug, ProductRepositoryInterface $productRepo)
    {
        $this->slug = $slug;
        $this->productRepo = $productRepo;
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
        $product = $this->productRepo->getProductBySlug($this->slug);
        $images = Images::where('product_id', $product->id)->get();

        return view('livewire.detail', compact('product', 'images'))->layout('layouts.base');
    }
}
