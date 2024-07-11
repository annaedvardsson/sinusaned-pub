<x-layout>

    <div class="flex flex-wrap items-center justify-around ">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-1 space-y-2 md:space-y-0 mx-2">
            @foreach ($productsWithSameTitle as $variant)
                <a href="{{ route('products.show', $variant->id) }}">
                    <img
                        class="w-24 h-36 object-contain p-1 md:block"
                        src="{{$variant->image ? asset('storage/products/' . $variant->image) : asset('images/no-image-available.png')}}"
                        alt="/{{ $variant->title }} Image" loading="lazy"
                    >
                </a>
            @endforeach
        </div>
        <img
            class="w-96 h-96 object-contain justify-center p-1 md:block"
            src="{{$product->image ? asset('storage/products/' . $product->image) : asset('images/no-image-available.png')}}"
            alt="product image" loading="lazy"
        />
        <div class="w-48 ml-3 mt-3">
            <p class="text-2xl">{{ ucfirst($product->title) }}</p>
            <p class="font-bold">{{ ucfirst($product->description) }}</p>
            <p>Color: {{ ucfirst($product->color->color) }}</p>
            <p>Category: {{ ucfirst($product->category->category) }}</p>
            <p>Price: €{{$product->price}}</p>
        </div>
    </div>
    <div class="flex justify-center text-sinusdark mt-5">
        <form action="{{ route('carts.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit">
                <x-primary-button>Add to cart</x-primary-button>
            </button>
        </form>
    </div>

</x-layout>
