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
<div class="section-top-padding px-4 md:px-16 mb-32 sm:pt-40">
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
        }" x-provide="['openedId']">
        <div class="text-left mb-16 flex flex-col gap-8 md:w-[50%]">
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

            <div class="w-full">
                <x-form-input label="" placeholder="What are you looking for?" name="search" icon-position="left"
                    x-model="searchQuery">
                    <x-slot name="icon">
                        <svg class="w-5 h-5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </x-slot>
                </x-form-input>
            </div>
        </div>

        <!-- FAQ Items -->
        <div class="space-y-4">

            <!-- FAQ Items List -->
            <div class="space-y-4">
                <template x-for="item in displayedItems" :key="item.id">
                    <div class="faq-item group">
                        <button type="button" @click="openedId === item.id ? openedId = null : openedId = item.id"
                            :class="{ 'rounded-b-none': openedId === item.id }"
                            class="w-full px-6 py-4 text-left transition-all duration-300 rounded-2xl"
                            style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(5px);"
                            @keydown.enter="openedId === item.id ? openedId = null : openedId = item.id">
                            <div class="flex items-center justify-between gap-6">
                                <!-- Label -->
                                <x-subheading-1 class="flex-1"
                                    style="font-weight: 700; font-size: 18px; line-height: 125%;"
                                    x-text="item.label"></x-subheading-1>

                                <!-- Toggle Icon -->
                                <div class="flex-shrink-0 transition-transform duration-300"
                                    :class="{ 'rotate-180': openedId === item.id }">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M23.293 15.3008L16.8242 21.4883C16.543 21.7695 16.1914 21.875 15.875 21.875C15.5234 21.875 15.1719 21.7695 14.8906 21.4883L8.42188 15.3008C7.85938 14.7734 7.82422 13.8945 8.38672 13.332C8.91406 12.7695 9.79297 12.7344 10.3555 13.2969L15.875 18.5352L21.3594 13.2969C21.9219 12.7344 22.8008 12.7695 23.3281 13.332C23.8906 13.8945 23.8555 14.7734 23.293 15.3008Z"
                                            fill="#020046" />
                                    </svg>
                                </div>
                            </div>
                        </button>

                        <!-- Collapsible Content -->
                        <div x-show="openedId === item.id" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="px-6 py-4 rounded-b-2xl"
                            style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(5px); margin-top: -1px;">
                            <x-body-2 class="text-neutral-700 leading-relaxed">
                                <div x-html="item.description"></div>
                            </x-body-2>
                        </div>
                    </div>
                </template>
            </div>

            <x-empty-search x-show="noResults">
                <x-slot name="header">No FAQ items found matching "<span x-text="searchQuery"></span>"</x-slot>
            </x-empty-search>

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