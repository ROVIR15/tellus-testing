<section class="section-lg bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Heading -->
        <div class="flex flex-col">
            <x-heading-h1 class="text-white mb-6">
                Specialized in Soil, Water, and Geosynthetics
            </x-heading-h1>

            <x-body-1 class="text-white opacity-95 mb-8">
                Our lab isn’t just a facility—it’s a partner in your project’s success. Whether you're in construction,
                geotech, or infrastructure,
                reliable results mean smarter decisions.
            </x-body-1>
        </div>


        <!-- Mock Test Data -->
        @php
            $labTests = [
                [
                    'id' => 1,
                    'title' => 'Permeability & Hydraulic Conductivity Test',
                    'description' => 'Measure soil water permeability',
                    'image' => 'images/lab-test-1.jpg'
                ],
                [
                    'id' => 2,
                    'title' => 'Soil Compaction Analysis',
                    'description' => 'Determine optimal soil density',
                    'image' => 'images/lab-test-2.jpg'
                ],
                [
                    'id' => 3,
                    'title' => 'Water Quality Testing',
                    'description' => 'Comprehensive water analysis',
                    'image' => 'images/lab-test-3.jpg'
                ],
                [
                    'id' => 4,
                    'title' => 'Bearing Capacity Test',
                    'description' => 'Foundation load assessment',
                    'image' => 'images/lab-test-4.jpg'
                ],
            ];
        @endphp

        <!-- Test Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($labTests as $test)
                <x-lab-test-card :title="$test['title']" :description="$test['description']"
                    :image="asset($test['image'])" />
            @endforeach
        </div>
    </div>
</section>