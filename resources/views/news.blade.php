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

    <div class="flex flex-col gap-8 md:gap-18 relative mb-10 md:mb-16">
        <img src="{{ asset('images/decorative-about-us/circle-center.svg') }}" alt="Decorative element"
            class="absolute w-full -z-10">

        <x-section-top-padding>
            <div class="flex flex-col gap-8 px-4 sm:px-6 lg:px-8">
                <!-- Page Intro -->

                <div class="flex flex-row gap-8">
                    <div class="w-full md:w-5/8">
                        <x-heading-display-3 class="text-2xl sm:text-3xl font-extrabold"
                            style="color: var(--color-secondary-300);">Stay
                            Informed with the Latest from <br> Tellus
                            Testing</x-heading-display-3>
                        <x-heading-h4 class="mt-2" style="color: var(--color-secondary-300);">Explore our latest updates,
                            technical
                            articles, and industry insights—all designed to keep you informed about the evolving world of
                            soil,
                            water, and geotechnical testing.</x-heading-h4>
                    </div>

                    <div class="md:w-3/8">
                    </div>
                </div>


                <!-- Hero row: left featured, right headlines -->
                <div class="flex flex-col md:flex-row gap-8 md:max-h-[472px]">
                    <div class="w-full md:w-5/8 h-[472px]">
                        @if($featuredItem)
                            @php
                                $featuredImage = $featuredItem->thumbnail;
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
                                $sbImage = $item->thumbnail;
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
            <button id="load-more-btn" class="px-8 py-3 rounded-full transition-all duration-300 font-semibold" style="
                                                    color: var(--color-primary-300);
                                                    background-color: var(--color-primary-100);
                                                ">Show More News</button>
            <script>
                (function () {
                    const grid = document.getElementById('news-grid');
                    const btn = document.getElementById('load-more-btn');
                    const BATCH_SIZE = 8;
                    let loading = false;

                    function items() {
                        return Array.from(grid.children);
                    }

                    function hideBeyondInitial() {
                        const els = items();
                        for (let i = BATCH_SIZE; i < els.length; i++) {
                            els[i].classList.add('hidden');
                        }
                        if (els.length <= BATCH_SIZE && !grid.dataset.next) {
                            btn.classList.add('hidden');
                        }
                    }

                    function revealNextBatch() {
                        const els = items();
                        let count = 0;
                        for (let i = 0; i < els.length; i++) {
                            if (els[i].classList.contains('hidden')) {
                                els[i].classList.remove('hidden');
                                count++;
                                if (count === BATCH_SIZE) break;
                            }
                        }
                        return count;
                    }

                    async function fetchNextPage() {
                        const next = grid.dataset.next;
                        if (!next || loading) return 0;
                        loading = true;
                        try {
                            const res = await fetch(next, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                            const data = await res.json();
                            if (data.html) {
                                const wrapper = document.createElement('div');
                                wrapper.innerHTML = data.html;
                                let appended = 0;
                                while (wrapper.firstChild) {
                                    const node = wrapper.firstChild;
                                    wrapper.removeChild(node);
                                    node.classList.add('hidden');
                                    grid.appendChild(node);
                                    appended++;
                                }
                                grid.dataset.next = data.next_page_url || '';
                                return appended;
                            } else {
                                grid.dataset.next = '';
                                return 0;
                            }
                        } catch (e) {
                            grid.dataset.next = '';
                            return 0;
                        } finally {
                            loading = false;
                        }
                    }

                    btn.addEventListener('click', async () => {
                        const revealed = revealNextBatch();
                        if (revealed === BATCH_SIZE) return;
                        const appended = await fetchNextPage();
                        if (appended === 0) {
                            const remainingRevealed = revealNextBatch();
                            if (remainingRevealed === 0) btn.classList.add('hidden');
                        } else {
                            revealNextBatch();
                        }
                    });

                    hideBeyondInitial();
                })();
            </script>
        </div>
    </div>
@endsection