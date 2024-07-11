<x-layout> 

    <header class="text-center">
        <h2 class="text-3xl font-bold mb-1">Are you sure that you want to delete this product?</h2>     
    </header>

    <div class="mx-4 flex flex-col items-center justify-center text-center">
        <form method="POST" action="{{ route('products.confirm_delete', ['product' => $product->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('delete')

            <div class="mb-6">
                <x-primary-button>Confirm Delete</x-primary-button>
                <a href="{{ route('products.index')}}" class="text-black m-10 ml-4"><i class="fa-solid fa-arrow-left"></i> Back to products</a>
            </div>
        </form>
    </div>

</x-layout>