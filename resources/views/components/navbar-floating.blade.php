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
        @php
          $path = trim($item['url'], '/');
          $isActive = $path === '' ? request()->is('/') : request()->is($path . '*');
        @endphp
        @if ($item['label'] === 'Services')
          @php $servicesActive = request()->is('services*') || request()->is('testing-inspection') || request()->is('application'); @endphp
          <div class="relative" id="services-dropdown-desktop">
            <a href="{{ $item['url'] }}" id="services-toggle" class="heading-7 navbar-link {{ $servicesActive ? 'navbar-link-active text-primary-500' : 'text-neutral-900' }}">
              Services
              <svg xmlns="http://www.w3.org/2000/svg" id="services-arrow" class="ml-2 h-4 w-4 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
            </a>
            <div
              class="absolute mt-2 left-0 w-max rounded-2xl shadow-md border border-neutral-300 hidden z-50 p-4" id="services-dropdown-menu" 
              style="background: radial-gradient(55.46% 578.76% at 50% 50%, rgba(255, 255, 255, 0.6) 0%, rgba(235, 245, 255, 0.6) 100%); backdrop-filter: blur(16px)">
              <div class="flex flex-col gap-4">
                <a href="/testing-inspection">Testing & Inspection</a>
                <a href="/application">Application Procedure</a>
              </div>
            </div>
          </div>
        @else
          <a href="{{ $item['url'] }}" class="heading-7 navbar-link {{ $isActive ? 'navbar-link-active text-primary-500' : 'text-neutral-900 hover:text-primary-500' }}">{{ $item['label'] }}</a>
        @endif
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
      @if ($item['label'] === 'Services')
        <button id="mobile-services-button"
          class="body-2 text-neutral-900 hover:text-primary-500 w-full text-left flex items-center justify-between">
          <span>Services</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <div id="mobile-services-submenu" class="mt-2 ml-4 flex flex-col gap-2 hidden">
          <a href="/testing-inspection" class="body-2 text-neutral-900 hover:text-primary-500">Testing & Inspection</a>
          <a href="/application" class="body-2 text-neutral-900 hover:text-primary-500">Application Procedure</a>
        </div>
      @else
        <a href="{{ $item['url'] }}" class="body-2 text-neutral-900 hover:text-primary-500">{{ $item['label'] }}</a>
      @endif
    @endforeach
    <a href="/contact-us" class="btn-accent px-5 py-2 rounded-full shadow-md text-center mt-4">Talk To Us</a>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      const mobileServicesButton = document.getElementById('mobile-services-button');
      const mobileServicesSubmenu = document.getElementById('mobile-services-submenu');

      mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('active');
      });

      if (mobileServicesButton && mobileServicesSubmenu) {
        mobileServicesButton.addEventListener('click', function () {
          mobileServicesSubmenu.classList.toggle('hidden');
        });
      }

      const servicesDropdown = document.getElementById('services-dropdown-desktop');
      const servicesMenu = document.getElementById('services-dropdown-menu');
      const servicesToggle = document.getElementById('services-toggle');
      const servicesArrow = document.getElementById('services-arrow');
      if (servicesDropdown && servicesMenu && servicesToggle && servicesArrow) {
        const openMenu = () => {
          servicesMenu.classList.remove('hidden');
          servicesToggle.classList.add('navbar-link-active');
          servicesToggle.classList.remove('text-neutral-900');
          servicesToggle.classList.add('text-primary-500');
        };
        const closeMenu = () => {
          servicesMenu.classList.add('hidden');
          servicesArrow.classList.remove('rotate-180');
          servicesToggle.classList.remove('navbar-link-active');
          servicesToggle.classList.remove('text-primary-500');
          servicesToggle.classList.add('text-neutral-900');
        };
        servicesToggle.addEventListener('click', (e) => {
          if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
          e.preventDefault();
          if (servicesMenu.classList.contains('hidden')) openMenu(); else closeMenu();
        });
        document.addEventListener('click', (e) => {
          if (!servicesDropdown.contains(e.target)) closeMenu();
        });
        document.addEventListener('keydown', (e) => {
          if (e.key === 'Escape') closeMenu();
        });
      }
    });
  </script>
</nav>
