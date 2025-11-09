@extends('layouts.app')

@section('title', $item['title'] ?? 'News Detail')
@section('description', ($item['title'] ?? 'News') . ' — latest updates and insights')

@section('content')

    @php
        // Fallbacks when routed data is missing
        if (!isset($item)) {
            $item = [
                'id' => 1,
                'images' => ['https://via.placeholder.com/1200x675?text=News+Image'],
                'status' => 'Update',
                'created_at' => time(),
                'title' => 'Sample News Title',
                'author' => 'Editorial Team',
                'category' => 'General',
                'read_time' => '5',
                'content' => [
                    'This is a placeholder article. Replace with real content later.',
                    'Use this page to present a hero image, metadata, and the main story body with clean, readable typography.',
                ],
            ];
        }
        $related = $related ?? [];
    @endphp

    <div class="flex flex-col pt-38 gap-10 sm:px-6 lg:px-8">
        <!-- Hero / Featured -->
        <img src="{{ $item['images'][0] }}" alt="{{ $item['title'] }}" class="w-full min-h-[300px] object-cover rounded-lg"
            style="background-color: bisque;">

        <!-- Title & Meta -->
        <div>
            <span class="display-3 text-inherit" style="color: var(--color-secondary-300);">{{ $item['title'] }}</span>
            <div class="mt-3 flex flex-wrap items-center gap-4 body-3">
                <div class="flex items-center gap-1.5">
                    <span class="heading-4" style="color: var(--color-secondary-300);">Published on
                        {{ \Carbon\Carbon::createFromTimestamp($item['created_at'])->format('d F Y \a\t h:i A') }}</span>
                </div>
            </div>
        </div>
        <!-- Article Body -->
        <div class="prose max-w-none">
            @foreach(($item['content'] ?? []) as $paragraph)
                <p class="body-1 text-neutral-1000 mb-4">{{ $paragraph }}</p>
            @endforeach
        </div>
    </div>

    @if(!empty($related))
        <x-latest-news-section :activate-show-more="false" :title="'Other News'" />
    @endif

@endsection