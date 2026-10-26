@extends('Layout.app')

@section('title', 'Sign Up')

@section('content')
<div class="flex min-h-[75vh] items-center justify-center px-4">
    <div class="w-full max-w-md rounded-3xl bg-[#222831]/95 border border-[#393E46] p-8 shadow-2xl backdrop-blur-md">
        
        <form method="post" action="/signup" class="space-y-4">
            @csrf
            
            <h2 class="text-3xl font-bold text-center text-[#DFD0B8] mb-6">Sign Up</h2>
            
            <div>
                <label for="name" class="label text-[#DCD7C9]">Name</label>
                <input id="name" name="name" type="text" class="input peer user-invalid:border-rose-500"
                    required minlength="2" maxlength="50" pattern="[A-Za-z\u0600-\u06FF ]+" value="{{ old('name') }}">
                <p class="mt-1 text-xs text-[#DCD7C9]/60 peer-user-invalid:text-rose-400">
                    2–50 characters, letters only.
                </p>
            </div>

            <div>
                <label for="email" class="label text-[#DCD7C9]">Email</label>
                <input id="email" name="email" type="email" class="input peer user-invalid:border-rose-500" required
                    pattern="[^@\s]+@[^@\s]+\.[A-Za-z]{2,}" value="{{ old('email') }}">
                <p class="mt-1 text-xs text-[#DCD7C9]/60 peer-user-invalid:text-rose-400">
                    A valid email, e.g. name@example.com
                </p>
            </div>

            <div>
                <label for="password" class="label text-[#DCD7C9]">Password</label>
                <input id="password" name="password" type="password" class="input peer user-invalid:border-rose-500" required
                    minlength="8">
                <p class="mt-1 text-xs text-[#DCD7C9]/60 peer-user-invalid:text-rose-400">
                    At least 8 characters.
                </p>
            </div>
          
            <p class="text-sm text-[#DCD7C9] pt-2">
               You already have an account? <a href="/login" class="text-[#DFD0B8] hover:underline font-semibold">Log In</a>
            </p>

            <button type="submit" class="btn-primary w-full py-3 mt-2">Sign Up</button>
        </form>

    </div>
</div>
@endsection