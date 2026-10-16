@extends('Layout.app')

@section('title', 'Sign Up')
@section('content')
    <div class="grid h-full grid-cols-1 md:grid-cols-2">

        <div class=" items-center justify-center p-8">
            <form action="{{ url('/') }}" method="GET" class="mx-auto  mt-15 max-w-xl rounded-lg  p-9 ">
                @csrf
                <h2 class="mb-4 text-2xl font-bold  text-center text-white">Log in </h2>
                <div class="mb-4">
                    <label for="email" class="label">Email</label>
                    <input type="email" name="email" id="email"
                        class="input @error('email') border-red-500 @enderror" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="label">Password</label>
                    <input type="password" name="password" id="password"
                        class="input @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn-primary w-full">Sign Up</button>
            </form>
        </div>
        <div class="hidden md:block ">
            <div class="hidden md:order-last md:flex md:items-center md:justify-center mt-20">
                <img src="{{ asset('images/signup.jpeg') }}" alt="Sign Up"
                    class="w-full max-w-sm rounded-2xl object-contain">
            </div>

        </div>
    </div>
@endsection
