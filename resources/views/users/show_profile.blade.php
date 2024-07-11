<x-layout>

    <header class="text-center">
        <h3 class="text-3xl font-bold mb-2 capitalize">{{$user->name}}</h3>
    </header>

    <div class="text-center text-sinusdark ml-3 mt-3">
        <p class="text-2xl">{{ ucfirst($user->address) }}</p>
        <p class="text-2xl mb-3">{{ ucfirst($user->zip) }} {{ ucfirst($user->city) }}</p>
        <p>Phone: {{ $user->phone }}</p>
        <p class="mb-5">Email: {{ $user->email }}</p>
        <p class="mb-5">Password: ******</p>
        <a href="{{ route('users.user.edit_profile', $user->id) }}"><x-primary-button>Edit profile</x-primary-button></a>
        <a href="{{ route('products.main') }}"><i class="fa-solid fa-arrow-left"></i> Back to main</a>
    </div>

</x-layout>