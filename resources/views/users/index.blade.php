<x-layout>

    {{-- @include('partials._search-filter-products') --}}

    <header>
        <h2 class="text-3xl text-center font-bold my-6 uppercase">User list</h2>
        <div class="flex justify-center md:justify-center mt-1 mb-5">        
            <x-primary-button><a href="{{ route('users.create') }}">Create New User</a></x-primary-button>
        </div>      
    </header>

   <table class="w-full table-auto rounded-sm text-center">
        <thead>
            <tr class="border-gray-300 mt-5">
               <th class="text-lg pr-5">User id</th>
               <th class="text-lg pr-5">Role</th>
               <th class="text-lg pr-5">Name</th>
               <th class="text-lg pr-5">Address</th>
               <th class="text-lg pr-5">Zip code</th>
               <th class="text-lg pr-5">City</th>
               <th class="text-lg pr-5">Phone</th>
               <th class="text-lg pr-5">Email</th>
               <th class="text-lg pr-5">Is_accessible</th>
               <th class="text-lg pr-5">Created</th>
               <th class="text-lg pr-5">Updated</th>
               <th class="text-lg pr-5">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!$users->isEmpty())
                @foreach($users as $user)
                    <tr class="border-gray-300 cursor-pointer" onclick="window.location='{{ route('users.user.show_profile', $user->id) }}'">
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$user->id}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{ ucfirst($user->role->role) }}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$user->name}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$user->address}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$user->zip}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$user->city}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$user->phone}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg max-w-xs">
                            <p>{{$user->email}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$user->is_accessible}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$user->created_at}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg text-center max-w-lg">
                            <p>{{$user->updated_at}}</p>
                        </td>
                        <td class="px-4 py-2 border-t border-b border-gray-300 text-lg capitalize text-right">
                            <a href="{{ route('users.edit', $user->id) }}"><x-primary-button>Edit</x-primary-button></a> <br>
                        </td>
                    </tr>  
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No users found</p>
                    </td>
                </tr>
            @endif  
        </tbody>
   </table>

    {{-- Pagination --}}
    <div class="mt-6 p-4">
        {{$users->onEachSide(0)->links()}}
    </div>

</x-layout>