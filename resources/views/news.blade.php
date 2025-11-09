@extends('layouts.app')

@section('title', 'News')
@section('description', 'Latest news and updates from Tallius Testing')

@section('content')

    @php
        // Featured hero item (left big card)
        $featured = [
            'images' => ['https://images.unsplash.com/photo-1516594798947-e65505dbb29c?q=80&w=1200&auto=format&fit=crop'],
            'status' => 'Featured',
            'created_at' => time() - (86400 * 1),
            'title' => 'Exciting Soil Drilling Operations Underway in Kuala Lumpur!',
            'href' => '#'
        ];

        // Right sidebar compact headlines
        $sidebarItems = [
            [
                'images' => ['https://images.unsplash.com/photo-1544828834-1b35816b603c?q=80&w=600&auto=format&fit=crop'],
                'status' => '',
                'created_at' => time() - (86400 * 1),
                'title' => 'Automated drilling rigs boost productivity across urban sites',
                'href' => '#'
            ],
            [
                'images' => ['https://images.unsplash.com/photo-1504307651254-1f49a3f0b1c9?q=80&w=600&auto=format&fit=crop'],
                'status' => '',
                'created_at' => time() - (86400 * 2),
                'title' => 'Borehole logging improves subsurface modeling accuracy',
                'href' => '#'
            ],
            [
                'images' => ['https://images.unsplash.com/photo-1541976074-0b5f0e7d0c5b?q=80&w=600&auto=format&fit=crop'],
                'status' => '',
                'created_at' => time() - (86400 * 3),
                'title' => 'Ground investigation best practices for tall building sites',
                'href' => '#'
            ],
            [
                'images' => ['https://images.unsplash.com/photo-1523419409543-a4ad5cc74c47?q=80&w=600&auto=format&fit=crop'],
                'status' => '',
                'created_at' => time() - (86400 * 4),
                'title' => 'Field testing checklist for efficient site mobilization',
                'href' => '#'
            ],
        ];

        // Latest news grid items (neutral palette)
        $latestNews = [
            ['images' => ['https://images.unsplash.com/photo-1542639096-0663f0e9c4d3?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Aerial view reveals site layout optimizations', 'created_at' => time() - (86400 * 1), 'href' => '/news/aerial-view-reveals-site-layout-optimizations'],
            ['images' => ['https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1200&auto=format&fit=crop'], 'title' => 'New rig deployed for deep sampling', 'created_at' => time() - (86400 * 2), 'href' => '/news/new-rig-deployed-for-deep-sampling'],
            ['images' => ['https://images.unsplash.com/photo-1502082553048-f009c37129b9?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Hydraulic systems maintenance schedule updated', 'created_at' => time() - (86400 * 3), 'href' => '/news/hydraulic-systems-maintenance-schedule-updated'],
            ['images' => ['https://images.unsplash.com/photo-1520975681269-d9cbdb0b6a3a?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Site vegetation mapping supports logistics planning', 'created_at' => time() - (86400 * 4), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1519834785169-98be25ec3e23?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Earthworks monitoring ensures compliance', 'created_at' => time() - (86400 * 5), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1518779578993-ec3579fee39f?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Survey instruments calibrated for weekly campaigns', 'created_at' => time() - (86400 * 6), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Concrete formwork inspection checklist published', 'created_at' => time() - (86400 * 7), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Crane operations safety refreshers scheduled', 'created_at' => time() - (86400 * 8), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1503384625122-ef5875a5c6f3?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Materials delivery timeline aligned with milestones', 'created_at' => time() - (86400 * 9), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1497215728101-495c3d65bca9?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Team coordination enhances on‑site throughput', 'created_at' => time() - (86400 * 10), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1485827404703-89b55f4f28b0?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Updated zoning permits received for expansion', 'created_at' => time() - (86400 * 11), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1477706023022-6f7d1e0c1885?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Structural steel assembly nears completion', 'created_at' => time() - (86400 * 12), 'href' => '#'],
        ];

        // Release this week items (wide cards)
        $releaseThisWeek = [
            ['images' => ['https://images.unsplash.com/photo-1523419409543-a4ad5cc74c47?q=80&w=1200&auto=format&fit=crop'], 'title' => 'New advances in soil drilling: understanding permeability', 'created_at' => time() - (86400 * 1), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1537151625920-1b77f18d6d56?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Exploring soil properties: hydraulic conductivity in construction', 'created_at' => time() - (86400 * 1), 'href' => '#'],
            ['images' => ['https://images.unsplash.com/photo-1516594798947-e65505dbb29c?q=80&w=1200&auto=format&fit=crop'], 'title' => 'Permeability & hydraulic conductivity: project case insights', 'created_at' => time() - (86400 * 1), 'href' => '#'],
        ];
    @endphp

        <div class="relative z-10 pt-24 md:pt-24 lg:pt-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Intro -->
            <div class="mb-6">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-neutral-900">Stay informed with the latest from Tallius
                    Testing</h1>
                <p class="mt-2 text-neutral-600">Neutral styling and dummy data to simplify later integration.</p>
            </div>

            <!-- Hero row: left featured, right headlines -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <x-news-card-1 :images="$featured['images']" :status="$featured['status']"
                        :created_at="$featured['created_at']" :href="$featured['href']" :title="$featured['title']" 
                        class="h-full">
                        {{ $featured['title'] }}
                    </x-news-card-1>
                </div>

                <div class="flex flex-col gap-4">
                    @foreach($sidebarItems as $item)
                        <x-news-card-2 :images="$item['images']" :status="$item['status']" :created_at="$item['created_at']"
                            :href="$item['href']" :title="$item['title']">
                            {{ $item['title'] }}
                        </x-news-card-2>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Release This Week -->
    <x-section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-xl sm:text-2xl font-bold text-neutral-900 mb-4">Release This Week</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($releaseThisWeek as $item)
                    <x-news-card-1 :images="$item['images']" :status="''" :created_at="$item['created_at']"
                        :href="$item['href']" :title="$item['title']">
                        {{ $item['title'] }}
                    </x-news-card-1>
                @endforeach
            </div>
        </div>
    </x-section>

    <!-- Latest News Grid -->
    <x-section>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl sm:text-2xl font-bold text-neutral-900">Latest News</h2>
                <a href="#" class="text-neutral-800 font-semibold">Show more news</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($latestNews as $item)
                    <x-news-card-3 :images="$item['images']" :created_at="$item['created_at']" :href="$item['href']"
                        :title="$item['title']" aspect="4/3" fit="cover" position="center">
                        {{ $item['title'] }}
                    </x-news-card-3>
                @endforeach
            </div>
        </div>
    </x-section>

@endsection