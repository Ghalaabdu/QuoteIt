<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function (Request $request) {
    $myQuotes = array_filter((array) $request->query('quotes', []), 'is_string');
    ksort($myQuotes);

    return view('welcome', [
        'myQuotes' => $myQuotes,
        'editingIndex' => $request->integer('edit', -1),
        'otherQuotes' => [
    [
        'author' => 'Lujain',
        'text' => 'The best way to predict the future is to invent it.',
        'date' => 'Oct 10, 2026',
    ],
    [
        'author' => 'Sara',
        'text' => 'Simplicity is the soul of efficiency.',
        'date' => 'Oct 12, 2026',
    ],
    [
        'author' => 'Noura',
        'text' => 'Code is like humor. When you have to explain it, it’s bad.',
        'date' => 'Oct 14, 2026',
    ],
    [
        'author' => 'Reem',
        'text' => 'First, solve the problem. Then, write the code.',
        'date' => 'Oct 16, 2026',
    ],
],

    ]);
})->name('home');

Route::get('/signup', function () {
    return view('Authentication.SignUp', ['page'=>'Sign Up']);
});

Route::get('/login', function () {
    return view('Authentication.LogIn', ['page'=>'Log In']);
});
