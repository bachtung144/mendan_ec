<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Livewire\Component;

class HeaderSearch extends Component
{
    /**
     * @var CategoryRepositoryInterface|mixed
     */
    protected $categoryRepo;
    public $search;
    public $product_cate;
    public $product_cate_id;

    public function mount(CategoryRepositoryInterface $categoryRepo)
    {
        $this->product_cate = 'All category';
        $this->fill(request()->only('search', 'product_cate', 'product_cate_id'));
        $this->categoryRepo = $categoryRepo;
    }

    public function render()
    {
        $categories = $this->categoryRepo->getAll();

        return view('livewire.header-search', compact('categories'));
    }
}
