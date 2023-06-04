<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-center items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>
        </div>
    </div>


    <div class="grid grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2">Generos</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-orange-500 capitalize {{ $genero == $subcategory->name ? 'text-orange-500 font-semibold' : '' }}"
                            wire:click="$set('genero','{{ $subcategory->name }}')" href="#">{{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <x-button class="mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-button>
        </aside>

        <div class="col-span-4">
            <ul class="grid grid-cols-4 gap-6">
                @forelse ($products as $product)
                    <li class="bg-white rounded-lg shadow">
                        <article>
                            <figure>
                                <img class="h-48 w-56 object-cover object-center"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            </figure>
                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold">
                                    <a href="{{ route('products.show', $product) }}">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                </h1>

                                <p class="font-bold text-neutral-700">US$ {{ $product->price }}</p>

                            </div>
                        </article>
                    </li>
                @empty
                    <li class="col-span-4">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Upps!</strong>
                            <span class="block sm:inline">Parece que no hay ningun videojuego</span>
                            
                        </div>
                    </li>
                @endforelse
            </ul>
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
