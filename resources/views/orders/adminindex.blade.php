<x-layout>

    <header>
        <h2 class="text-3xl text-center font-bold my-6 uppercase">Order list</h2>
    </header>

    <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5">
                <th class="text-lg pr-5">Order id</th>
                <th class="text-lg pr-5">User id</th>
                <th class="text-lg pr-5">Cart id</th>
                <th class="text-lg pr-5">Total amount</th>
                <th class="text-lg pr-5">Is accessible</th>
                <th class="text-lg pr-5">Created</th>
                <th class="text-lg pr-5">Updated</th>
            </tr>
        </thead>
        <tbody>
            @if(!$orders->isEmpty())
                @foreach($orders as $order)
                    <tr class="border-gray-300 cursor-pointer" onclick="window.location='{{ route('orders.adminshow', $order->id) }}'">
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
                @endforeach
            @else
                <tr class="border-gray-300 text-center">
                    <td class="px-4 py-2 border-t border-b border-gray-300 text-lg" colspan="7">
                        <p>No orders found</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

</x-layout>