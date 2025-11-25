{{-- Latest News Section Component --}}
@php
    // Get component properties
    $maxNewsItems = $attributes->get('max-news-items', 4);
    $title = $attributes->get('title', 'Latest News');
    $subtitle = $attributes->get('subtitle', 'Stay updated with our latest news and insights');
    $activateShowMore = $attributes->get('activate-show-more', true);

    // In a real application, you would fetch news from a database
    // For this example, we'll create sample news items
    $newsItems = [
        [
            'images' => ['https://via.placeholder.com/800x450?text=News+1'],
            'status' => 'Featured',
            'created_at' => time() - (86400 * 2), // 2 days ago
            'author' => 'John Doe',
            'category' => 'Industry News',
            'read_time' => '5',
            'title' => 'New Soil Testing Methods Revolutionize Construction Industry',
            'href' => '/news/1'
        ],
        [
            'images' => ['https://via.placeholder.com/800x450?text=News+2'],
            'status' => 'New',
            'created_at' => time() - (86400 * 5), // 5 days ago
            'author' => 'Jane Smith',
            'category' => 'Research',
            'read_time' => '8',
            'title' => 'Advanced Material Analysis Techniques for Modern Construction',
            'href' => '/news/2'
        ],
        [
            'images' => ['https://via.placeholder.com/800x450?text=News+3'],
            'status' => 'Popular',
            'created_at' => time() - (86400 * 10), // 10 days ago
            'author' => 'Robert Johnson',
            'category' => 'Technology',
            'read_time' => '4',
            'title' => 'Digital Transformation in Laboratory Testing Services',
            'href' => '/news/3'
        ],
        [
            'images' => ['https://via.placeholder.com/800x450?text=News+4'],
            'status' => 'Case Study',
            'created_at' => time() - (86400 * 15), // 15 days ago
            'author' => 'Emily Wilson',
            'category' => 'Projects',
            'read_time' => '6',
            'title' => 'How Soil Analysis Saved a Major Infrastructure Project',
            'href' => '/news/4'
        ],
        [
            'images' => ['https://via.placeholder.com/800x450?text=News+5'],
            'status' => 'Update',
            'created_at' => time() - (86400 * 20), // 20 days ago
            'author' => 'Michael Brown',
            'category' => 'Standards',
            'read_time' => '3',
            'title' => 'New Industry Standards for Construction Material Testing',
            'href' => '/news/5'
        ]
    ];

    // Limit the number of news items based on max-news-items
    $newsItems = array_slice($newsItems, 0, $maxNewsItems);
@endphp
<!-- style="background: linear-gradient(180deg, #F5F9FF 0%, #F0F0F0 100%);" -->
@php
    // Override sample items with real data from DB (Filament-managed News)
    $query = \App\Models\News::query()
        ->where('is_published', true)
        ->where(function ($q) {
            $q->whereNull('published_at')
              ->orWhere('published_at', '<=', now());
        })
        ->orderByDesc('published_at')
        ->orderByDesc('created_at')
        ->take($maxNewsItems);

    $realItems = $query->get();

    // Map to shape expected by card component
    $newsItems = $realItems->map(function ($item) {
        $image = $item->image_path ? asset('storage/' . $item->image_path) : asset('images/other-news/1.jpg');
        return [
            'images' => [$image],
            'status' => '',
            'created_at' => optional($item->published_at)->timestamp ?? $item->created_at->timestamp,
            'author' => '',
            'category' => $item->category,
            'read_time' => '',
            'title' => $item->title,
            'href' => route('news-detail', $item->slug),
        ];
    })->toArray();
@endphp

<div>
    <div class="flex flex-col gap-8">
        <!-- Section Header -->
        <div class="flex flex-row items-center justify-between">
            <h2 class="heading-1 mb-4"><span class="custom-color">{{ $title }}</span></h2>
            @if ($activateShowMore)
            <button type="button"
                class="px-8 py-3 rounded-full transition-all duration-300 font-semibold" style="
                            color: var(--color-primary-300);
                            background-color: var(--color-primary-100);
                        ">
                <span>Show More</span>
            </button>
            @endif
        </div>

        <!-- News Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($newsItems as $item)
                <x-news-card-3 :images="$item['images']" :status="$item['status']" :created_at="$item['created_at']"
                    :author="$item['author']" :category="$item['category']" :read_time="$item['read_time']"
                    :href="$item['href']" :title="$item['title']">
                    {{ $item['title'] }}
                </x-news-card-3>
            @endforeach
        </div>

        <!-- View All Button -->
        <!-- <div class="text-center mt-12">
            <a href="/news"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-primary-500 hover:bg-primary-600 text-white font-medium transition-colors">
                View All News
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div> -->
    </div>
</div>