<x-layout>

    <p class="flex justify-center text-2xl underline uppercase font-bold mt-10 mb-5">ADMINSHOW</p>
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
                <th class="text-lg pr-5">Cart id</th>
                <th class="text-lg pr-5">User id</th>
                <th class="text-lg pr-5">Session ID</th>
                <th class="text-lg pr-5">Total amount (€)</th>
                <th class="text-lg pr-5">Is accessible</th>
                <th class="text-lg pr-5">Created</th>
                <th class="text-lg pr-5">Updated</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-gray-300">
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg capitalize">
                    <p>{{$cart->id}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$cart->user_id}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$cart->session_id}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$cart->total_sum}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$cart->is_accessible}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$cart->created_at}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$cart->updated_at}}</p>
                </td>
            </tr>
        </tbody>
    </table>


    <p class="flex justify-center text-2xl underline uppercase font-bold mt-10 mb-5">Products</p>
    <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5 text-center">
                <th class="text-lg pr-5">Cart Detail id</th>
                <th class="text-lg pr-5">Category</th>
                <th class="text-lg pr-5">Color</th>
                <th class="text-lg pr-5">Quantity</th>
                <th class="text-lg pr-5">Price (€)</th>
                <th class="text-lg pr-5">Sub total (€)</th>
                <th class="text-lg pr-5">Is accessible</th>
                <th class="text-lg pr-5">Created</th>
                <th class="text-lg pr-5">Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart->cartDetails as $cartDetail)
                <tr class="border-gray-300">
                    <form method="POST" action="{{ route('carts.updateCartDetail', $cartDetail->id) }}">
                        @csrf
                        @method('put')
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg capitalize">
                            <p>{{$cartDetail->id}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$cartDetail->product->category->category}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$cartDetail->product->color->color}}</p>
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
                            <p>{{$cartDetail->is_accessible}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$cartDetail->created_at}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$cartDetail->updated_at}}</p>
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
            @endforeach
        </tbody>
    </table>

</x-layout>