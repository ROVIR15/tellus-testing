@extends('layouts.app')

@section('title', 'News')
@section('description', 'Latest news and updates from Tallius Testing')

@section('content')
    @php
        // Build first-page collection without halting the page
        $firstPageItems = collect($news->items());
        $featuredItem = $featured ?? $firstPageItems->first();
        $sidebarItems = $firstPageItems->slice(1, 4);
    @endphp

    <x-section-top-padding>
        <div class="px-4 sm:px-6 lg:px-8">
            <!-- Page Intro -->
            <div class="mb-6">
                <x-heading-display-3 class="text-2xl sm:text-3xl font-extrabold"
                    style="color: var(--color-secondary-300);">Stay Informed with the Latest from Tellus Testing</x-heading-display-3>
            <x-heading-h4 class="mt-2" style="color: var(--color-secondary-300);">Explore our latest updates, technical articles, and industry insights—all designed to keep you informed about the evolving world of soil, water, and geotechnical testing.</x-heading-h4>
            </div>

            <!-- Hero row: left featured, right headlines -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
                <div class="md:col-span-2 lg:col-span-2">
                    @if($featuredItem)
                        @php
                            $featuredImage = $featuredItem->image_path ? asset('storage/' . $featuredItem->image_path) : asset('images/other-news/3.jpg');
                            $featuredTimestamp = optional($featuredItem->published_at)->timestamp ?? $featuredItem->created_at->timestamp;
                        @endphp
                        <x-news-card-1 :images="[$featuredImage]" :status="'Featured'"
                            :created_at="$featuredTimestamp" :href="route('news-detail', $featuredItem->slug)" :title="$featuredItem->title"
                            class="h-full">
                            {{ $featuredItem->title }}
                        </x-news-card-1>
                    @endif
                </div>

                <div class="flex flex-col gap-4">
                    @foreach($sidebarItems as $item)
                        @php
                            $sbImage = $item->image_path ? asset('storage/' . $item->image_path) : asset('images/other-news/3.jpg');
                            $sbTimestamp = optional($item->published_at)->timestamp ?? $item->created_at->timestamp;
                        @endphp
                        <x-news-card-2 :images="[$sbImage]" :status="''"
                            :created_at="$sbTimestamp" :href="route('news-detail', $item->slug)" :title="$item->title">
                            {{ $item->title }}
                        </x-news-card-2>
                    @endforeach
                </div>
            </div>
        </div>
    </x-section-top-padding>

    <div class="mt-20 flex flex-col gap-12 hidden">
        <!-- Release This Week -->
        <div class="flex flex-col gap-8  px-4 sm:px-6 lg:px-8">
            <x-heading-h1 class="custom-color">Release This Week</x-heading-h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
                @foreach($releaseThisWeek as $item)
                    @php
                        $rwImage = $item->image_path ? asset('storage/' . $item->image_path) : asset('images/other-news/2.jpg');
                        $rwTimestamp = optional($item->published_at)->timestamp ?? $item->created_at->timestamp;
                    @endphp
                    <x-news-card-1 :images="[$rwImage]" :status="''" :created_at="$rwTimestamp"
                        :href="route('news-detail', $item->slug)" :title="$item->title">
                        {{ $item->title }}
                    </x-news-card-1>
                @endforeach
            </div>
        </div>

        <!-- Latest News Grid -->
        <div class="flex flex-col gap-8 px-4 sm:px-6 md:px-8 mb-20">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <x-heading-h2 class="custom-color">Latest News</x-heading-h2>
                <a href="#" class="text-neutral-800 font-semibold hover:text-secondary-300 transition-colors text-sm sm:text-base whitespace-nowrap">&nbsp;</a>
            </div>

            <div id="news-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6" data-next="{{ $news->nextPageUrl() }}">
                @include('news._items', ['news' => $news])
            </div>
            <div id="load-more-trigger" class="h-8"></div>
            <script>
                (function() {
                    const grid = document.getElementById('news-grid');
                    const trigger = document.getElementById('load-more-trigger');
                    let loading = false;
                    const observer = new IntersectionObserver(async (entries) => {
                        const entry = entries[0];
                        if (!entry.isIntersecting || loading) return;
                        const next = grid.dataset.next;
                        if (!next) return;
                        loading = true;
                        try {
                            const res = await fetch(next, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                            const data = await res.json();
                            if (data.html) {
                                const wrapper = document.createElement('div');
                                wrapper.innerHTML = data.html;
                                while (wrapper.firstChild) {
                                    grid.appendChild(wrapper.firstChild);
                                }
                                grid.dataset.next = data.next_page_url || '';
                            } else {
                                grid.dataset.next = '';
                            }
                        } catch (e) {
                            console.error(e);
                            grid.dataset.next = '';
                        } finally {
                            loading = false;
                        }
                    }, { rootMargin: '200px' });
                    observer.observe(trigger);
                })();
            </script>
        </div>
    </div>

@endsection