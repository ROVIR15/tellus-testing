<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;

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
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/faq.json', [FaqController::class, 'json'])->name('faq.json');

// Testing & Inspection Page
Route::get('/testing-inspection', function () {
    return view('testing-inspection');
})->name('testing-inspection');

// Experimentation Page for Component Development
Route::get('/experiment', function () {
    return view('experiment');
})->name('experiment');

// Application Page
Route::get('/application', function () {
    return view('application');
})->name('application');

// News Page
Route::get('/news', [NewsController::class, 'index'])->name('news');

// News Detail Page (using slug with implicit model binding)
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news-detail');


// Dashboard redirect for authenticated users
Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth'])->name('dashboard');
