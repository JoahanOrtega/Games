<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;

class CreateProduct extends Component
{
    public $categories, $subcategories = [];
    public $category_id ="", $subcategory_id ="";
    public $name, $description, $price, $quantity;

    protected $rules =[
      'category_id' => 'required',
      'subcategory_id' => 'required',
      'name' => 'required',
      'description' => 'required',
      'price' => 'required|numeric|min:1',
      'quantity' => 'required|numeric|min:1',
    ];


    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id',$value)->get();

        $this->reset('subcategory_id');
    }

    public function mount(){
        $this->categories = Category::all();
    }

    public function save(){
        $this->validate();

        $product = new Product();
        $product->name = $this->name;
        $product->description = $this->description;
        $product->subcategory_id = $this->subcategory_id;
        $product->price = $this->price;
        $product->quantity = $this->quantity;

        $product->save();
        return redirect()->route('admin.products.edit', $product);
    }


    public function render()
    {
        return view('livewire.admin.create-product')->layout('layouts.admin');

    }
}
