
<x-card>
    <a href="{{ route('products.show', $product->id) }}">
        <div class="flex flex-wrap items-center justify-around mb-3">
            <img
                class="w-48 h-72 object-contain p-1 bg-sinuscard md:block"
                src="{{$product->image ? asset('storage/products/' . $product->image) : asset('images/no-image-available.png')}}"
                alt="product image" loading="lazy"
            />
            <div class="w-48 ml-3 mt-3">
                <p class="text-2xl">{{ ucfirst($product->title) }}</p>
                <p class="font-bold">{{ ucfirst($product->description) }}</p>
                <p>Color: {{ ucfirst($product->color->color) }}</p>
                <p>Price: €{{$product->price}}</p>
            </div>
        </div>
        <div class="flex justify-center">
            <form action="{{ route('carts.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit">
                    <x-primary-button>Add to cart</x-primary-button>
                </button>
            </form>
        </div>
    </a>
</x-card>


