@props(['title', 'description', 'highlights' => [], 'background' => 'bg-secondary-100', 'image' => null])

<!-- Service Highlight Card -->
<div {{ $attributes->merge(['class' => ' rounded-2xl overflow-hidden transition-all duration-300']) }} style="background: var(--color-secondary-100);">
    <div class="flex flex-col gap-6 md:flex-row md:items-start md:gap-6">
        {{-- Text content (left on desktop) --}}
        <div class="flex-1">
            <div class="flex flex-col gap-4">
                <x-heading-h2 style="color: var(--color-primary-500);">
                    {{ $title }}
                </x-heading-h2>

                <x-body-2 style="color: var(--color-primary-500);">
                    {{ $description }}
                </x-body-2>
            </div>

            @if($highlights && count($highlights) > 0)
                <ul class="space-y-3">
                    @foreach($highlights as $highlight)
                        <li class="flex items-center">
                            <span class="text-neutral-100 mr-3 font-bold">●</span>
                            <x-body-2 style="color: var(--color-primary-500);">{{ $highlight }}</x-body-2>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- Image / visual area (left on desktop) --}}
        @if($image)
            <div class="w-full md:w-4/7 rounded-lg overflow-hidden mb-4 md:mb-0">
                <img src="{{ asset('images/truck-pic.png') }}" alt="{{ $title }}" class="w-full h-full object-cover">
            </div>
        @endif
    </div>
</div>