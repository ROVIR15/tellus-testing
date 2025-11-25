@props(['items' => [], 'maxItems' => null, 'showAllButton' => true])

<!-- FAQ Section Container -->
@php
    // Use only props-provided items; fallback to constants for empty state.
    $faqItems = $items;

    // Calculate displayed and total items
    $displayedItems = $maxItems ? array_slice($faqItems, 0, $maxItems) : $faqItems;
    $totalItems = count($faqItems);
    $hasMore = $maxItems && count($faqItems) > $maxItems;
@endphp

<!-- Experimentation Section -->
<div class="section-top-padding px-16 mb-32">
    <div class="w-full" style="color: var(--color-secondary-300);" x-data="{
            showAll: false,
            openedId: null,
            searchQuery: '',
            allItems: {{ \Illuminate\Support\Js::from($faqItems) }},
            maxItems: {{ $maxItems ?? 'null' }},
            
            get filteredItems() {
                if (!this.searchQuery.trim()) {
                    return this.allItems;
                }
                const query = this.searchQuery.toLowerCase();
                return this.allItems.filter(item => 
                    item.label.toLowerCase().includes(query) || 
                    item.description.toLowerCase().includes(query)
                );
            },
            
            get displayedItems() {
                const filtered = this.filteredItems;
                if (this.showAll || !this.maxItems || this.searchQuery.trim()) {
                    return filtered;
                }
                return filtered.slice(0, this.maxItems);
            },
            
            get hasMoreToShow() {
                return !this.searchQuery.trim() && 
                       this.maxItems && 
                       this.filteredItems.length > this.maxItems && 
                       !this.showAll;
            },
            
            get noResults() {
                return this.filteredItems.length === 0;
            }
        }">
        <div class="text-left mb-16 flex flex-col gap-16">
            <x-heading-display-3 style="color: var(--color-secondary-300);">
                Frequently Asked Questions
            </x-heading-display-3>
            <x-heading-h4 style="color: inherit">
                Got a question? We've got you covered.
            </x-heading-h4>

            <x-body-1 style="color: inherit;">
                Submit the required documents, provide your samples, and receive confirmation—all in a few easy
                steps. Make sure to prepare all necessary information before starting to ensure a smooth and
                efficient submission.
            </x-body-1>

            <x-form-input label="" placeholder="What are you looking for?" name="search" icon-position="left"
                style="width: 50%;" x-model="searchQuery">
                <x-slot name="icon">
                    ✉️
                </x-slot>
            </x-form-input>
        </div>

        <!-- FAQ Items -->
        <div class="space-y-4">

            <!-- FAQ Items List -->
            <div class="space-y-4">
                <template x-for="item in displayedItems" :key="item.id">
                    <div x-data="{ isOpen: false }"
                        class="pink-border transition-all duration-300 ease-in-out rounded-2xl border border-solid p-6 flex flex-col"
                        :class="{ 'gap-6': isOpen }">
                        <!-- Question -->
                        <div class="flex justify-between items-center cursor-pointer" @click="isOpen = !isOpen">
                            <h3 class="heading-4 text-neutral-1000 flex-1" x-text="item.label"></h3>
                            <button type="button"
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full transition-transform duration-300"
                                :class="{ 'rotate-180': isOpen }">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Answer -->
                        <div x-show="isOpen" x-collapse class="body-3 text-neutral-700 leading-relaxed">
                            <div x-html="item.description"></div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- No Results Message -->
            <div x-show="noResults" class="text-center py-8">
                <x-body-2 style="color: var(--color-neutral-600);">
                    No FAQ items found matching "<span x-text="searchQuery"></span>"
                </x-body-2>
            </div>

            <!-- Show All / Show Less Button -->
            <div x-show="hasMoreToShow || (showAll && !searchQuery.trim())" class="flex justify-center mt-8">
                <button @click="showAll = !showAll" type="button"
                    class="px-8 py-3 rounded-full transition-all duration-300 font-semibold" style="
                            color: var(--color-primary-300);
                            background-color: var(--color-primary-100);
                        ">
                    <span x-show="!showAll" x-text="'Show All ' + filteredItems.length + ' FAQs'"></span>
                    <span x-show="showAll">Show Less</span>
                </button>
            </div>
        </div>
    </div>
</div>