<?php

namespace App\Http\Livewire;

use App\Models\Images;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Livewire\Component;

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

    public function render()
    {
        $product = $this->productRepo->getProductBySlug($this->slug);
        $images = Images::where('product_id', $product->id)->get();

        return view('livewire.detail', compact('product', 'images'))->layout('layouts.base');
    }
}
