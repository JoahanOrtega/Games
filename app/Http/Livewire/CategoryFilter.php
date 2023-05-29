<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;
    public $category, $genero;

    public function limpiar(){
        $this->reset('genero');
    }
    
    public function render()
    {

        // $products = $this->category->products()
        //                     ->where('status',2)->paginate(20);

        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if($this->genero){
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('name', $this->genero);
            });
        }

        $products = $productsQuery->paginate(20);
        return view('livewire.category-filter', compact('products'));
    }
}
