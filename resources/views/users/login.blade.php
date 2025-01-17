<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
        <p class="mb-4">Log into your account</p>
    </header>

    <div class="flex justify-center md:justify-center">
        <form action="{{ route('authenticate')}}" method="post">
            @csrf            
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}"/>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="{{old('password')}}"/>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <x-primary-button type="submit">Sign In</x-primary-button>
            </div>
            <div class="mt-8">
                <p>Don't have an account? <a href="{{ route('register') }}" class="underline">Register</a></p>
            </div>
        </form>
    </div>
</x-layout>