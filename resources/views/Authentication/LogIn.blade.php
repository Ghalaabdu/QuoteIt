@extends('Layout.app')

@section('title', 'Log In')
@section('content')
    <div class="grid h-full grid-cols-1 md:grid-cols-2">

        <div class="flex items-center justify-center p-8">
            <form action="{{ url('/') }}" method="GET" class="mx-auto mt-15 w-full max-w-xl rounded-lg p-9">
                <h2 class="mb-4 text-center text-2xl font-bold text-white">Log In</h2>

                <div class="mb-4">
                    <label for="email" class="label">Email</label>
                    <input id="email" type="email" required pattern="[^@\s]+@[^@\s]+\.[A-Za-z]{2,}"
                        class="input peer user-invalid:border-red-500">
                    <p class="mt-1 hidden text-sm text-red-500 peer-user-invalid:block">
                        Please enter a valid email, e.g. name@example.com
                    </p>
                </div>

                <div class="mb-4">
                    <label for="password" class="label">Password</label>
                    <input id="password" type="password" required minlength="8"
                        class="input peer user-invalid:border-red-500">
                    <p class="mt-1 hidden text-sm text-red-500 peer-user-invalid:block">
                        Password must be at least 8 characters.
                    </p>
                </div>

                <button type="submit" class="btn btn-primary w-full">Log In</button>
            </form>
        </div>

        <div class="hidden md:order-last md:flex md:items-center md:justify-center">
            <img src="{{ asset('images/signup.jpeg') }}" alt="Log In"
                class="w-full max-w-sm rounded-2xl object-contain">
        </div>

    </div>
@endsection
