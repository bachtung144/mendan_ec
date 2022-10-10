<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Category has been deleted successfully');
    }

    public function render()
    {
        $categories = Category::paginate(config('constant.category_paginate'));

        return view('livewire.admin.category.admin-category-component', compact('categories'))->layout('layouts.base');
    }
}
