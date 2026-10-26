<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuoteIt - @yield('title', 'Home')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#393E46] text-[#DCD7C9] font-sans min-h-screen flex flex-col bg-cover bg-center bg-fixed" 
      style="background-image: linear-gradient(rgba(34, 40, 49, 0.85), rgba(57, 62, 70, 0.85)), url('{{ asset('images/background.png') }}');">

    @include('components.navbar')

    <main class="flex-grow container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <footer class="text-center py-4 text-xs text-[#DCD7C9]/60 font-medium border-t border-[#393E46]/50 bg-[#222831]/80 backdrop-blur-sm">
        &copy; {{ date('Y') }} QuoteIt. All rights reserved.
    </footer>

</body>
</html>