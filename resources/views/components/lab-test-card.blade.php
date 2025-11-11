<!-- Lab Test Card Component -->
<div
  style="height: 392px; gap: 16px; opacity: 1; padding: 24px; background: linear-gradient(180deg, rgba(80, 80, 80, 0) 49.07%, #505050 100%); backdrop-filter: blur(44px);"
  class="rounded-2xl overflow-hidden relative flex flex-col justify-between text-white">
  <!-- Image Background -->
  <div class="absolute inset-0 z-0">
    <img src="{{ $image ?? asset('images/lab-test-default.jpg') }}" alt="{{ $title ?? 'Lab Test' }}"
      class="w-full h-full object-cover">
  </div>

  <!-- Overlay Gradient -->
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/40 z-10"></div>

  <!-- Content -->
  <div class="relative z-20 flex flex-col justify-end h-full">
    <h3 class="heading-6 text-white mb-2">{{ $title ?? 'Test Name' }}</h3>
  </div>
</div>