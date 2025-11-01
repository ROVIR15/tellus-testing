<?php

use Illuminate\Support\Facades\Route;

// Landing Page Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// About Us Page
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

// Contact Us Page
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

// FAQ
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Testing & Inspection Page
Route::get('/testing-inspection', function () {
    return view('testing-inspection');
})->name('testing-inspection');

// Experimentation Page for Component Development
Route::get('/experiment', function () {
    return view('experiment');
})->name('experiment');

// Dashboard redirect for authenticated users
Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth'])->name('dashboard');
