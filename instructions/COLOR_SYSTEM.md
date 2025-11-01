# Color System Design Guidelines

## Overview
A color palette is a carefully curated set of colors that work harmoniously together to establish and reinforce a brand identity or design concept.

## Color Categories

### 1. Primary Colors
**Purpose:** Define the interface's visual identity and emotional tone

**Usage:** Apply consistently across all interactive elements to create a cohesive brand experience

**Scale Structure:**
- **100** - Lightest shade (e.g., `#add8ff`)
- **200** - Light (e.g., `#1f93ff`)
- **300** - Medium-light (e.g., `#0066ac`)
- **400** - Medium (e.g., `#004a8f`)
- **500** - Base/darkest (e.g., `#002d56`)
- **10** - Transparency overlay (e.g., `#3041e1`)

**Implementation:**
```
Primary scale: 100 → 200 → 300 → 400 → 500 → 10
Range: Lightest to darkest with optional transparency variant
```

### 2. Secondary Colors (Accent Colors)
**Purpose:** Complement the primary palette while grabbing attention and reinforcing brand identity

**Usage:** Apply to supporting components such as labels, badges, highlights, and secondary actions

**Scale Structure:**
- **100** - Lightest shade (e.g., `#fbccf6`)
- **200** - Light (e.g., `#f298e6`)
- **300** - Medium (e.g., `#a60e52`)
- **400** - Medium-dark (e.g., `#840811`)
- **500** - Darkest (e.g., `#39050c`)
- **10** - Transparency overlay (e.g., `#ae6552`)

**Best Practices:**
- Use sparingly to maintain visual hierarchy
- Ensure sufficient contrast with primary colors
- Reserve for elements requiring visual emphasis

### 3. Neutral Colors
**Purpose:** Provide foundational tones for UI structure and content

**Usage:** Apply to text, form fields, backgrounds, borders, and dividers to create visual organization without competing with brand colors

**Extended Scale Structure:**
- **100** - Lightest (e.g., `#ffffff`)
- **200** - Very light (e.g., `#f5f5f5`)
- **300** - Light (e.g., `#d2d2d2`)
- **400** - Medium-light (e.g., `#b8b8b8`)
- **500** - Medium (e.g., `#949494`)
- **600** - Medium-dark (e.g., `#6b6b6c`)
- **700** - Dark (e.g., `#777777`)
- **800** - Very dark (e.g., `#606060`)
- **900** - Darkest (e.g., `#34343a`)
- **1000** - True black (e.g., `#111111`)
- **10** - Transparency overlay (e.g., `#233333`)

**Guidelines:**
- Maintain clear contrast ratios for accessibility
- Use lighter shades for backgrounds and surfaces
- Use darker shades for text and critical UI elements

### 4. Feedback Colors
**Purpose:** Communicate semantic states and provide visual feedback

**Usage:** Highlight interface states including success, warning, error, and informational messages

**Typical Categories:**
- **Success** - Positive actions and confirmations (green tones)
- **Warning** - Caution and attention required (yellow/orange tones)
- **Error** - Failures and critical issues (red tones)
- **Info** - Neutral information and tips (blue tones)

**Application Rules:**
- Use consistently across all feedback scenarios
- Ensure WCAG AA compliance (4.5:1 contrast ratio minimum)
- Pair with icons and text for accessibility
- Avoid relying solely on color to convey meaning

## Implementation Guidelines

### Color Naming Convention
```
{category}-{scale}
Examples: primary-300, neutral-600, secondary-200
```

### Accessibility Requirements
- Text on colored backgrounds: minimum 4.5:1 contrast ratio
- Large text (18pt+): minimum 3:1 contrast ratio
- Interactive elements: clearly distinguishable from surrounding content

### Best Practices
1. **Consistency** - Apply colors systematically across all touchpoints
2. **Hierarchy** - Use color to guide user attention and establish visual priority
3. **Balance** - Distribute colors proportionally (60% primary/neutral, 30% secondary, 10% accent)
4. **Accessibility** - Always test color combinations for sufficient contrast
5. **Scalability** - Ensure the palette works across different contexts and screen sizes

### Testing Checklist
- [ ] Verify contrast ratios meet WCAG standards
- [ ] Test colorblind accessibility
- [ ] Review color appearance in light and dark modes
- [ ] Validate brand consistency across platforms
- [ ] Confirm readability at various sizes