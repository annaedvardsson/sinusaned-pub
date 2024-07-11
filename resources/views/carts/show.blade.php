<x-layout>

    <p class="flex justify-center text-2xl underline uppercase font-bold mt-10 mb-5">Contact Details / Delivery address</p>
    @if ($cart->user)
        <table class="w-full table-auto rounded-sm text-center">
            <thead>
                <tr class="border-gray-300 mt-5 text-center">
                    <th class="text-lg pr-5">Name</th>
                    <th class="text-lg pr-5">Address</th>
                    <th class="text-lg pr-5">Zip code</th>
                    <th class="text-lg pr-5">City</th>
                    <th class="text-lg pr-5">Phone</th>
                    <th class="text-lg pr-5">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-gray-300 text-center">
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$cart->user->name}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$cart->user->address}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$cart->user->zip}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$cart->user->city}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$cart->user->phone}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$cart->user->email}}</p>
                    </td>
                </tr>
            </tbody>
        </table>        
    @else
        <div class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center">
            <p>No user information</p>
        </div>
    @endif

    <p class="flex justify-center text-2xl underline uppercase font-bold mt-10 mb-5">Cart Information</p>
    <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5 text-center">
                <th class="text-lg pr-5">Total amount (€)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-gray-300">
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$cart->total_sum}}</p>
                </td>
            </tr>
        </tbody>
    </table>


    <p class="flex justify-center text-2xl underline uppercase font-bold mt-10 mb-5">Products</p>
    <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5 text-center">
                <th class="text-lg pr-5">Image</th>
                <th class="text-lg pr-5">Title</th>
                <th class="text-lg pr-5">Category</th>
                <th class="text-lg pr-5">Color</th>
                <th class="text-lg pr-5">Quantity</th>
                <th class="text-lg pr-5">Price (€)</th>
                <th class="text-lg pr-5">Sub total (€)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart->cartDetails as $cartDetail)
                @if ($cartDetail->is_accessible == 1)
                    <tr class="border-gray-300">
                        <form method="POST" action="{{ route('carts.updateCartDetail', $cartDetail->id) }}">
                            @csrf
                            @method('put')

                            <td class="px-4 py-2 border-t border-b border-gray-300 text-lg flex justify-center">
                                <img
                                    class="w-12 h-18 object-contain p-1 bg-sinuscard md:block"
                                    src="{{$cartDetail->product->image ? asset('storage/products/' . $cartDetail->product->image) : asset('images/no-image-available.png')}}"
                                    alt="product image" loading="lazy"
                                />
                            </td>
                            <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                                <p>{{ ucfirst($cartDetail->product->title) }}</p>
                            </td>
                            <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                                <p>{{ ucfirst($cartDetail->product->category->category) }}</p>
                            </td>
                            <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                                <p>{{ ucfirst($cartDetail->product->color->color) }}</p>
                            </td>
                            <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-green-600 font-bold max-w-xs">
                                <input type="number" class="border border-gray-300 rounded text-center p-2" name="quantity" min="0" max="{{$cartDetail->product->stock}}" value="{{$cartDetail->quantity}}"/>
                            </td>
                            <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                                <p>{{$cartDetail->product->price}}</p>
                            </td>
                            <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                                <p>{{$cartDetail->quantity * $cartDetail->product->price}}</p>
                            </td>
                            <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                                <button type="submit" class="button-edit text-green-600" name="button_pressed" value="update">
                                    <i class="fa-solid fa-pen-to-square"></i> Save new quantity
                                </button>
                                <br>
                                <button type="submit" class="button-delete text-red-700" name="button_pressed" value="remove">
                                    <i class="fa-solid fa-trash"></i> Remove product
                                </button>
                            </td>
                        </form>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    @if ($cart->user)
        <div class="flex justify-center text-sinusdark mt-5">
            <form action="{{ route('orders.store', $cart->id) }}" method="POST">
                @csrf
                <button type="submit">
                    <x-primary-button>Order products</x-primary-button>
                </button>
                <a href="{{ route('products.main') }}" class="text-sinusdark m-10 ml-4"><i class="fa-solid fa-arrow-left"></i> Continue shopping</a>
            </form>
        </div>    
    
    @else
        <div class="px-4 py-2 border-gray-300 text-2xl text-center">
            <p>
                Please
                <a href= {{ route('login') }} class="underline">Login</a>
                or
                <a href={{ route('register') }} class="underline">Register</a>
                to order products
            </p>
        </div>
        <div class="flex justify-center">
            <a href="{{ route('products.main') }}" class="text-sinusdark"><i class="fa-solid fa-arrow-left"></i> Continue shopping</a>
        </div>
    @endif
    
</x-layout>