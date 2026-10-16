<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'My Website')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-screen bg-center bg-fixed bg-no-repeat"
    style="
        background-image: url('{{ asset('images/background.png') }}');
        background-size: cover;
    "
>

    <nav class="relative sticky top-0 z-50 border-b border-white/30 bg-[#10081F] shadow-sm backdrop-blur-md">
        <p class="site-name">QuoteIt</p>
        <ul class="mx-auto flex max-w-7xl items-center gap-6 px-4 py-1">
            
            @if (($page ?? '') === 'Sign Up')
                <li><a href="/login" class="btn-primary">Log In</a></li>
            @elseif(($page ?? '') === 'Log In')
                <li><a href="/signup" class="btn-primary">Sign Up</a></li>
            @else
                            <li><a href="/logout" class="btn-primary">Log Out</a></li>

                <li>
                    <a href="/profile"
                        class="block rounded-full focus:outline-none focus-visible:ring-4 focus-visible:ring-tuwaiq-purple/30">
                        <img src="{{ asset('images/profile.jpeg') }}" alt="Profile"
                            class="h-10 w-10 rounded-full object-cover ring-2 ring-tuwaiq-purple ring-offset-2 transition hover:scale-105">
                    </a>
                </li>
                <li><a href="/signup" class="text-white">{{ request('name','Guest') }} </a></li>
            @endif
            <li class="ml-auto"><img src="{{ asset('images/logo.png') }}" class=" h-16 w-auto" alt="Logo"></li>


        </ul>
    </nav>


    <main>
        @yield('content')
    </main>

</body>

</html>
