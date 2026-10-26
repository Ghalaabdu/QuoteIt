<nav class="bg-[#222831] border-b border-[#393E46] px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        
        <a href="{{ route('home') }}" class="text-2xl font-extrabold text-[#DFD0B8] tracking-wider">
            QuoteIt
        </a>

        <div class="flex items-center gap-4">
            @auth
                <div class="relative">
                    <button id="userMenuButton" onclick="toggleUserMenu(event)" 
                            class="flex items-center gap-3 focus:outline-none bg-[#393E46]/50 hover:bg-[#393E46] py-1.5 px-3 rounded-full transition border border-[#DFD0B8]/20">
                        
                        <span class="text-sm font-semibold text-[#DFD0B8]">{{ auth()->user()->name }}</span>
                        
                        <div class="h-9 w-9 rounded-full overflow-hidden border-2 border-[#DFD0B8] shadow-md flex items-center justify-center bg-[#222831]">
                            <img src="{{ asset('images/avatar.png') }}" alt="User Avatar" class="h-full w-full object-cover">
                        </div>
                    </button>

                    <div id="userDropdownMenu" class="absolute right-0 mt-2 w-48 rounded-2xl bg-[#222831] border border-[#393E46] shadow-2xl py-2 z-50 hidden">
                        <a href="/logout" class="flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-rose-400 hover:bg-rose-500/10 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Log Out
                        </a>
                    </div>
                </div>

                <script>
                    function toggleUserMenu(event) {
                        event.stopPropagation();
                        const menu = document.getElementById('userDropdownMenu');
                        menu.classList.toggle('hidden');
                    }

                    window.addEventListener('click', function() {
                        const menu = document.getElementById('userDropdownMenu');
                        if (menu && !menu.classList.contains('hidden')) {
                            menu.classList.add('hidden');
                        }
                    });
                </script>
            @else
                <div class="flex items-center gap-3">
                    <a href="/login" class="px-5 py-2 rounded-xl text-sm font-bold text-[#222831] bg-[#DFD0B8] hover:bg-[#DCD7C9] transition shadow">
                        Log In
                    </a>
                    <a href="/signup" class="px-5 py-2 rounded-xl text-sm font-bold text-[#DFD0B8] border border-[#DFD0B8]/40 hover:bg-[#393E46] transition">
                        Sign Up</a>
                </div>
            @endauth
        </div>

    </div>
</nav>