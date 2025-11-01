@props(['title', 'description', 'highlights' => [], 'background' => 'bg-secondary-400', 'image' => null])

<!-- Service Highlight Card -->
<div {{ $attributes->merge(['class' => $background . ' rounded-2xl overflow-hidden shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300']) }}>
    <div class="p-8">
        <x-heading-h2 class="text-neutral-100 mb-4">
            {{ $title }}
        </x-heading-h2>
        
        <x-body-2 class="text-neutral-100 opacity-95 mb-6">
            {{ $description }}
        </x-body-2>
        
        @if($highlights && count($highlights) > 0)
            <ul class="space-y-3">
                @foreach($highlights as $highlight)
                    <li class="flex items-start">
                        <span class="text-neutral-100 mr-3 font-bold">●</span>
                        <x-body-2 class="text-neutral-100">{{ $highlight }}</x-body-2>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
