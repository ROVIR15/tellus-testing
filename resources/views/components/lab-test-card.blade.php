<!-- Lab Test Card Component -->
<div
  class="latest-news-card-ratio-304x406 w-full m-auto rounded-2xl overflow-hidden relative flex flex-col justify-between text-white">
  <!-- Image Background -->
  <img src="{{ $image ?? asset('images/lab-test-default.jpg') }}" alt="{{ $title ?? 'Lab Test' }}"
    class="w-full h-full object-cover">

  <!-- Overlay Gradient -->
  <div class="absolute inset-0 z-10"
    style="backdrop-filter: blur(1px); background: linear-gradient(180deg, rgba(80, 80, 80, 0) 30%, #505050 100%);">
    <!-- Bottom Title -->
    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
      <h3 class="heading-6 text-white mb-0">{{ $title ?? 'Test Name' }}</h3>
    </div>
  </div>
</div>