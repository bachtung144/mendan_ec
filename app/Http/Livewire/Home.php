<?php

namespace App\Http\Livewire;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\HomeCategory\HomeCategoryRepositoryInterface;
use Livewire\Component;

class Home extends Component
{

    /**
     * @var CategoryRepositoryInterface|mixed
     * @var HomeCategoryRepositoryInterface|mixed
     */
    protected $categoryRepo;
    protected $homeCateRepo;

    public function mount(CategoryRepositoryInterface $categoryRepo,
                          HomeCategoryRepositoryInterface $homeCateRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->homeCateRepo = $homeCateRepo;
    }

    public function render()
    {
        $categories = $this->categoryRepo->getAll();
        $noOfProducts = $this->homeCateRepo->getNoOfProducts();

        return view('livewire.home', compact('categories','noOfProducts'))->layout('layouts.base');
    }
}
