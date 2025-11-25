<!-- Who We Serve Section - Figma Specification Match -->
<section class="section">
    <!-- 3x3 Grid Layout with 24px gap -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Left Panel: "Who We Serve" - Spans 2 rows (row 1-2, col 1) -->
        <div class="md:row-span-2">
            <x-who-we-serve-panel title="Who We Serve"
                description="Tellus Testing provides essential material testing services for a wide range of industries that build and innovate. Our clients include:"
                icon="🌀" />
        </div>

        <!-- Row 1, Col 2: Infrastructure & Civil Engineering -->
        <x-who-we-serve-card title="Infrastructure & Civil Engineering"
            description="Comprehensive material analysis for large-scale projects"
            image="images/who-we-serve/1.png" />

        <!-- Row 1, Col 3: Environmental & Geotechnical Firms -->
        <x-who-we-serve-card title="Environmental & Geotechnical Firms"
            description="Specialized soil and water testing services" image="images/who-we-serve/1.png" />

        <!-- Row 2, Col 2: Government Projects -->
        <x-who-we-serve-card title="Government Projects" description="Certified testing for public infrastructure"
            image="images/who-we-serve/2.png" />

        <!-- Row 2, Col 3: Construction & Land Development -->
        <x-who-we-serve-card title="Construction & Land Development"
            description="On-site and laboratory testing solutions" image="images/who-we-serve/3.png" />

        <!-- Row 3, Col 1-2: Complete Laboratory Services (spans 2 columns) -->
        <x-service-highlight title="Complete Laboratory Services"
            description="Any industry working with construction materials, soil analysis, or site development can benefit from our comprehensive testing laboratory."
            background="bg-secondary-100" image="images/complete-who-we-serve/4.png" class="md:col-span-2 p-6" />

        <!-- Row 3, Col 3: Quality Standards -->
        <x-lab-card-4 lab_name="Soil Compaction Testing" test_type="Geotechnical Analysis" :standards="['ASTM International Standards', 'AASHTO Testing Protocols', 'ISO 17025 Accredited']"
            turnaround_time="Get results when you need them with our expedited testing services and comprehensive reporting."
            description="" href="/request-testing">
            Additional custom content can go here
        </x-lab-card-4>
    </div>
</section>