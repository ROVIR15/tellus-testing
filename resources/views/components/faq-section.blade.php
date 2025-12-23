@props(['items' => [], 'maxItems' => null, 'showAllButton' => true])

<!-- FAQ Section Container -->
@php
    $faqItems = $items ?: \App\Constants\FAQConstants::getItems();
    
    // Calculate displayed and total items
    $displayedItems = $maxItems ? array_slice($faqItems, 0, $maxItems) : $faqItems;
    $totalItems = count($faqItems);
    $hasMore = $maxItems && count($faqItems) > $maxItems;
@endphp

<!-- Experimentation Section -->
<x-section>
    <div>
        <div class="text-center mb-16">
            <x-heading-h1 style="
                -webkit-background-clip: text; /* Safari/Chrome */
                background-clip: text;         /* Modern browsers */
                color: transparent;            /* Hide solid color to reveal gradient */
            ">
                Frequently Asked Questions
            </x-heading-h1>
            <x-subheading-2>
                Got a question? We've got you covered.
            </x-subheading-2>
        </div>

        <!-- FAQ Items -->
        <div x-data="{ showAll: false, openedId: null }" x-provide="['openedId']" class="space-y-4">
            @forelse($displayedItems as $item)
                <x-faq-item :id="$item['id']" :label="$item['label']" :description="$item['description']" />
            @empty
                <div class="text-center py-8">
                    <x-body-2 class="text-neutral-600">
                        No FAQ items available
                    </x-body-2>
                </div>
            @endforelse

            <!-- Additional items shown when "Show All" is clicked -->
            <template x-if="showAll">
                <div class="space-y-4">
                    @forelse(array_slice($faqItems, $maxItems ?: 0) as $item)
                        <x-faq-item :id="$item['id']" :label="$item['label']" :description="$item['description']" />
                    @empty
                    @endforelse
                </div>
            </template>

            <!-- Show All / Show Less Button -->
            @if($hasMore && $showAllButton)
                <div class="flex justify-center mt-8">
                    <button
                        @click="showAll = !showAll"
                        type="button"
                        class="px-8 py-3 rounded-full transition-all duration-300 font-semibold"
                        style="
                            color: var(--color-primary-300);
                            background-color: var(--color-primary-100);
                        "
                    >
                        <span x-show="!showAll">Show All FAQs</span>
                        <span x-show="showAll">Show Less</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</x-section>