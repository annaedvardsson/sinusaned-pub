<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
        <p class="mb-4">Create an account to shop cool Sinus stuff</p>
    </header>

    <div class="flex justify-center md:justify-center">
        <form action="{{ route('registerstore') }}" method="post">
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
                <x-primary-button type="submit">Sign Up</x-primary-button>
            </div>

            <div class="mt-8">
                <p>Already have an account? <a href="{{ route('login') }}" class="underline">Login</a></p>
            </div>
        </form>
    </div>
</x-layout>