<?php

$navbarItems = [
  ['label' => 'Home', 'url' => '/'],
  ['label' => 'Services', 'url' => '/services'],
  ['label' => 'About Us', 'url' => '/about-us'],
  ['label' => 'FAQ', 'url' => '/faq'],
  ['label' => 'Contact Us', 'url' => '/contact-us'],
];

?>

<nav class="navbar-floating">
  <div class="navbar-container">
    <!-- Left: Logo -->
    <a href="/" class="flex items-center gap-3 cursor-pointer">
      <img src="{{ asset('images/logo.png') }}" alt="logo" class="h-10 rounded-full object-cover">
    </a>
    <!-- Center: Links -->
    <div class="navbar-links hidden md:flex items-center gap-10">
      @foreach ($navbarItems as $item)
        <a href="{{ $item['url'] }}" class="heading-7 text-neutral-900 hover:text-primary-500">{{ $item['label'] }}</a>
      @endforeach
    </div>

    <!-- Mobile menu button -->
    <button class="navbar-menu-button" id="mobile-menu-button" aria-label="Toggle mobile menu">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Right: CTA (Hidden on mobile) -->
    <div class="hidden md:block">
      <a href="/contact-us" class="btn-accent px-5 py-2 rounded-full shadow-md">Talk To Us</a>
    </div>
  </div>

  <!-- Mobile menu -->
  <div class="navbar-mobile-menu" id="mobile-menu">
    @foreach ($navbarItems as $item)
      <a href="{{ $item['url'] }}" class="body-2 text-neutral-900 hover:text-primary-500">{{ $item['label'] }}</a>
    @endforeach
    <!-- Talk to Us button in mobile menu -->
    <a href="/contact-us" class="btn-accent px-5 py-2 rounded-full shadow-md text-center mt-4">Talk To Us</a>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');

      mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('active');
      });
    });
  </script>
</nav>