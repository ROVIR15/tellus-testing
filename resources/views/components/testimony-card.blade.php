@props([
    'name' => 'Budi Santoso',
    'role' => 'Project Engineer',
    'company' => 'GeoTek Nusantara',
    'location' => null,
    'avatar' => null,
    'quote' => null,
    'source' => null,
])

<!-- Testimony Card -->
<div
    {{ $attributes->merge(['class' => 'testimony-card p-6 min-h-[280px] max-h-[315px]']) }}
>
    <div class="flex items-start gap-4">
        <div class="shrink-0 w-14 h-14 rounded-full overflow-hidden border border-neutral-300">
            @if($avatar)
                <img src="{{ $avatar }}" alt="{{ $name }}" class="w-full h-full object-cover" />
            @else
                <div class="w-full h-full bg-neutral-200 flex items-center justify-center text-neutral-500">👤</div>
            @endif
        </div>

        <div class="flex-1">
            <div class="sub-heading-2 text-neutral-950">{{ $name }}</div>
            <div class="body-2 text-neutral-700">{{ $role }}, {{ $company }}</div>
            @if($location)
                <div class="body-2 text-neutral-600">{{ $location }}</div>
            @endif
        </div>
    </div>

    <div class="mt-6">
        <p class="body-1 text-neutral-900">
            {{ $quote ?? 'The lab test provided by BioCheck Labs was a game changer for our project. As an engineer, I rely on accurate data, and their results were spot on! It helped us make informed decisions quickly. Highly recommend!' }}
            @if($source)
                <span class="text-neutral-700"> - {{ $source }}</span>
            @endif
        </p>
    </div>
</div>