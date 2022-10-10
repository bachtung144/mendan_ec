<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required|unique:categories',
    ];

    public function messages()
    {
        return [
            'name.required' => 'Category name is required',
            'slug.required' => 'Category slug is required',
            'slug.unique' => 'Category slug has been existed',
        ];
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory(Request $request)
    {
        $this->validate();
        $data = $request->all()['serverMemo']['data'];
        Category::create($data);
        session()->flash('message', 'New category has been added successfully');
    }

    public function render()
    {
        return view('livewire.admin.category.admin-add-category-component')->layout('layouts.base');
    }
}
