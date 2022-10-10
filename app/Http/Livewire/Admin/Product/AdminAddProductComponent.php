<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $price;
    public $quantity;
    public $image;
    public $category_id;
    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'image' => 'required',
        'category_id' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function addProduct(Request $request)
    {
        $data = $this->validate();
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);

        DB::beginTransaction();
        try {
            $product = Product::create($data);
            $product->images()->create(['name' => $imageName]);

            DB::commit();
            session()->flash('message', 'Product has been created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('message', $e->getMessage());
        }
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.product.admin-add-product-component', compact('categories'))->layout('layouts.base');
    }
}
