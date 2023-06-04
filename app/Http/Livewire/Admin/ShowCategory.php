<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class ShowCategory extends Component
{
    public $category, $subcategories, $subcategory;

    protected $listeners = ['delete'];

    protected $rules = [
        'createForm.name' => 'required',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre',
    ];

    public $createForm = [
        'name' => null,
    ];
    public $editForm = [
        'open' => false,
        'name' => null,
    ];

    public function mount(Category $category){
        $this->category = $category;
        $this->getSubcategories();
    }

    public function getSubcategories(){
        $this->subcategories = Subcategory::where('category_id', $this->category->id)->get();
    }

    public function save(){
        $this->validate();
        $this->category->subcategories()->create($this->createForm);

        $this->reset('createForm');

        $this->getSubcategories();
    }

    public function edit(Subcategory $subcategory){
        $this->resetValidation();
        $this->subcategory = $subcategory;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $subcategory->name;
    }

    public function update(Subcategory $subcategory){
        $this->validate([
            'editForm.name' => 'required',
        ]);

        $this->subcategory->update($this->editForm);
        $this->getSubcategories();
        $this->reset('editForm');
    }

    public function delete(Subcategory $subcategory)
    {
        $subcategory->delete();
        $this->getSubcategories();
    }


    public function render()
    {
        return view('livewire.admin.show-category')->layout('layouts.admin');
    }
}
