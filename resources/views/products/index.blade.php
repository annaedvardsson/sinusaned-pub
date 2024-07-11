<x-layout>

    @include('partials._search-filter-products')

    <header>
        <h2 class="text-3xl text-center font-bold my-6 uppercase">Product list</h2>
        <div class="flex justify-center md:justify-center mt-1 mb-5">
            <x-primary-button><a href="{{ route('products.create') }}">Create New Product</a></x-primary-button>
        </div>
    </header>

   <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5">
                <th class="text-lg pr-5">Image</th>
                <th class="text-lg pr-5">Image file name</th>
                <th class="text-lg pr-5">Category</th>
                <th class="text-lg pr-5">Color</th>
                <th class="text-lg pr-5">Title</th>
                <th class="text-lg pr-5">Description</th>
                <th class="text-lg pr-5">Price</th>
                <th class="text-lg pr-5">In stock</th>
                <th class="text-lg pr-5">Visible in shop</th>
                <th class="text-lg pr-5 pl-10">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!$products->isEmpty())
                @foreach($products as $product)
                    <tr class="border-gray-300 cursor-pointer" onclick="window.location='{{ route('products.show', $product->id) }}'">
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg">
                            <img
                                class="w-12 h-18 object-contain p-1 bg-sinuscard md:block"
                                src="{{$product->image ? asset('storage/products/' . $product->image) : asset('images/no-image-available.png')}}"
                                alt="product image" loading="lazy"
                            />
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300">
                            <p>{{$product->image}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center">
                            <p>{{$product->category->category}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$product->color->color}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$product->title}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$product->description}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$product->price}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$product->stock}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$product->is_accessible}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg capitalize text-right">
                            <a href="{{ route('products.edit', $product->id) }}"><x-primary-button>Edit</x-primary-button></a> <br>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No products found</p>
                    </td>
                </tr>
            @endif
        </tbody>
   </table>

    {{-- Pagination --}}
    <div class="mt-6 p-4">
        {{$products->onEachSide(0)->links()}}
    </div>

</x-layout>
