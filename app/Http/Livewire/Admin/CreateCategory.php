<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $rand, $categories, $category;

    protected $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'image' => null
    ];
    
    public $editForm = [
        'open' => false,
        'name' => null,
        'image' => null
    ];
    public $editImage;


    protected $rules = [
        'createForm.name' => 'required',
        'createForm.image' => 'required|image|max:1024',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.image' => 'imagen',
        'editForm.name' => 'nombre',
        'editImage' => 'imagen',
    ];

    public function mount()
    {
        $this->rand = rand();
        $this->getCategories();
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        $this->validate();
        $image = $this->createForm['image']->store('categories');
        Category::create([
            'name' => $this->createForm['name'],
            'image' => $image,
        ]);

        $this->rand = rand();
        $this->reset('createForm');
        $this->getCategories();
        $this->emit('saved');
    }

    public function edit(Category $category)
    {
        $this->reset(['editImage']);
        $this->resetValidation();

        $this->category = $category;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['image'] = $category->image;
    }

    public function update()
    {
        $rules = [
            'editForm.name' => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'image|max:1024';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('categories');
        }

        $this->category->update($this->editForm);

        $this->reset(['editForm', 'editImage']);

        $this->getCategories();
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
