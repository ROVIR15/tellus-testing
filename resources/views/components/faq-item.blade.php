@props(['id', 'label', 'description'])

<!-- Collapsible FAQ Item -->
<div class="faq-item group" x-inject>
    <button type="button" @click="openedId === '{{ $id }}' ? openedId = null : openedId = '{{ $id }}'"
        :class="{ 'rounded-b-none': openedId === '{{ $id }}' }"
        class="w-full px-6 py-4 text-left transition-all duration-300 rounded-2xl"
        style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(5px);"
        @keydown.enter="openedId === '{{ $id }}' ? openedId = null : openedId = '{{ $id }}'">
        <div class="flex items-center justify-between gap-6">
            <!-- Label -->
            <x-subheading-1 class="flex-1" style="font-weight: 700; font-size: 18px; line-height: 125%;">
                {{ $label }}
            </x-subheading-1>

            <!-- Toggle Icon -->
            <div class="flex-shrink-0 transition-transform duration-300"
                :class="{ 'rotate-180': openedId === '{{ $id }}' }">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.293 15.3008L16.8242 21.4883C16.543 21.7695 16.1914 21.875 15.875 21.875C15.5234 21.875 15.1719 21.7695 14.8906 21.4883L8.42188 15.3008C7.85938 14.7734 7.82422 13.8945 8.38672 13.332C8.91406 12.7695 9.79297 12.7344 10.3555 13.2969L15.875 18.5352L21.3594 13.2969C21.9219 12.7344 22.8008 12.7695 23.3281 13.332C23.8906 13.8945 23.8555 14.7734 23.293 15.3008Z"
                        fill="#020046" />
                </svg>
            </div>
        </div>
    </button>

    <!-- Collapsible Content -->
    <div x-show="openedId === '{{ $id }}'" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="px-6 py-4 rounded-b-2xl"
        style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(5px); margin-top: -1px;">
        <x-body-2 class="text-neutral-700 leading-relaxed">
            {{ $description }}
        </x-body-2>
    </div>
</div>