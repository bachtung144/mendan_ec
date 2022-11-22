<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
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
    public $product_id;
    public $newimage;
    public $galleryImages;
    public $newGalleryImages;
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

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->category_id = $product->category_id;
        $this->image = $product->images->get(0)->name;
        $this->product_id = $product->id;
        $this->galleryImages = $product->images;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function editProduct(Request $request)
    {
        $data = $this->validate();
        $product = Product::find($this->product_id);
        $product->update($data);
        $thumbnail = $product->images->first();

        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $thumbnail->name = $imageName;
            $thumbnail->update();
        }

        if ($this->newGalleryImages) {
            $product->images()->delete();
            $product->images()->create(['name' => $thumbnail->name]);

            foreach ($this->newGalleryImages as $key => $newGalleryImage) {
                $newGalleryImageName = Carbon::now()->timestamp. $key . '.' . $newGalleryImage->extension();
                $newGalleryImage->storeAs('products', $newGalleryImageName);
                $product->images()->create(['name' => $newGalleryImageName]);
            }
        }

        session()->flash('message', 'Product has been updated successfully');
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.product.admin-edit-product-component', compact('categories'))->layout('layouts.base');
    }
}
