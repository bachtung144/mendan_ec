<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Validation\Rule;

class AdminEditCategoryComponent extends Component
{
    public $categorySlug;
    public $categoryId;
    public $name;
    public $slug;

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($this->categoryId),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Category name is required',
            'slug.required' => 'Category slug is required',
            'slug.unique' => 'Category slug has been existed',
        ];
    }

    public function mount($categorySlug)
    {
        $this->categorySlug = $categorySlug;
        $category = Category::where('slug', $categorySlug)->first();
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $this->validate();
        $category = Category::find($this->categoryId);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.category.admin-edit-category-component')->layout('layouts.base');
    }
}
