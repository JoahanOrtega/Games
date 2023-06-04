<div wire:init="loadPosts">
    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow {{ $loop->last ? '' : 'mr-4' }}">
                        <article>
                            <figure>

                                @if ($product->images->count())
                                    <img class="h-48 w-56 object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                @else
                                    <img class="h-48 w-56 object-cover object-center"
                                        src="https://images.pexels.com/photos/16450166/pexels-photo-16450166/free-photo-of-animal-mascota-mono-pelo.jpeg">
                                @endif

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
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl">

            <svg class="rounded animate-spin ease duration-300 w-10 h-10 " fill="none" height="48"
                viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4"
                    stroke="#F97316" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
            </svg>

        </div>
    @endif


</div>
