<x-layout>
   
    @include('partials._search-filter-main')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless (count($products) == 0)
            @foreach($products as $product)
                <x-product-card :product='$product' />
            @endforeach
        @else
            <p>No products found</p>
        @endunless
    </div>

    {{-- Pagination --}}
    <div class="mt-6 p-4">
        {{$products->onEachSide(0)->links()}}
    </div>

</x-layout>
