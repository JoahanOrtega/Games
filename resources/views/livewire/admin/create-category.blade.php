<div>
    <x-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva categoria
        </x-slot>

        <x-slot name="description">
            Complete la informacion necesario para poder crear una nueva categoria
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Nombre
                </x-label>

                <x-input wire:model="createForm.name" type="text" class="w-full mt-1" />

                <x-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Imagen
                </x-label>

                <x-input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" name=""
                    id="{{ $rand }}" />

                <x-input-error for="createForm.image" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                Categoria creada
            </x-action-message>

            <x-button>
                Agregar
            </x-button>
        </x-slot>
    </x-form-section>

    <x-action-section>
        <x-slot name="title">
            Lista de categorias
        </x-slot>

        <x-slot name="description">
            Aqui encontraras todas las categorias agregadas
        </x-slot>

        <x-slot name="content">
            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2 ">Accion</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2">
                                <a href="{{route('admin.categories.show', $category)}}" 
                                    class="uppercase underline hover:text-blue-600">
                                    {{ $category->name }}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $category->id }}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer"
                                        wire:click="$emit('deleteCategory', '{{ $category->id }}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-action-section>

    <x-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar categoria
        </x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    @if ($editImage)
                        <img class="w-full h-64 object-cover object-center" src="{{ $editImage->temporaryUrl() }}"
                            alt="">
                    @else
                        <img class="w-full h-64 object-cover object-center" src="{{  Storage::url($editForm['image']) }}"
                            alt="">
                    @endif
                </div>

                <div>
                    <x-label>
                        Nombre
                    </x-label>

                    <x-input wire:model="editForm.name" type="text" class="w-full mt-1" />

                    <x-input-error for="editForm.name" />
                </div>

                <div>
                    <x-label>
                        Imagen
                    </x-label>

                    <x-input wire:model="editImage" accept="image/*" type="file" class="mt-1" name=""
                        id="{{ $rand }}" />

                    <x-input-error for="editImage" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-danger-button
                wire:click="update"
                wire:loading.attr="disabled"
                wire:target="editImage, update">
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
