<x-hero class="bg-gradient-to-br from-primary-500 via-primary-400 to-primary-300">
    <div class="px-6 py-20 md:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="flex flex-col gap-8 justify-center">
                <x-heading-display-3 class="text-white" style="color: var(--color-secondary-300);">
                    Accurate testing for geosynthetic materials.
                    <!-- Precision Testing For&nbsp;<span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-900 to-pink-500">Smarter</span><br>Ground Solutions -->
                </x-heading-display-3>
                <x-subheading-1 class="opacity-95" style="color: var(--color-secondary-300);">
                    Certified lab services for soil and water testing. Specialized in PVD analysis and geotechnical
                    evaluations. Accurate results for confident project decisions.
                </x-subheading-1>

                <x-button-accent
                    class="bg-secondary-500 hover:bg-secondary-600 text-white px-8 py-3 rounded-full font-semibold inline-block max-w-md">
                    Send testing inquiry
                </x-button-accent>
            </div>

            <!-- Right Image -->
            <div class="hidden lg:flex justify-center items-center">
                <!-- Placeholder for lab scientist image -->
                <img src="{{ asset('images/hero-section.png') }}" alt="Lab Scientist"
                    class="w-full h-auto rounded-3xl shadow-2xl">
            </div>
        </div>
    </div>
</x-hero>