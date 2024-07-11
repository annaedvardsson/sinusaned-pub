<x-layout> 

    <header class="text-center">
        <h2 class="text-3xl font-bold mb-1">Are you sure that you want to delete this user?</h2>     
    </header>

    <div class="mx-4 flex flex-col items-center justify-center text-center">
        <form method="POST" action="{{ route('users.confirm_delete', ['user' => $user->id]) }}">
            @csrf
            @method('delete')

            <div class="mb-6">
                <x-primary-button>Confirm Delete</x-primary-button>
                <a href="{{ route('users.index')}}" class="text-black m-10 ml-4"><i class="fa-solid fa-arrow-left"></i> Back to Users</a>
            </div>
        </form>
    </div>

</x-layout>