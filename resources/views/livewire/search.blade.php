<div class="flex-1 relative" x-data>
    <x-input wire:model="search" type="text" class="w-full" placeholder="¿Estás buscando algún producto?" />
    <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md">
        <x-search size="35" color="white" />
    </button>

    <div class="absolute w-full mt-1 hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">
                        @if ($product->images->count())
                            <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}"
                                alt="">
                        @else
                            <img class="w-16 h-12 object-cover"
                                src="https://images.pexels.com/photos/16450166/pexels-photo-16450166/free-photo-of-animal-mascota-mono-pelo.jpeg">
                        @endif
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p>Categoria: {{ $product->subcategory->category->name }}</p>
                        </div>
                    </a>

                @empty
                    <p class="text-lg leading-5">No existe ningun registro con los parametros especificados</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
