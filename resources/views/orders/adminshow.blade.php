<x-layout>
    
    <p class="flex justify-center text-3xl uppercase font-black mt-10 mb-5">Order confirmation, order {{ $order->id }} </p>

    <p class="flex justify-center text-2xl underline uppercase font-bold mt-10 mb-5">Contact Details / Delivery address</p>
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
                    <p>{{$order->user->name}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->user->address}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->user->zip}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->user->city}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->user->phone}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->user->email}}</p>
                </td>
            </tr>
        </tbody>
    </table>


    <p class="flex justify-center text-2xl underline uppercase font-bold mt-10 mb-5">Order Information</p>
    <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5 text-center">
                <th class="text-lg pr-5">Order id</th>
                <th class="text-lg pr-5">User id</th>
                <th class="text-lg pr-5">Cart id</th>
                <th class="text-lg pr-5">Total amount (€)</th>
                <th class="text-lg pr-5">Is accessible</th>
                <th class="text-lg pr-5">Created</th>
                <th class="text-lg pr-5">Updated</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-gray-300">
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg capitalize">
                    <p>{{$order->id}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->user_id}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->cart_id}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->total_sum}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->is_accessible}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->created_at}}</p>
                </td>
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                    <p>{{$order->updated_at}}</p>
                </td>
            </tr>
        </tbody>
    </table>


    <p class="flex justify-center text-2xl underline uppercase font-bold mt-10 mb-5">Products</p>
    <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5 text-center">
                <th class="text-lg pr-5">Order Detail id</th>
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
            @foreach($order->orderDetails as $orderDetail)
                <tr class="border-gray-300">
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg capitalize">
                        <p>{{$orderDetail->id}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$orderDetail->product->category->category}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$orderDetail->product->color->color}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$orderDetail->quantity}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$orderDetail->product->price}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$orderDetail->quantity * $orderDetail->product->price}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$orderDetail->is_accessible}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$orderDetail->created_at}}</p>
                    </td>
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                        <p>{{$orderDetail->updated_at}}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center text-sinusdark mt-5">
        <a href="{{ route('products.main') }}" class="text-sinusdark m-10 mt-5"><i class="fa-solid fa-arrow-left"></i> Back to main</main></a>
    </div>

</x-layout>