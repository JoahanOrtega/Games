<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{

    public $product, $categories, $subcategories, $slug;
    public $category_id;

    protected $rules = [
        'category_id' => 'required',
        'product.subcategory_id' => 'required',
        'product.name' => 'required',
        'product.description' => 'required',
        'product.price' => 'required|numeric|min:1',
        'product.quantity' => 'required|numeric|min:1',
    ];

    protected $listeners = ['refreshProduct', 'delete'];

    public function mount(Product $product)
    {
        $this->product = $product;

        $this->categories = Category::all();
        $this->category_id = $product->subcategory->category->id;
        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();
    }

    public function refreshProduct()
    {
        $this->product = $this->product->fresh();
    }

    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();

        // $this->reset('subcategory_id');
        $this->product->subcategory_id = "";
    }

    public function save()
    {
        $rules = $this->rules;

        $this->validate($rules);

        $this->product->save();

        $this->emit('saved');
    }

    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();

        $this->product = $this->product->fresh();
    }

    public function delete()
    {
        $images = $this->product->images;

        foreach ($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }

        $this->product->delete();

        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
