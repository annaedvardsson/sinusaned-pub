<x-layout>    
    
    <h2 class="text-center text-2xl font-bold uppercase mt-5 mb-1">Add new product to the webshop</h2>       

    <div class="flex justify-center md:justify-center">
        <form method="POST" action="{{ route('products.index') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2">Category</label>
                <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 block w-full p-2.5 mb-2 text-lg">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>
                            {{ ucfirst($category->category) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="color" class="inline-block text-lg mb-2">Color</label>
                <select name="color_id" class="bg-gray-50 border border-gray-300 text-gray-900 block w-full p-2.5 mb-2 text-lg">
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" {{ (old('color_id') == $color->id) ? 'selected' : '' }}>
                            {{ ucfirst($color->color) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="cap - blue" value="{{old('title')}}"/>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description" placeholder="Cap with Sinus logo" value="{{old('description')}}"/>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">Image file name (format: sinus-category-image/description.png or .jpg)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="image" placeholder="sinus-cap-blue.png" value="{{old('image')}}"/>
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price" placeholder="10" value="{{old('price')}}"/>
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="stock" class="inline-block text-lg mb-2">Stock</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="stock" placeholder="20" value="{{old('stock')}}"/>
                @error('stock')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="is_accessible" class="inline-block text-lg mb-2">Should product be displayed in webshop</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="is_accessible" placeholder="(1 = yes, 0 = no)" value="{{old('is_accessible')}}"/>
                @error('is_accessible')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <x-primary-button>Save product</x-primary-button>
                <a href="{{ route('products.index') }}" class="text-sinusdark m-10 ml-4"><i class="fa-solid fa-arrow-left"></i> Back to products</a>
            </div>
        </form>
    </div>

</x-layout>
