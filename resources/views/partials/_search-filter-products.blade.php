
<div class="border-2 border-card m-4 rounded-lg">
    <form action="{{ route('products.index') }}" method="GET">
        <div class="p-2 {{ request()->has('showFilters') ? '' : 'hidden' }}">

            <div class="p-2 w-full">
                <div class="relative border-2 border-card m-2 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                    </div>
                    <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search product title or description..." value="{{ request('search') }}"/>
                    <div class="absolute top-1 right-2">
                        <x-primary-button type="submit">Search/Filter</x-primary-button>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full mx-4">
                    <h2 class="font-bold mb-1">Visible in webshop</h2>
                    <div class="flex flex-wrap">
                        <div class="flex items-center w-1/2 md:w-1/4 xl:w-1/6">
                            <input type="checkbox" name="is_accessibles[]" value="1" id="is_accessible_yes" {{ in_array('1', request('is_accessibles', [])) ? 'checked' : '' }}>
                            <label for="is_accessible_yes" class="ml-2">Yes (1)</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="is_accessibles[]" value="0" id="is_accessible_no" {{ in_array('0', request('is_accessibles', [])) ? 'checked' : '' }}>
                            <label for="is_accessible_no" class="ml-2">No (0)</label>
                        </div>
                    </div>
                </div>
                <div class="w-full mx-4">
                    <h2 class="font-bold mb-1">Categories</h2>
                    <div class="flex flex-wrap">
                        @foreach($categories as $category)
                            <div class="flex items-center w-1/2 md:w-1/4 xl:w-1/6">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="{{ $category->id }}" {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                <label for="{{ $category->id }}" class="ml-2">{{ ucfirst($category->category) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full mx-4">
                    <h2 class="font-bold mb-1">Colors</h2>
                    <div class="flex flex-wrap">
                        @foreach($colors as $color)
                            <div class="flex items-center w-1/2 md:w-1/4 xl:w-1/6">
                                <input type="checkbox" name="colors[]" value="{{ $color->id }}" id="{{ $color->id }}" {{ in_array($color->id, request('colors', [])) ? 'checked' : '' }}>
                                <label for="{{ $color->id }}" class="ml-2">{{ ucfirst($color->color) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

            
        <!-- Buttons to show and clear the form -->
        <div class="flex justify-end p-2 w-full">
            <button type="submit" name="showFilters" value="1" class="inline-flex items-center mt-2 mr-2 px-4 py-2 bg-sinusdark border border-sinusdark rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-hover focus:bg-sinusdark active:bg-sinusdark focus:outline-none focus:ring-2 focus:ring-hover focus:ring-offset-2 transition ease-in-out duration-150">
                Show Search/Filters
            </button>
            <x-secondary-button><a href="{{ route('products.index') }}">Clear filters</a></x-secondary-button>
        </div>
    </form>
</div>
