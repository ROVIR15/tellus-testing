@foreach($news as $item)
    @php
        $image = $item->thumbnail;
        $timestamp = optional($item->published_at)->timestamp ?? $item->created_at->timestamp;
    @endphp
    <x-news-card-3 :images="[$image]" :created_at="$timestamp" :href="route('news-detail', $item->slug)"
        :title="$item->title" aspect="4/3" fit="cover" position="center">
        {{ $item->title }}
    </x-news-card-3>
@endforeach