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

    <div class="flex flex-col gap-8 md:gap-18 relative">
        <img src="{{ asset('images/decorative-about-us/circle-center.svg') }}" alt="Decorative element"
            class="absolute w-full -z-10">

        <x-section-top-padding>
            <div class="flex flex-col gap-8 px-4 sm:px-6 lg:px-8">
                <!-- Page Intro -->
                <x-heading-display-3 class="text-2xl sm:text-3xl font-extrabold"
                    style="color: var(--color-secondary-300);">Stay
                    Informed with the Latest from <br> Tellus
                    Testing</x-heading-display-3>
                <x-heading-h4 class="mt-2" style="color: var(--color-secondary-300);">Explore our latest updates, technical
                    articles, and industry insights—all designed to keep you informed about the evolving world of soil,
                    water, and geotechnical testing.</x-heading-h4>


                <!-- Hero row: left featured, right headlines -->
                <div class="flex flex-col md:flex-row gap-8 md:max-h-[472px]">
                    <div class="w-full md:w-5/8 h-[472px]">
                        @if($featuredItem)
                            @php
                                $featuredImage = $featuredItem->image_path ? asset('storage/' . $featuredItem->image_path) : asset('images/other-news/3.jpg');
                                $featuredTimestamp = optional($featuredItem->published_at)->timestamp ?? $featuredItem->created_at->timestamp;
                            @endphp
                            <x-news-card-1 :images="[$featuredImage]" :status="'Featured'" :created_at="$featuredTimestamp"
                                :href="route('news-detail', $featuredItem->slug)" :title="$featuredItem->title" class="h-full">
                                {{ $featuredItem->title }}
                            </x-news-card-1>
                        @endif
                    </div>

                    <div class="h-full md:w-3/8 flex flex-col gap-4 md:gap-8">
                        @foreach($sidebarItems as $item)
                            @php
                                $sbImage = $item->image_path ? asset('storage/' . $item->image_path) : asset('images/other-news/3.jpg');
                                $sbTimestamp = optional($item->published_at)->timestamp ?? $item->created_at->timestamp;
                            @endphp
                            <x-news-card-2 :images="[$sbImage]" :status="''" :created_at="$sbTimestamp"
                                :href="route('news-detail', $item->slug)" :title="$item->title">
                                {{ $item->title }}
                            </x-news-card-2>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-section-top-padding>

        <div class="flex flex-col gap-4 md:gap-8 px-4 sm:px-6 lg:px-8">
            <!-- Latest News Grid -->
            <x-heading-h2 class="custom-color">Latest News</x-heading-h2>

            <div id="news-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6"
                data-next="{{ $news->nextPageUrl() }}">
                @include('news._items', ['news' => $news])
            </div>
            <div id="load-more-trigger" class="h-8"></div>
            <script>
                (function () {
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