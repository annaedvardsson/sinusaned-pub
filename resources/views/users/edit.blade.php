<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit User</h2>
    </header>

    <div class="flex justify-center md:justify-center">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
      
            <div class="mb-6">
                <label for="name" class="inline-block mb-1">Full name</label>
                <input type="text" class="border border-sinusdark rounded p-2 w-full" name="name" value="{{$user->name}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="address" class="inline-block mb-1">Address</label>
                <input type="text" class="border border-sinusdark rounded p-2 w-full" name="address" value="{{$user->address}}"/>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="zip" class="inline-block mb-1">Zip Code</label>
                <input type="text" class="border border-sinusdark rounded p-2 w-full" name="zip" value="{{$user->zip}}"/>
                @error('zip')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="city" class="inline-block mb-1">City</label>
                <input type="text" class="border border-sinusdark rounded p-2 w-full" name="city" value="{{$user->city}}"/>
                @error('city')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="phone" class="inline-block mb-1">Phone Number (0XX-XXXXXXX)</label>
                <input type="tel" class="border border-sinusdark rounded p-2 w-full" name="phone" value="{{$user->phone}}"
                placeholder="070-5555555"/>
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block mb-1">Email</label>
                <input type="email" class="border border-sinusdark rounded p-2 w-full" name="email" value="{{$user->email}}"/>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="inline-block mb-1">Password</label>
                <input type="password" class="border border-sinusdark rounded p-2 w-full" name="password" placeholder="********" value="{{old('password')}}"/>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password2" class="inline-block mb-1">Confirm Password</label>
                <input type="password" class="border border-sinusdark rounded p-2 w-full" name="password_confirmation" placeholder="********" value="{{old('password_confirmation')}}"/>
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="role" class="inline-block text-lg mb-2">Role</label>
                <select name="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 block w-full p-2.5 mb-2 text-lg">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if ($role->id == $user->role_id) selected @endif>
                            {{ ucfirst($role->role) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="is_accessible" class="inline-block text-lg mb-2">Should User be visible/accessible (1/0)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="is_accessible" value="{{ $user->is_accessible}}"/>
                @error('is_accessible')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <x-primary-button>Update User</x-primary-button>
                <a href="{{ route('users.index') }}" class="text-sinusdark m-10 ml-4"><i class="fa-solid fa-arrow-left"></i> Back to Users</a>
            </div>
        </form>
    </div>
</x-layout>