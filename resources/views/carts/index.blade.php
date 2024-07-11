<x-layout>

    @php
        if (auth()->user()->role_id == 1) {
            $routeName = 'carts.adminshow';
        } else {
            $routeName = 'carts.show';
        }
    @endphp

    <header>
        <h2 class="text-3xl text-center font-bold my-6 uppercase">Cart list</h2>
    </header>

    <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5">
                <th class="text-lg pr-5">Cart id</th>
                <th class="text-lg pr-5">User id</th>
                <th class="text-lg pr-5">Session id</th>
                <th class="text-lg pr-5">Total amount</th>
                <th class="text-lg pr-5">Is accessible</th>
                <th class="text-lg pr-5">Created</th>
                <th class="text-lg pr-5">Updated</th>
            </tr>
        </thead>
        <tbody>
            @if(!$carts->isEmpty())
                @foreach($carts as $cart)
                    <tr class="border-gray-300 cursor-pointer" onclick="window.location='{{ route($routeName, $cart->id) }}'">
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
                @endforeach
            @else
                <tr class="border-gray-300">
                <td class="px-4 py-2 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">No carts found</p>
                </td>
                </tr>
            @endif
        </tbody>
   </table>


</x-layout>