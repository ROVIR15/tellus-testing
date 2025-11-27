<section class="section-no-right-padding">
    <div class="flex flex-col gap-8 mx-auto">
        <!-- Heading -->
        <div class="flex flex-col gap-4">
            <x-heading-h1 class="custom-color">
                Specialized in Soil, Water, and Geosynthetics
            </x-heading-h1>

            <x-subheading-2>
                Our lab isn’t just a facility—it’s a partner in your project’s success. Whether you're in construction,
                geotech, or infrastructure,
                reliable results mean smarter decisions.
            </x-subheading-2>
        </div>


        <!-- Mock Test Data -->
        @php
            $labTests = [
                [
                    'id' => 1,
                    'title' => 'Permeability & Hydraulic Conductivity Test',
                    'description' => 'Measure soil water permeability',
                    'image' => 'images/lab-facility/1.png'
                ],
                [
                    'id' => 2,
                    'title' => 'Soil Compaction Analysis',
                    'description' => 'Determine optimal soil density',
                    'image' => 'images/lab-facility/2.png'
                ],
                [
                    'id' => 3,
                    'title' => 'Water Quality Testing',
                    'description' => 'Comprehensive water analysis',
                    'image' => 'images/lab-facility/3.jpg'
                ],
                [
                    'id' => 4,
                    'title' => 'Bearing Capacity Test',
                    'description' => 'Foundation load assessment',
                    'image' => 'images/lab-facility/4.jpg'
                ],
            ];
        @endphp

        <!-- Test Cards: Horizontal scroll on mobile, grid on larger screens -->
        <div id="lab-services-scroll" class="flex gap-4 overflow-x-auto mx-1 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 lg:grid-cols-4 sm:gap-6 no-scrollbar" style="scroll-snap-type: x mandatory; scroll-behavior: smooth;">
            @foreach($labTests as $test)
                <div class="snap-start shrink-0 w-[260px] sm:w-auto">
                    <x-lab-test-card :title="$test['title']" :description="$test['description']"
                        :image="asset($test['image'])" />
                </div>
            @endforeach
        </div>
    </div>
</section>