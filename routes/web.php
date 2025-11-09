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

// Application Page
Route::get('/application', function () {
    return view('application');
})->name('application');

// News Page
Route::get('/news', function () {
    return view('news');
})->name('news');

// News Detail Page (using slug)
Route::get('/news/{slug}', function ($slug) {
    // Sample dataset (would come from DB in real app)
    $newsItems = [
        [
            'id' => 1,
            'slug' => 'aerial-view-reveals-site-layout-optimizations',
            'images' => ['https://images.unsplash.com/photo-1542639096-0663f0e9c4d3?q=80&w=1200&auto=format&fit=crop'],
            'status' => 'Featured',
            'created_at' => time() - (86400 * 1),
            'author' => 'Jane Smith',
            'category' => 'Field Operations',
            'read_time' => '6',
            'title' => 'Aerial view reveals site layout optimizations',
            'content' => [
                'Recent aerial surveys provided granular insights into site logistics and staging areas. The team leveraged high-resolution imagery to streamline equipment paths and reduce idle time.',
                'These findings inform the next phase of mobilization with improved material flows and safer operations around high-traffic zones.'
            ],
        ],
        [
            'id' => 2,
            'slug' => 'new-rig-deployed-for-deep-sampling',
            'images' => ['https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1200&auto=format&fit=crop'],
            'status' => 'Update',
            'created_at' => time() - (86400 * 2),
            'author' => 'Robert Johnson',
            'category' => 'Equipment',
            'read_time' => '5',
            'title' => 'New rig deployed for deep sampling',
            'content' => [
                'A new rotary rig has been deployed to support deep sampling operations. Early results show improved recovery rates across mixed strata.',
                'Data will be used to refine subsurface models and inform foundation design decisions.'
            ],
        ],
        [
            'id' => 3,
            'slug' => 'hydraulic-systems-maintenance-schedule-updated',
            'images' => ['https://images.unsplash.com/photo-1502082553048-f009c37129b9?q=80&w=1200&auto=format&fit=crop'],
            'status' => 'Maintenance',
            'created_at' => time() - (86400 * 3),
            'author' => 'Emily Wilson',
            'category' => 'Hydraulics',
            'read_time' => '4',
            'title' => 'Hydraulic systems maintenance schedule updated',
            'content' => [
                'Hydraulic power units and lines have been inspected and scheduled for preventive maintenance. Updates include fluid sampling, filter replacements, and seal checks.',
                'This program reduces risk of downtime during high-demand drilling periods.'
            ],
        ],
    ];

    // Lookup by slug
    $item = null;
    foreach ($newsItems as $n) {
        if ($n['slug'] === $slug) {
            $item = $n;
            break;
        }
    }
    if (!$item) {
        $item = $newsItems[0];
    }

    // Related: pick other items excluding current
    $related = array_values(array_filter($newsItems, fn($n) => $n['id'] !== $item['id']));
    $related = array_slice($related, 0, 3);

    return view('news-detail', compact('item', 'related'));
})->name('news-detail');


// Dashboard redirect for authenticated users
Route::get('/dashboard', function () {
    return redirect('/admin');
})->middleware(['auth'])->name('dashboard');
