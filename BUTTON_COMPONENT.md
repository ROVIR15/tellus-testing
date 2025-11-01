# Button Component Documentation

## Overview
The enhanced button component supports multiple variants, sizes, and states with optional icon support. It's designed to be flexible and follow the design system specifications.

## Component Location
`resources/views/components/button.blade.php`

## Basic Usage

### Default Button (Primary, Medium)
```blade
<x-button>Click me</x-button>
```

## Variants

### Primary Button (Default)
```blade
<x-button variant="primary">Primary Button</x-button>
```
- **Color**: Dark blue (#002d56)
- **Hover**: Lighter blue (#004a8f)
- **Use Case**: Main CTAs, primary actions

### Secondary Button
```blade
<x-button variant="secondary">Secondary Button</x-button>
```
- **Color**: White with blue border
- **Hover**: Light blue background
- **Use Case**: Alternative actions, less emphasis

### Accent Button
```blade
<x-button variant="accent">Accent Button</x-button>
```
- **Color**: Dark pink/rose (#a60e52)
- **Hover**: Darker pink (#840811)
- **Use Case**: Special highlights, secondary CTAs

## Sizes

### Small Button
```blade
<x-button size="sm">Small</x-button>
```
- **Padding**: px-3 py-1.5
- **Font Size**: 14px (text-sm)
- **Use Case**: Inline actions, compact layouts

### Medium Button (Default)
```blade
<x-button size="md">Medium</x-button>
```
- **Padding**: px-6 py-3
- **Font Size**: 16px (text-base)
- **Use Case**: Standard buttons

### Large Button
```blade
<x-button size="lg">Large</x-button>
```
- **Padding**: px-8 py-4
- **Font Size**: 18px (text-lg)
- **Use Case**: Hero sections, prominent CTAs

## Icon Support

### Icon on Left (Default)
```blade
<x-button icon-position="left">
    <x-slot:icon>
        <svg><!-- SVG icon --></svg>
    </x-slot:icon>
    Download
</x-button>
```

### Icon on Right
```blade
<x-button icon-position="right">
    <x-slot:icon>
        <svg><!-- SVG icon --></svg>
    </x-slot:icon>
    Next
</x-button>
```

### Icon Only
```blade
<x-button>
    <x-slot:icon>
        <svg><!-- SVG icon --></svg>
    </x-slot:icon>
</x-button>
```

## States

### Disabled Button
```blade
<x-button disabled>Disabled Button</x-button>
```
- **Visual**: 50% opacity, grayed out, cursor not-allowed
- **Interaction**: Cannot be clicked

## Combinations

### Small Primary Button with Left Icon
```blade
<x-button variant="primary" size="sm" icon-position="left">
    <x-slot:icon>
        <svg class="w-4 h-4"><!-- Small icon --></svg>
    </x-slot:icon>
    Save
</x-button>
```

### Large Secondary Button with Right Icon
```blade
<x-button variant="secondary" size="lg" icon-position="right">
    <x-slot:icon>
        <svg class="w-6 h-6"><!-- Large icon --></svg>
    </x-slot:icon>
    Continue
</x-button>
```

### Large Accent Button (Disabled)
```blade
<x-button variant="accent" size="lg" disabled>
    Upgrade Plan
</x-button>
```

## Styling with Tailwind

Add additional Tailwind classes as needed:

```blade
<x-button 
    variant="primary" 
    size="md"
    class="w-full"
>
    Full Width Button
</x-button>
```

```blade
<x-button 
    variant="secondary" 
    size="sm"
    class="rounded-full"
>
    Rounded Button
</x-button>
```

## Complete Example

```blade
<div class="flex gap-4">
    <!-- Primary CTA -->
    <x-button variant="primary" size="md">
        <x-slot:icon>
            {{-- SVG for check icon --}}
        </x-slot:icon>
        Confirm
    </x-button>
    
    <!-- Secondary Action -->
    <x-button variant="secondary" size="md">
        <x-slot:icon>
            {{-- SVG for arrow icon --}}
        </x-slot:icon>
        Learn More
    </x-button>
    
    <!-- Small Accent -->
    <x-button variant="accent" size="sm">
        Pro
    </x-button>
    
    <!-- Disabled State -->
    <x-button variant="primary" disabled>
        Coming Soon
    </x-button>
</div>
```

## Accessibility

- Buttons are keyboard accessible (Tab/Shift+Tab navigation)
- Focus states show a visible ring indicator
- Disabled buttons have proper `disabled` attribute
- Icon-only buttons should have appropriate `aria-label` via parent component

## CSS Classes Reference

### Interactive Elements
- `.btn` - Base button class
- `.btn-primary` - Primary variant styling
- `.btn-secondary` - Secondary variant styling
- `.btn-accent` - Accent variant styling
- `.btn-sm` - Small size
- `.btn-md` - Medium size (default)
- `.btn-lg` - Large size
- `.btn-icon` - Icon container
- `.btn-icon-left` - Left-positioned icon spacing
- `.btn-icon-right` - Right-positioned icon spacing
- `.btn-text` - Button text wrapper
- `.btn-disabled` - Disabled state styling
