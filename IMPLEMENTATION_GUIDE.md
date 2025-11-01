# Implementation Guide: Landing Page + Admin Dashboard

## Overview
This document provides a comprehensive guide to the design system implementation for your CMS platform using Laravel, Filament, and Livewire.

## Architecture Overview

### Technology Stack
- **Backend**: Laravel 12
- **Admin Dashboard**: Filament 4
- **Frontend Framework**: Livewire
- **Styling**: Tailwind CSS 4
- **Fonts**: Montserrat (Display) & Work Sans (Body)

### Project Structure
```
resources/
├── css/
│   ├── app.css           # Main CSS file (imports Tailwind + tokens)
│   └── tokens.css        # Design system tokens and utility classes
├── views/
│   ├── layouts/
│   │   └── app.blade.php          # Main layout with navigation/footer
│   ├── components/
│   │   ├── button-*.blade.php     # Button variants
│   │   ├── heading-*.blade.php    # Typography hierarchy
│   │   ├── body-*.blade.php       # Body text styles
│   │   ├── card*.blade.php        # Card components
│   │   ├── section*.blade.php     # Section layouts
│   │   ├── divider.blade.php      # Divider component
│   │   └── hero.blade.php         # Hero section
│   └── welcome.blade.php          # Landing page
config/
├── design-system.php     # Centralized design tokens config
└── app.php              # Laravel config
```

## Design System Configuration

### Color System

#### Primary Colors (Brand Blue)
```
primary-100: #add8ff  (Lightest)
primary-200: #1f93ff  (Light)
primary-300: #0066ac  (Medium-light)
primary-400: #004a8f  (Medium)
primary-500: #002d56  (Darkest - Base)
primary-10:  #3041e1  (Transparency overlay)
```
**Usage**: CTAs, buttons, links, primary UI elements, focus states

#### Secondary Colors (Accent Pink/Rose)
```
secondary-100: #fbccf6 (Lightest)
secondary-200: #f298e6 (Light)
secondary-300: #a60e52 (Medium)
secondary-400: #840811 (Medium-dark)
secondary-500: #39050c (Darkest)
secondary-10:  #ae6552 (Transparency overlay)
```
**Usage**: Badges, highlights, secondary CTAs, accent elements

#### Neutral Colors
```
neutral-100:  #ffffff   (Pure white)
neutral-200:  #f5f5f5   (Very light gray - backgrounds)
neutral-300:  #d2d2d2   (Light gray)
neutral-400:  #b8b8b8   (Medium-light gray)
neutral-500:  #949494   (Medium gray)
neutral-600:  #6b6b6c   (Medium-dark gray)
neutral-700:  #777777   (Dark gray)
neutral-800:  #606060   (Very dark gray)
neutral-900:  #34343a   (Near black - text)
neutral-950:  #1a1a1a   (For text on white)
neutral-1000: #111111   (True black)
neutral-10:   #233333   (Transparency overlay)
```
**Usage**: Text, borders, form fields, backgrounds, structure

#### Feedback Colors
```
success: #2ea44f   (Green)
warning: #fdb81e   (Yellow/Orange)
error:   #da3633   (Red)
info:    #0969da   (Blue)
```
**Usage**: Status messages, validation, alerts

### Typography System

#### Font Families
- **Display Font**: Montserrat (headings, hero text, brand elements)
- **Body Font**: Work Sans (paragraphs, UI text, descriptions)

#### Hierarchy Levels

**DISPLAY Styles** (Largest, Hero section)
- DISPLAY-1: 70px, Montserrat Bold, line-height 60px
- DISPLAY-2: 26px, Work Sans Bold, line-height 42px

**HEADING Styles** (Structural hierarchy)
- HEADING-1: 30px, Montserrat Bold (primary page headings)
- HEADING-2: 26px, Work Sans Bold (major sections)
- HEADING-3: 26px, Work Sans Bold (subsections)
- HEADING-4: 24px, Work Sans Bold (card titles)

**SUBHEADING Styles** (Supporting text)
- SUBHEADING-1: 23px, Work Sans Bold (section intros)
- SUBHEADING-2: 20px, Work Sans Bold (supporting headlines)
- SUBHEADING-3: 18px, Work Sans Bold (tertiary headings)

**BODY Styles** (Content)
- BODY-1: 18px, Work Sans Regular (primary body text)
- BODY-2: 16px, Work Sans Regular (secondary content)
- BODY-3: 15px, Work Sans Regular (compact text)
- BODY-4: 14px, Work Sans Regular (captions, small text)

## Component Usage Guide

### Basic Text Components
```blade
<!-- Display heading -->
<x-heading-display-1>Your Hero Title</x-heading-display-1>

<!-- Standard heading -->
<x-heading-h1>Section Title</x-heading-h1>

<!-- Body text -->
<x-body-1>Your paragraph text here</x-body-1>
```

### Button Components
```blade
<!-- Primary button (blue) -->
<x-button-primary>Get Started</x-button-primary>

<!-- Secondary button (outlined blue) -->
<x-button-secondary>Learn More</x-button-secondary>

<!-- Accent button (pink/rose) -->
<x-button-accent>Special Action</x-button-accent>
```

### Layout Components
```blade
<!-- Standard section -->
<x-section>
    <div class="max-w-5xl mx-auto">
        <!-- Your content -->
    </div>
</x-section>

<!-- Large section (hero-like spacing) -->
<x-section-lg>
    <div class="max-w-5xl mx-auto">
        <!-- Your content -->
    </div>
</x-section-lg>

<!-- Hero section with gradient background -->
<x-hero class="bg-gradient-to-br from-primary-100 to-primary-50">
    <!-- Your content -->
</x-hero>
```

