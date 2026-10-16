@extends('Layout.app')

@section('title', 'Sign Up')
@section('content')
    <div class="grid h-full grid-cols-1 md:grid-cols-2">

        <div class=" items-center justify-center p-8">
            <form action="{{ url('/') }}" method="GET" class="mx-auto  mt-15 max-w-xl rounded-lg  p-9 ">
                @csrf
                <h2 class="mb-4 text-2xl font-bold  text-center text-white">Sign Up</h2>
                <div class="mb-4">
                    <label for="name" class="label">Name</label>
                    <input id="name" name="name" type="text" class="input peer user-invalid:border-red-500"
    required minlength="2" maxlength="50" pattern="[A-Za-z\u0600-\u06FF ]+">

                    <p class="mt-1 text-xs text-gray-500 peer-user-invalid:text-red-600">
                        2–50 characters, letters only.
                    </p>
                </div>
                <div class="mb-4">
                    <label for="email" class="label">Email</label>
                    <input id="email" type="email" class="input peer user-invalid:border-red-500" required
                        pattern="[^@\s]+@[^@\s]+\.[A-Za-z]{2,}">
                    <p class="mt-1 text-xs text-gray-500 peer-user-invalid:text-red-600">
                        A valid email, e.g. name@example.com
                    </p>
                </div>

                <div class="mb-4">
                    <label for="password" class="label">Password</label>
                    <input id="password" type="password" class="input peer user-invalid:border-red-500" required
                        minlength="8">
                    <p class="mt-1 text-xs text-gray-500 peer-user-invalid:text-red-600">
                        At least 8 characters.
                    </p>
                </div>
              
                <p class="mb-4 text-sm text-gray-500">
                   You Already have an account? <a href="/login" class="text-blue-500 hover:underline">Log In</a>
                </p>

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
