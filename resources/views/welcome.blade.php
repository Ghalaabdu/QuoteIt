@extends('Layout.app')

@section('title', 'Home')
@section('content')
    @php
        $editingId = request()->filled('edit') ? (int) request('edit') : null;
        $currentFilter = request('filter', 'all');
    @endphp

    {{-- Hero Banner ممتد بعرض الشاشة بالكامل --}}
    <div class="relative w-full bg-gradient-to-r from-[#222831] via-[#393E46] to-[#222831] py-12 px-6 text-center border-y border-[#DFD0B8]/20 shadow-2xl mb-8 -mt-6">
        <div class="relative z-10 max-w-3xl mx-auto space-y-3">
            <span class="inline-block rounded-full bg-[#DFD0B8]/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-[#DFD0B8] uppercase border border-[#DFD0B8]/20">
                Welcome to QuoteIt
            </span>
            <h1 class="text-4xl font-extrabold tracking-tight text-[#DFD0B8] sm:text-5xl">
                Words That Inspire.
            </h1>
            <p class="mx-auto max-w-xl text-base text-[#DCD7C9]/80 font-normal leading-relaxed">
                Discover, save, and share your favorite quotes with a community of readers and thinkers.
            </p>
        </div>
        
        <div class="absolute top-0 left-1/4 h-32 w-32 rounded-full bg-[#DFD0B8]/5 blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 h-32 w-32 rounded-full bg-[#DFD0B8]/5 blur-3xl"></div>
    </div>

    <div class="mx-auto max-w-3xl space-y-8 px-4">

        @if ($errors->any())
            <div class="rounded-xl bg-rose-500/10 border border-rose-500/20 p-3 text-sm text-rose-400">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Filter Tabs --}}
        @auth
            <div class="flex items-center justify-center gap-2 bg-[#222831]/80 backdrop-blur-md p-1.5 rounded-2xl border border-[#393E46] shadow-md max-w-md mx-auto">
                <a href="{{ route('home', ['filter' => 'all']) }}" 
                   class="flex-1 text-center py-2.5 rounded-xl text-xs sm:text-sm font-bold transition duration-200 {{ $currentFilter === 'all' ? 'bg-[#DFD0B8] text-[#222831] shadow' : 'text-[#DCD7C9] hover:bg-[#393E46] hover:text-[#DFD0B8]' }}">
                    All Quotes
                </a>
                <a href="{{ route('home', ['filter' => 'mine']) }}" 
                   class="flex-1 text-center py-2.5 rounded-xl text-xs sm:text-sm font-bold transition duration-200 {{ $currentFilter === 'mine' ? 'bg-[#DFD0B8] text-[#222831] shadow' : 'text-[#DCD7C9] hover:bg-[#393E46] hover:text-[#DFD0B8]' }}">
                    My Quotes
                </a>
                <a href="{{ route('home', ['filter' => 'liked']) }}" 
                   class="flex-1 text-center py-2.5 rounded-xl text-xs sm:text-sm font-bold transition duration-200 {{ $currentFilter === 'liked' ? 'bg-[#DFD0B8] text-[#222831] shadow' : 'text-[#DCD7C9] hover:bg-[#393E46] hover:text-[#DFD0B8]' }}">
                    Liked Quotes
                </a>
            </div>
        @endauth

        {{-- Quotes List --}}
        <section class="space-y-4">
            @forelse ($quotes as $quote)
                @php 
                    $isMine = auth()->check() && $quote->user_id === auth()->id();
                    $isLiked = auth()->check() && $quote->isLikedBy(auth()->user());
                @endphp

                @if ($isMine && $quote->id === $editingId)
                    <form method="post" action="{{ route('edit_quote', $quote) }}"
                        class="space-y-3 rounded-3xl bg-[#948979] border border-[#393E46] p-6 shadow-xl">
                        @csrf
                        @method('PUT')
                        <textarea name="content" rows="3" required minlength="3" maxlength="280" class="input text-black font-medium" autofocus>{{ old('content', $quote->content) }}</textarea>
                        <div class="flex gap-2">
                            <button type="submit" class="btn btn-secondary bg-[#222831] text-[#DFD0B8]">Save</button>
                            <a href="{{ route('home', ['filter' => $currentFilter]) }}" class="btn text-black hover:underline">Cancel</a>
                        </div>
                    </form>
                @else
                    <div class="quote-card relative rounded-3xl bg-[#948979] p-6 text-black shadow-lg transition duration-300 hover:scale-[1.01] hover:shadow-2xl border border-[#DFD0B8]/20">
                        <p class="text-xl font-medium tracking-wide">“{{ $quote->content }}”</p>
                        
                        <div class="mt-4 flex items-center justify-between text-sm font-semibold text-black/80">
                            <span>— {{ $quote->user->name }} <span class="text-xs opacity-70 font-normal">· {{ $quote->created_at->format('Y-m-d') }}</span></span>

                            <div class="flex items-center gap-4">
                                @auth
                                    <form method="POST" action="{{ route('quote.like', $quote) }}">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-1 transition hover:scale-125 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $isLiked ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 {{ $isLiked ? 'text-rose-600' : 'text-black' }}">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                            <span class="text-xs font-bold">{{ $quote->likes()->count() }}</span>
                                        </button>
                                    </form>
                                @endauth

                                @if ($isMine)
                                    <a href="{{ route('home', array_merge(request()->all(), ['edit' => $quote->id])) }}" class="hover:text-white transition" aria-label="Edit">✎</a>

                                    <form method="POST" action="{{ route('delete_quote', $quote) }}" onsubmit="return confirm('Delete this quote?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="hover:text-rose-900 transition" aria-label="Delete">⌫</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="text-center py-12 rounded-3xl bg-[#222831]/50 border border-[#393E46]">
                    <p class="text-[#DCD7C9]/60 font-medium">No quotes found in this section.</p>
                </div>
            @endforelse
        </section>

    </div>

    @auth
        <button type="button" popovertarget="quote-popup" aria-label="Share a quote"
            class="fixed bottom-8 right-8 z-40 flex h-16 w-16 items-center justify-center rounded-full bg-[#DFD0B8] text-[#222831] shadow-xl transition hover:scale-110 hover:bg-[#DCD7C9] focus:outline-none focus-visible:ring-4 focus-visible:ring-[#DFD0B8]/30">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>

        <div id="quote-popup" popover
            class="m-auto w-[90%] max-w-lg rounded-3xl bg-[#222831] border border-[#393E46] p-0 shadow-2xl backdrop:bg-black/60 backdrop:backdrop-blur-sm text-[#DCD7C9]">

            <form method="POST" action="{{ route('home') }}" class="space-y-4 p-6">
                @csrf
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-[#DFD0B8]">Share a quote</h2>
                    <button type="button" popovertarget="quote-popup" popovertargetaction="hide" aria-label="Close"
                        class="rounded-full p-1 text-[#DCD7C9]/60 hover:bg-[#393E46] hover:text-[#DFD0B8] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div>
                    <textarea id="quote-body" name="content" rows="5" required minlength="3" maxlength="280" autofocus
                        placeholder="Write your quote…" class="input peer resize-none user-invalid:border-rose-500 text-white leading-relaxed">{{ old('content') }}</textarea>
                    <p class="mt-1 text-xs text-[#DCD7C9]/60 peer-user-invalid:text-rose-400">3–280 characters.</p>
                </div>

                <button type="submit" class="btn-primary w-full py-3">Send</button>
            </form>
        </div>
    @endauth
@endsection