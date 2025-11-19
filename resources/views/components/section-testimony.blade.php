@php
    $testimonyModels = \App\Models\Testimony::query()
        ->where('is_published', true)
        ->orderBy('order')
        ->orderByDesc('created_at')
        ->get();

    // Fallback to static examples if no records yet
    $testimonies = $testimonyModels->count() ? $testimonyModels->map(function ($t) {
        return [
            'name' => $t->name,
            'role' => $t->role,
            'company' => $t->company,
            'location' => $t->location,
            'avatar' => $t->avatar_path ? asset('storage/' . $t->avatar_path) : null,
            'quote' => $t->quote,
            'source' => $t->source,
        ];
    })->toArray() : [
        [
            'name' => 'Budi Santoso',
            'role' => 'Project Engineer',
            'company' => 'GeoTek Nusantara',
            'location' => null,
            'avatar' => null,
            'quote' => null,
            'source' => 'Sarah T., Project Manager',
        ],
        [
            'name' => 'Hiroshi Tanaka',
            'role' => 'Construction Manager',
            'company' => 'ArchiPro Southeast',
            'location' => null,
            'avatar' => null,
            'quote' => null,
            'source' => 'Sarah T., Project Manager',
        ],
        [
            'name' => 'Sandi Wibowo',
            'role' => 'Construction Manager',
            'company' => 'ArchiPro Southeast',
            'location' => null,
            'avatar' => null,
            'quote' => null,
            'source' => 'Sarah T., Project Manager',
        ],
        [
            'name' => 'Doni Saputra',
            'role' => 'Field Coordinator',
            'company' => 'ConstructAsia',
            'location' => null,
            'avatar' => null,
            'quote' => null,
            'source' => 'Sarah T., Project Manager',
        ],
        [
            'name' => 'Rudi Prabowo',
            'role' => 'Supervisor',
            'company' => 'BuildTech',
            'location' => null,
            'avatar' => null,
            'quote' => null,
            'source' => 'Sarah T., Project Manager',
        ],
    ];
@endphp

<section class="py-16 md:py-20">
    <div class="px-4 md:px-16">
        <div class="text-center mb-10">
            <h2 class="display-3"
                style="background: linear-gradient(180deg, #2D6BB4 0%, #2F68B1 28%, #355FA7 49%, #415097 68%, #513B81 85%, #652266 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Real Feedback. Real Results.</h2>
        </div>

        <!-- Slider Container -->
        <div id="testimony-slider" class="relative">
            <!-- Scrollable Track -->
            <div id="testimony-scroll" class="flex gap-4 md:gap-6 overflow-x-auto pb-4 -mx-4 px-4 md:mx-0 md:px-0"
                style="scroll-snap-type: x mandatory; scroll-behavior: smooth;">
                @foreach ($testimonies as $testimony)
                    <div class="snap-start shrink-0 w-[280px] sm:w-[320px] md:w-[340px]">
                        <x-testimony-card :name="$testimony['name']" :role="$testimony['role']"
                            :company="$testimony['company']" :location="$testimony['location']"
                            :avatar="$testimony['avatar']" :quote="$testimony['quote']" :source="$testimony['source']" />
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
    </div>
</section>