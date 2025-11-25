@foreach($news as $item)
    @php
        $image = $item->image_path ? asset('storage/' . $item->image_path) : asset('images/other-news/1.jpg');
        $timestamp = optional($item->published_at)->timestamp ?? $item->created_at->timestamp;
    @endphp
    <x-news-card-3 :images="[$image]" :created_at="$timestamp" :href="route('news-detail', $item->slug)"
        :title="$item->title" aspect="4/3" fit="cover" position="center">
        {{ $item->title }}
    </x-news-card-3>
@endforeach