<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Productos
                </h1>

                <x-danger-button wire:click="$emit('deleteProduct')">
                    Eliminar
                </x-danger-button>
            </div>

        </div>

    </header>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <h1 class="text-3xl text-center font-semibold mb-8">Complete esta informacion para crear un producto</h1>
    
        <div class="mb-4" wire:ignore>
            <form action="{{ route('admin.products.files', $product) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>
    
        @if ($product->images->count())
            <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
                <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del producto</h1>
                <ul class="flex flex-wrap">
                    @foreach ($product->images as $image)
                        <li class="relative" wire:key="image-{{ $image->id }}">
                            <img class="w-32 h-20 object-cover" src="{{ Storage::url($image->url) }}" alt="">
                            <x-danger-button class="absolute right-2 top-2" wire:click="deleteImage({{ $image->id }})"
                                wire:loading.attr="disable" wire:target="deleteImage({{ $image->id }})">
                                x
                            </x-danger-button>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif
    
        <div class="bg-white shadow-xl rounded-lg p-6">
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
    
                    <x-input-error for="category_id" />
                </div>
                {{-- Genero --}}
                <div>
                    <x-label value="Generos" />
                    <select class="w-full form-control" wire:model="product.subcategory_id">
                        <option value="" selected disabled>Seleccione un genero</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="product.subcategory_id" />
                </div>
            </div>
    
            {{-- Nombre --}}
            <div class="mb-4">
                <x-label value="Nombre" />
                <x-input type="text" class="w-full" wire:model="product.name" placeholder="Nombre de producto" />
                <x-input-error for="product.name" />
            </div>
    
            {{-- Slug --}}
            <div class="mb-4">
                <x-label value="Slug" />
                <x-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                    placeholder="Ingrese el slug del producto" />
    
                <x-input-error for="slug" />
            </div>
    
            {{-- Description --}}
            <div class="mb-4">
                <x-label value="Descripcion" />
                <textarea class="w-full form-control" wire:model="product.description" rows="4"></textarea>
            </div>
    
            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Precio --}}
                <div>
                    <x-label value="Precio" />
                    <x-input type="number" wire:model="product.price" class="w-full" step="0.01" />
                    <x-input-error for="product.price" />
                </div>
    
                {{-- Cantidad --}}
                <div class="mb-4">
                    <x-label value="Cantidad" />
                    <x-input type="number" wire:model="product.quantity" class="w-full" />
                    <x-input-error for="product.quantity" />
                </div>
            </div>
    
            <div class="flex mt-4 justify-end items-center">
                <x-action-message class="mr-3" on="saved">
                    Actualizado
                </x-action-message>
    
                <x-button wire:loaging.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar producto
                </x-button>
            </div>
        </div>
    
    
    </div>
    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }
            };

            Livewire.on('deleteProduct', () => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.edit-product', 'delete');
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush
</div>