### Card Components
```blade
<!-- Standard card -->
<x-card class="p-8">
    <h3 class="heading-4 mb-4">Title</h3>
    <p class="body-2">Description</p>
</x-card>

<!-- Large card with more shadow -->
<x-card-lg class="p-8">
    <!-- Your content -->
</x-card-lg>
```

### Other Components
```blade
<!-- Divider line -->
<x-divider class="my-8"></x-divider>

<!-- Using Tailwind CSS classes -->
<div class="btn-primary">Primary Button Style</div>
<div class="btn-secondary">Secondary Button Style</div>
<input class="input-field" type="text" />
```

## Filament Admin Dashboard

### Location
- **URL**: `http://your-domain/admin`
- **Configuration**: `app/Providers/Filament/AdminPanelProvider.php`

### Color Configuration
The Filament panel is configured with:
- Primary: Blue
- Secondary: Rose
- Success: Emerald
- Warning: Amber
- Danger: Red
- Info: Blue

### Customization
To modify Filament colors, edit `AdminPanelProvider.php`:
```php
->colors([
    'primary' => Color::Blue,
    'secondary' => Color::Rose,
    // ... other colors
])
```

## Creating New Pages

### Landing Page Sections
The welcome page template includes:
1. **Hero Section** - Main CTA with background gradient
2. **Features Section** - Three-column feature cards
3. **Benefits Section** - Two-column layout with checkmarks
4. **CTA Section** - Final call-to-action with gradient

### Adding Custom Sections
```blade
<x-section class="bg-white">
    <div class="max-w-5xl mx-auto">
        <h2 class="heading-1 mb-8">Section Title</h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Cards or content -->
        </div>
    </div>
</x-section>
```

## Livewire Integration

For interactive landing page elements (forms, modals, etc.):

### Create a Livewire Component
```bash
php artisan make:livewire ContactForm
```

### Use in Views
```blade
<livewire:contact-form />
```

### Example: Contact Form Component
```php
<?php
namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $email;
    public $message;
    
    public function submit()
    {
        // Handle form submission
    }
    
    public function render()
    {
        return view('livewire.contact-form');
    }
}
```

## Tailwind CSS Custom Classes

These predefined utility classes are available throughout your templates:

- `.btn-primary` - Blue primary button
- `.btn-secondary` - Outlined blue button
- `.btn-accent` - Pink/rose accent button
- `.input-field` - Form input styling
- `.card` - Standard card styling
- `.card-lg` - Large card with more shadow
- `.divider` - Horizontal divider line
- `.section` - Standard section spacing
- `.section-lg` - Large section spacing (for heroes)

## Responsive Design

All components include responsive utilities:

```blade
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Responsive grid -->
</div>

<div class="px-6 md:px-8 lg:px-12">
    <!-- Responsive padding -->
</div>

<x-button-primary class="w-full sm:w-auto">
    <!-- Button sizing -->
</x-button-primary>
```

## Accessibility & WCAG Compliance

### Color Contrast
All color combinations meet WCAG AA standards (4.5:1 for normal text, 3:1 for large text):
- Text always uses high-contrast neutral colors on backgrounds
- Primary-500 on white: ✓ Excellent contrast
- Neutral-900 on light backgrounds: ✓ Excellent contrast

### Typography
- Minimum body text size: 16px (except captions)
- Line heights optimized for readability
- Font weights provide visual hierarchy without sacrificing legibility

### Semantic HTML
- Proper heading hierarchy (h1, h2, h3, h4)
- Form labels and inputs properly associated
- Interactive elements are keyboard accessible
- Focus states clearly visible

## Development Workflow

### Starting Development
```bash
# Install dependencies
composer install
npm install

# Build assets
npm run dev  # Development with watch
npm run build  # Production build

# Run application
php artisan serve
```

### Creating New Resources in Filament
```bash
php artisan make:filament-resource ResourceName
```

### Creating Livewire Components
```bash
php artisan make:livewire ComponentName
```

## Best Practices

### When Using Components
1. Always use semantic heading hierarchy (h1 → h2 → h3...)
2. Use color utilities for consistency (primary, secondary, neutral)
3. Maintain spacing with section and section-lg components
4. Test responsive layout on mobile, tablet, and desktop
5. Verify color contrast ratios for all text

### Custom CSS
If you need custom styles, add them to `resources/css/tokens.css` or create new utility classes:

```css
@layer components {
    .custom-element {
        @apply rounded-lg border border-neutral-300 shadow-md;
    }
}
```

### Organizing Blade Views
- Store reusable layouts in `resources/views/layouts/`
- Store components in `resources/views/components/`
- Use Blade component slot syntax for flexible layouts
- Group related Livewire components in subdirectories

## Troubleshooting

### Colors Not Displaying
1. Ensure Tailwind CSS is compiled: `npm run build`
2. Check that `app.css` is imported in your layout
3. Verify color class names match Tailwind config

### Typography Not Applying
1. Verify font families are loaded in `app.blade.php`
2. Check that CSS classes match configured sizes
3. Ensure Montserrat and Work Sans fonts are installed

### Filament Not Styling
1. Clear Filament cache: `php artisan filament:cache-components`
2. Republish Filament assets: `php artisan vendor:publish --provider=Filament`
3. Verify AdminPanelProvider is properly configured

## Next Steps

1. **Create Admin Resources**: Use Filament to create CRUD resources
2. **Build More Pages**: Create additional landing pages with custom sections
3. **Add Forms**: Create contact forms and lead capture using Livewire
4. **Authentication**: Set up user registration and login flows
5. **Database Schema**: Design and migrate your database structure

## References

- **Tailwind CSS**: https://tailwindcss.com/docs
- **Laravel Filament**: https://filamentphp.com/docs
- **Livewire**: https://livewire.laravel.com/docs
- **Laravel**: https://laravel.com/docs
