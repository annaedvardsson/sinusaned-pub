<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            sinusdark: "#303030",   //dark grey/black
                            sinuslight: "#ffffff",  //white
                            sinuscard: "#ededed",   //light grey
                            hover: "#ffc911",       //yellow
                        },
                    },
                },
            };
        </script>
        <title>Sinus</title>
    </head>


    <body class="mb-36">
        <span class="flex justify-center p-3 bg-sinuslight">
            <a href="{{ route('products.main') }}"><img class="w-64" src="{{ asset('images/sinus-logo-landscape - large.png') }}" alt="" class="logo" /></a>
        </span>

        @auth
            <span class="flex justify-center p-3 bg-sinusdark text-sinuslight font-bold text-xl">
                Welcome to Sinus Webshop, {{ ucfirst(auth()->user()->name) }}
            </span>
        @endauth

        <nav class="flex justify-end mb-4 p-3 bg-sinusdark text-sinuslight">
            @php
                if (auth()->check()) {
                    $cart = \App\Models\Cart::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->first();
                } else {
                    $cart = \App\Models\Cart::where('session_id', session()->getId())->orderBy('id', 'desc')->first();
                }

                if ($cart && $cart->is_accessible == 1) {
                    $cartCount = $cart->cartDetails->where('is_accessible', 1)->sum('quantity');
                } else {
                    $cartCount = 0;
                }

                if (auth()->check()) {
                    if (auth()->user()->role_id == 1) {
                        $ordersIndexRoute = 'orders.adminindex';
                    } else {
                        $ordersIndexRoute = 'orders.index';
                    }
                }

            @endphp

            @if ($cartCount == 0)
                <i class="fa-solid fa-shopping-cart p-1 pr-5" title="No products in shopping cart"></i>
            @else
                <a class="px-2 text-sinuslight hover:text-hover pr-10" href="{{ route('carts.show', ['cart' => $cart->id]) }}">
                    <i class="fa-solid fa-shopping-cart p-1"></i>
                    @if ($cartCount > 0)
                        <span class="text-xs bg-sinuslight text-sinusdark hover:bg-hover rounded-full px-2 py-1">{{ $cartCount }}</span>
                    @endif
                </a>
            @endif

            @can('viewedByAdmin')
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route('users.index') }}"><i class="fa-solid fa-users p-1"></i> Users</a>
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route('products.index') }}"><i class="fa-solid fa-store p-1"></i> Products</a>
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route('carts.index') }}"><i class="fa-solid fa-cart-shopping p-1"></i> Carts</a>
            @endcan

            @can('viewedByUser')
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route('users.user.show_profile', auth()->user()->id) }}"><i class="fa-solid fa-user p-1"></i> Profile</a>
            @endcan

            @auth
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route($ordersIndexRoute) }}"><i class="fa-solid fa-bag-shopping p-1"></i> Orders</a>
                <form method="post" class="inline" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-2 text-sinuslight hover:text-hover"><i class="fa-solid fa-door-closed p-1"></i> Logout</button>
                </form>
            @else
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route('register') }}"><i class="fa-solid fa-user-plus p-1"></i> Register</a>
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket p-1"></i> Login</a>
            @endauth
        </nav>


        <main>
            {{$slot}}
        </main>


        <footer class="fixed bottom-0 left-0 w-full flex justify-between items-center bg-sinusdark text-sinuslight h-20 pl-5 pr-5">
            <div class="font-bold">
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route('about') }}">About</a>
                <a class="px-2 text-sinuslight hover:text-hover" href="{{ route('contact') }}">Contact</a>
            </div>

            <p class="ml-2">
                <span>Copyright &copy; 2023,</span><br class="md:hidden">
                <span class="md:inline-block">All Rights reserved</span>
            </p>

            <div class="flex flex-wrap">
                <div class="flex flex-wrap">
                    <a class="p-1" href="https://twitter.com/" target="_blank">
                        <img src="{{ asset('images/logo-twitter.svg') }}" alt="Twitter" width="32" height="32">
                    </a>
                    <a class="p-1" href="https://facebook.com/" target="_blank">
                        <img src="{{ asset('images/logo-facebook.svg') }}" alt="Facebook" width="32" height="32">
                    </a>
                </div>
                <div class="flex flex-wrap">
                    <a class="p-1" href="https://linkedin.com/" target="_blank">
                        <img src="{{ asset('images/logo-linkedin.svg') }}" alt="Linkedin" width="32" height="32">
                    </a>
                    <a class="p-1" href="https://www.instagram.com/" target="_blank">
                        <img src="{{ asset('images/logo-instagram.svg') }}" alt="Instagram" width="32" height="32">
                    </a>
                </div>
            </div>
        </footer>

        <x-flash-message />
    </body>
</html>
