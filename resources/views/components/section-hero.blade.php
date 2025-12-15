<x-hero class="bg-gradient-to-br from-primary-500 via-primary-400 to-primary-300">
    <div class="grid grid-cols-1 sm:grid-cols-[40%_60%] gap-12 items-center">
        <!-- Left Content -->
        <div class="relative flex flex-col gap-8 justify-center">
            <x-heading-display-2 class="text-white" style="color: var(--color-secondary-300);">
                Accurate testing for geosynthetic materials.
            </x-heading-display-2>

            <img src="{{ asset('images/vector-2.svg') }}" alt="Decorative element"
                class="w-full h-auto absolute top-[45%] left-0 hidden lg:block">

            <x-subheading-1 class="opacity-95" style="color: var(--color-secondary-300);">
                Certified lab services for soil and water testing. Specialized in PVD analysis and geotechnical
                evaluations. Accurate results for confident project decisions.
            </x-subheading-1>

            <a href="#inquiry"
               class="btn-accent bg-secondary-500 hover:bg-secondary-600 text-white px-8 py-3 rounded-full font-semibold inline-block w-fit">
               Send testing inquiry
            </a>
        </div>

        <!-- Right Image -->
        <div class="flex justify-center items-center md:pr-12">
            <!-- Placeholder for lab scientist image -->
            <img src="{{ asset('images/hero-section.png') }}" alt="Lab Scientist"
                class="w-full" style="border-radius: 25px">
        </div>
    </div>
</x-hero>
