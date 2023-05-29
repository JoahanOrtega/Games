<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta informacion para crear un producto</h1>



    <div class="grid grid-cols-2 gap-6 mb-4">
        <div>
            {{-- Categoria --}}
            <x-label value="Categorias" />
            <select class="w-full form-control" wire:model="category_id">
                <option selected disabled>Seleccione una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <x-input-error for="category_id"/>
        </div>
        {{-- Genero --}}
        <div>
            <x-label value="Generos" />
            <select class="w-full form-control" wire:model="subcategory_id">
                <option value="" selected disabled>Seleccione un genero</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
            <x-input-error for="subcategory_id"/>
        </div>
    </div>

    {{-- Nombre --}}
    <div class="mb-4">
        <x-label value="Nombre" />
        <x-input type="text" class="w-full" wire:model="name" placeholder="Nombre de producto" />
        <x-input-error for="name"/>
    </div>

    {{-- Slug --}}
    <div class="mb-4">
        <x-label value="Slug" />
        <x-input type="text" disabled class="w-full bg-gray-200" wire:model="slug" placeholder="Slug de producto" />
        <x-input-error for="slug"/>
    </div>

    {{-- Description --}}
    <div class="mb-4">
        <x-label value="Descripcion" />
        <textarea class="w-full form-control" wire:model="description" rows="4"></textarea>
    </div>

    <div class="grid grid-cols-2 gap-6 mb-4">
        {{-- Precio --}}
        <div>
            <x-label value="Precio" />
            <x-input type="number" wire:model="price" class="w-full" step="0.01" />
            <x-input-error for="price"/>
        </div>

        {{-- Cantidad --}}
        <div class="mb-4">
            <x-label value="Cantidad" />
            <x-input type="number" wire:model="quantity" class="w-full" />
            <x-input-error for="quantity"/>
        </div>
    </div>

    <div class="flex mt-4">
        <x-button
            wire:loaging.attr="disabled"
            wire:target="save"
            wire:click="save"
            class="ml-auto">
            Crear producto
        </x-button>
    </div>
</div>
