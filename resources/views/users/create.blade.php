<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create new User</h2>
    </header>

    <div class="flex justify-center md:justify-center">
        <form action="{{ route('users.index') }}" method="post">
        @csrf      
            <div class="mb-6">
                <label for="name" class="inline-block mb-1">Full name</label>
                <input type="text" class="border border-sinusdark rounded p-2 w-full" name="name" placeholder="Jane Doe" value="{{old('name')}}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="address" class="inline-block mb-1">Address</label>
                <input type="text" class="border border-sinusdark rounded p-2 w-full" name="address" placeholder="Sinus avenue 1" value="{{old('address')}}"/>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="zip" class="inline-block mb-1">Zip Code</label>
                <input type="text" class="border border-sinusdark rounded p-2 w-full" name="zip" placeholder="999 99" value="{{old('zip')}}"/>
                @error('zip')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="city" class="inline-block mb-1">City</label>
                <input type="text" class="border border-sinusdark rounded p-2 w-full" name="city" placeholder="Sinusville" value="{{old('city')}}"/>
                @error('city')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="phone" class="inline-block mb-1">Phone Number (0XX-XXXXXXX)</label>
                <input type="tel" class="border border-sinusdark rounded p-2 w-full" name="phone" placeholder="999-99999" value="{{old('phone')}}"
                placeholder="070-5555555"/>
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block mb-1">Email</label>
                <input type="email" class="border border-sinusdark rounded p-2 w-full" name="email" placeholder="jane.doe@sinusville.se" value="{{old('email')}}"/>
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
                        <option value="{{ $role->id }}" {{ (old('role_id') == $role->id || empty(old('role_id'))) && $role->role == 'user' ? 'selected' : '' }}>
                            {{ ucfirst($role->role) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="is_accessible" class="inline-block text-lg mb-2">Should User be visible/accessible</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="is_accessible" placeholder="(1 = yes, 0 = no)" value="{{old('is_accessible')}}"/>
                @error('is_accessible')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <x-primary-button>Save User</x-primary-button>
                <a href="{{ route('users.index') }}" class="text-sinusdark m-10 ml-4"><i class="fa-solid fa-arrow-left"></i> Back to Users</a>
            </div>
        </form>
    </div>
</x-layout>