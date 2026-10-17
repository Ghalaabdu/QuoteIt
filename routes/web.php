<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function (Request $request) {
   
    return view('welcome',['page'=>'Home']);
})->name('home');

Route::get('/signup', function () {
    return view('Authentication.SignUp', ['page'=>'Sign Up']);
});

Route::get('/login', function () {
    return view('Authentication.LogIn', ['page'=>'Log In']);
});
