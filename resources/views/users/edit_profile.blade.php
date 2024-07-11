<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Edit Profile</h2>
    </header>

    <div class="flex justify-center md:justify-center">
        <form action="{{ route('users.user.update_profile', auth()->user()->id) }}" method="post">
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
                {{-- <input type="password" class="border border-sinusdark rounded p-2 w-full" name="password" value="{{$user->password}}"/> --}}
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
                <x-primary-button>Update Profile</x-primary-button>
                <a href="{{ route('products.main') }}"><i class="fa-solid fa-arrow-left"></i> Back to main</a>
            </div>
        </form>
    </div>
</x-layout>