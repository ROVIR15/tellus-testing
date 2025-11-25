@extends('layouts.app')

@section('title', $news->title ?? 'News Detail')
@section('description', ($news->excerpt ?? $news->title ?? 'News') . ' — latest updates and insights')

@section('content')

    @php
        $imageUrl = $news->image_path ? asset('storage/' . $news->image_path) : asset('images/other-news/1.jpg');
        $publishedAt = $news->published_at ? $news->published_at->format('d F Y \\a\\t h:i A') : $news->created_at->format('d F Y \\a\\t h:i A');
    @endphp

    <div class="flex flex-col gap-10">
        <div class="flex flex-col pt-38 gap-4 sm:px-6 lg:px-8">
            <!-- Hero / Featured -->
            <img src="{{ $imageUrl }}" alt="{{ $news->title }}"
                class="w-full min-h-[300px] max-h-[1321px] sm:max-h-[424px] object-cover rounded-lg" style="background-color: bisque;">

            <!-- Title & Meta -->
            <span class="display-3 text-inherit" style="color: var(--color-secondary-300);">{{ $news->title }}</span>
            <div class="mt-3 flex flex-wrap items-center gap-4 body-3">
                <div class="flex items-center gap-1.5">
                    <span class="heading-4" style="color: var(--color-secondary-300);">Published on
                        {{ $publishedAt }}</span>
                </div>
            </div>
            <!-- Article Body -->
            <div class="prose max-w-none">
                {!! $news->content !!}
            </div>
        </div>

        <div class="flex flex-col sm:px-6 lg:px-8">
            @if(!empty($related) && count($related) > 0)
                <div class="flex flex-row items-center justify-between mb-6">
                    <h2 class="heading-1"><span class="custom-color">Other News</span></h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($related as $article)
                        @php
                            $relatedImage = $article->image_path ? asset('storage/' . $article->image_path) : asset('images/other-news/1.jpg');
                            $relatedTimestamp = optional($article->published_at)->timestamp ?? $article->created_at->timestamp;
                        @endphp
                        <x-news-card-3 :images="[$relatedImage]"
                            :created_at="$relatedTimestamp"
                            :href="route('news-detail', $article->slug)"
                            :title="$article->title">
                            {{ $article->title }}
                        </x-news-card-3>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection