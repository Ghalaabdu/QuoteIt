@extends('Layout.app')

@section('title', 'Log In')

@section('content')
<div class="flex min-h-[75vh] items-center justify-center px-4">
    <div class="w-full max-w-md rounded-3xl bg-[#222831]/95 border border-[#393E46] p-8 shadow-2xl backdrop-blur-md">
        
        <form method="post" action="/login" class="space-y-4">
            @csrf
            
            <h2 class="text-3xl font-bold text-center text-[#DFD0B8] mb-6">Log In</h2>

            <div>
                <label for="email" class="label text-[#DCD7C9]">Email</label>
                <input id="email" name="email" type="email" class="input" required value="{{ old('email') }}">
            </div>

            <div>
                <label for="password" class="label text-[#DCD7C9]">Password</label>
                <input id="password" name="password" type="password" class="input" required>
            </div>
          
            <p class="text-sm text-[#DCD7C9] pt-2">
               Don't have an account? <a href="/signup" class="text-[#DFD0B8] hover:underline font-semibold">Sign Up</a>
            </p>

            <button type="submit" class="btn-primary w-full py-3 mt-2">Log In</button>
        </form>

    </div>
</div>
@endsection