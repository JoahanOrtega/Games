<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <!-- Place somewhere in the <body> of your page -->
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            @if ($image->count())
                                <li data-thumb="{{ Storage::url($image->url) }}">
                                    <img src="{{ Storage::url($image->url) }}" />
                                </li>
                            @else
                                <li data-thumb="Sin imagenes">
                                    <img src="https://images.pexels.com/photos/16450166/pexels-photo-16450166/free-photo-of-animal-mascota-mono-pelo.jpeg">
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <h1 class="text-xl font-bold text-neutral-700">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-neutral-700">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a href="" class="text-orange-500 hover:text-orange-600 underline ml-6">39 reseñas</a>
                </div>

                <p class="text-2xl font-semibold text-neutral-700 my-4">USD ${{ $product->price }}</p>

                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-lime-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-600">Se hace envíos a todo México</p>
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
                @livewire('add-cart-item', ['product' => $product])
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
