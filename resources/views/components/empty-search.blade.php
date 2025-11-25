@props(['title' => null, 'description' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center gap-4 text-center py-10']) }}>
    <div class="mx-auto h-14 w-14 rounded-full flex items-center justify-center" style="background-color: var(--color-primary-100);">
        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" style="color: var(--color-primary-300);" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
        </svg>
    </div>
    <x-heading-h4 class="text-neutral-900">
        @if(isset($header))
            {{ $header }}
        @else
            {{ $title ?? 'No results found' }}
        @endif
    </x-heading-h4>
    <x-body-2 class="text-neutral-700">
        @if(isset($details))
            {{ $details }}
        @else
            {{ $description ?? 'Try different keywords, check spelling, or remove filters.' }}
        @endif
    </x-body-2>
    @if(isset($actions))
        <div class="mt-2">
            {{ $actions }}
        </div>
    @endif
</div>