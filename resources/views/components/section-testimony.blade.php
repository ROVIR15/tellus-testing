@props(['testimonies' => [], 'fallback' => true])

@php
    // Normalize emptiness check for arrays/collections
    $isEmpty = is_array($testimonies)
        ? count($testimonies) === 0
        : ($testimonies instanceof \Illuminate\Support\Collection ? $testimonies->isEmpty() : empty($testimonies));

    // Provide sample testimonies only when fallback is enabled
    if ($isEmpty && $fallback) {
        $testimonies = [
            [
                'name' => 'Budi Santoso',
                'role' => 'Project Engineer',
                'company' => 'GeoTek Nusantara',
                'location' => null,
                'avatar' => null,
                'quote' => 'Tellus Testing delivered clear, reliable results on tight timelines. Their reports directly informed our foundation design.',
                'source' => '',
            ],
            [
                'name' => 'Hiroshi Tanaka',
                'role' => 'Construction Manager',
                'company' => 'ArchiPro Southeast',
                'location' => null,
                'avatar' => null,
                'quote' => 'Accurate testing and professional communication. The team helped us resolve material issues before they became costly.',
                'source' => '',
            ],
            [
                'name' => 'Sandi Wibowo',
                'role' => 'Construction Manager',
                'company' => 'ArchiPro Southeast',
                'location' => null,
                'avatar' => null,
                'quote' => 'The on-site crew was meticulous and safety-minded. Data quality exceeded expectations for QA/QC.',
                'source' => '',
            ],
            [
                'name' => 'Doni Saputra',
                'role' => 'Field Coordinator',
                'company' => 'ConstructAsia',
                'location' => null,
                'avatar' => null,
                'quote' => 'Fast turnaround and transparent methods. Their findings kept our schedule on track.',
                'source' => '',
            ],
            [
                'name' => 'Rudi Prabowo',
                'role' => 'Supervisor',
                'company' => 'BuildTech',
                'location' => null,
                'avatar' => null,
                'quote' => 'Consistent, repeatable measurements and practical recommendations. We’d gladly work with them again.',
                'source' => '',
            ],
        ];
        $isEmpty = false;
    }
@endphp

<section class="py-16 md:py-20">
    <div class="px-4 md:px-16">
        <div class="text-center mb-10">
            <p class="heading-1"
                style="background: linear-gradient(180deg, #2D6BB4 0%, #2F68B1 28%, #355FA7 49%, #415097 68%, #513B81 85%, #652266 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Real Feedback. Real Results.
            </p>
        </div>

        @if(!$isEmpty)
            <!-- Slider Container -->
            <div id="testimony-slider" class="relative">
                <!-- Scrollable Track -->
                <div id="testimony-scroll" class="flex gap-4 md:gap-6 overflow-x-auto pb-4 -mx-4 px-4 md:mx-0 md:px-0 no-scrollbar"
                    style="scroll-snap-type: x mandatory; scroll-behavior: smooth;">
                    @foreach ($testimonies as $testimony)
                        <div class="snap-start shrink-0 w-[280px] sm:w-[320px] md:w-[340px]">
                            <x-testimony-card :name="$testimony['name']" :role="$testimony['role']"
                                :company="$testimony['company']" :location="$testimony['location'] ?? null"
                                :avatar="$testimony['avatar'] ?? null" :quote="$testimony['quote'] ?? null" :source="$testimony['source'] ?? null" />
                        </div>
                    @endforeach
                </div>
            </div>

            <script>
                (function () {
                    const container = document.getElementById('testimony-scroll');
                    if (!container) return;

                    const intervalMs = 3500; // auto-slide interval
                    let timer;

                    function next() {
                        const first = container.children[0];
                        if (!first) return;
                        const itemWidth = first.getBoundingClientRect().width;
                        const style = getComputedStyle(container);
                        const gap = parseFloat(style.columnGap || style.gap || 0);
                        const step = itemWidth + gap;
                        const maxScroll = container.scrollWidth - container.clientWidth;
                        let nextLeft = container.scrollLeft + step;
                        if (nextLeft >= maxScroll - 2) {
                            nextLeft = 0; // reset to start
                        }
                        container.scrollTo({ left: nextLeft, behavior: 'smooth' });
                    }

                    function start() {
                        stop();
                        timer = setInterval(next, intervalMs);
                    }

                    function stop() {
                        if (timer) clearInterval(timer);
                    }

                    // Pause on hover; resume on leave
                    container.addEventListener('mouseenter', stop);
                    container.addEventListener('mouseleave', start);
                    window.addEventListener('resize', start);
                    start();
                })();
            </script>
        @else
            <div class="text-center py-8">
                <x-body-2 style="color: var(--color-primary-500);">No testimonies available yet. Check back soon.</x-body-2>
            </div>
        @endif
    </div>
</section>