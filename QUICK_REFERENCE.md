# Quick Reference: Design System

## Color Quick Reference

### Quick Access
```
Primary (Brand Blue):     primary-100/200/300/400/500
Secondary (Accent):       secondary-100/200/300/400/500
Neutral (Text/Structure): neutral-100/200/300...1000
Feedback:                 success / warning / error / info
```

## Typography Quick Reference

### Headings
- **Hero**: `<x-heading-display-1>` (70px)
- **Page Title**: `<x-heading-h1>` (30px)
- **Section**: `<x-heading-h2>` (26px)
- **Subsection**: `<x-heading-h3>` (26px)
- **Card Title**: `<x-heading-h4>` (24px)

### Body Text
- **Large**: `<x-body-1>` (18px)
- **Standard**: `<x-body-2>` (16px)
- **Small**: `<x-body-3>` (15px)
- **Tiny**: `<x-body-4>` (14px)

## Component Quick Reference

### Buttons
```blade
<x-button-primary>Click Me</x-button-primary>
<x-button-secondary>Secondary</x-button-secondary>
<x-button-accent>Special</x-button-accent>
```

### Layout
```blade
<x-hero>Hero Section</x-hero>
<x-section>Normal Section</x-section>
<x-section-lg>Large Section</x-section-lg>
```

### Cards
```blade
<x-card class="p-8">Content</x-card>
<x-card-lg class="p-8">Large Card</x-card-lg>
```

### Other
```blade
<x-divider />
```

## Tailwind Utility Classes

| Class | Purpose |
|-------|---------|
| `btn-primary` | Blue button styling |
| `btn-secondary` | Outlined blue button |
| `btn-accent` | Pink accent button |
| `input-field` | Form input styling |
| `card` | Card styling |
| `card-lg` | Large card |
| `section` | Section padding |
| `section-lg` | Large section padding |

## Common Patterns

### Hero Section
```blade
<x-hero class="bg-gradient-to-br from-primary-100 to-primary-50">
    <div class="max-w-5xl mx-auto px-6 py-20 md:py-32 text-center">
        <h1 class="display-1 mb-6">Headline</h1>
        <p class="body-1 mb-8">Subheading</p>
        <x-button-primary>CTA</x-button-primary>
    </div>
</x-hero>
```

### Feature Grid
```blade
<x-section>
    <div class="max-w-5xl mx-auto">
        <h2 class="heading-1 mb-16 text-center">Features</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <x-card class="p-8">
                <h3 class="heading-4 mb-3">Feature</h3>
                <p class="body-3">Description</p>
            </x-card>
        </div>
    </div>
</x-section>
```

## File Structure

```
New files created:
├── tailwind.config.js              ✓ Design tokens
├── config/design-system.php        ✓ Token config
├── resources/css/tokens.css        ✓ CSS utilities
├── resources/views/layouts/app.blade.php      ✓ Main layout
├── resources/views/components/      ✓ All components
└── resources/views/welcome.blade.php          ✓ Landing page

Admin Dashboard:
├── app/Providers/Filament/AdminPanelProvider.php ✓ Config
└── Admin panel at: /admin
```

## Common Tasks

### Add a New Section
```blade
<x-section class="bg-white">
    <div class="max-w-5xl mx-auto">
        <h2 class="heading-1 mb-8">Title</h2>
        <!-- Your content -->
    </div>
</x-section>
```

### Create a Link Button
```blade
<a href="/path" class="btn-primary inline-block">Link Button</a>
```

### Add Form Input
```blade
<input class="input-field" type="text" placeholder="Enter text" />
```

### Responsive Text
```blade
<!-- 26px on desktop, 18px on mobile -->
<h1 class="text-heading-2 md:text-heading-1">Title</h1>
```

## Colors by Use Case

### CTAs & Actions
- Primary buttons: `bg-primary-500 text-white`
- Secondary buttons: `bg-transparent border-primary-500 text-primary-500`

### Text
- Primary text: `text-neutral-900` (dark)
- Secondary text: `text-neutral-700` (medium)
- Muted text: `text-neutral-600` (light)
- On white: `text-neutral-950` (almost black)

### Backgrounds
- Light backgrounds: `bg-neutral-50` or `bg-neutral-100`
- White: `bg-white` or `bg-neutral-100`
- Darker: `bg-neutral-900` (footer, dark sections)

### Borders & Dividers
- Light dividers: `border-neutral-300`
- Medium dividers: `border-neutral-400`
- Strong dividers: `border-neutral-600`

### Feedback
- Success: `text-success` or `bg-success`
- Warning: `text-warning` or `bg-warning`
- Error: `text-error` or `bg-error`
- Info: `text-info` or `bg-info`

## URLs

| Page | URL |
|------|-----|
| Landing | `/` |
| Admin Dashboard | `/admin` |
| Admin Login | `/admin/login` |

## Next: What to Build

1. **Create Admin Users** - Set up Filament Resource for Users
2. **Add Database Models** - Create your data models
3. **Build Admin Resources** - CRUD interfaces in Filament
4. **Create Landing Pages** - Use components for more pages
5. **Add Livewire Forms** - Interactive forms on landing page
