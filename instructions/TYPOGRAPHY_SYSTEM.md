# Typography System Design Guidelines

## Overview
The typography system is one of the most foundational elements of any interface design. If your users are unable to read the content being displayed, you can say goodbye to them immediately. That's why even a rudimentary understanding of typography means you can determine for yourself the best fonts for success in design.

## Typography Hierarchy

### Purpose
Your visual color defines the interface's feel and elicits emotion; used consistently across interactive elements to create cohesive brand experiences.

## Font Categories

### 1. Heading Fonts
**Purpose:** Establish visual hierarchy and command attention

**Usage:** Page titles, section headers, and major content divisions

**Characteristics:**
- Bold, distinctive, and impactful
- Typically heavier weights (Bold, Semi-Bold, Black)
- Larger sizes to create clear visual hierarchy
- Used sparingly to maintain effectiveness

### 2. Body Fonts
**Purpose:** Deliver primary content with optimal readability

**Usage:** Paragraphs, form fields, descriptions, backgrounds, and dividers

**Characteristics:**
- Highly legible at various sizes
- Regular and Medium weights for sustained reading
- Optimized for long-form content
- These are the values you will be able to use throughout the project

## Font Families

### Primary Font Options

#### Font 1: **Lato**
**Style:** Sans-serif, modern, and clean

**Character Set:** `AaBbCc`

**Use Cases:**
- Modern interfaces
- High readability across digital platforms
- Professional and approachable tone
- Numbers: `1234567890`

**Best For:** Body text, UI elements, data-heavy interfaces

---

#### Font 2: **Montserrat**
**Style:** Geometric sans-serif, contemporary

**Character Set:** `AaBbCc`

**Use Cases:**
- Headings and display text
- Strong brand presence
- Urban, modern aesthetic
- Numbers: `0123456789`

**Best For:** Headlines, hero text, marketing content

---

## Typography Scale & Hierarchy

### DISPLAY Styles (Largest Impact)

#### DISPLAY-1
- **Font Family:** Montserrat Bold
- **Font Size:** 70px
- **Line Height:** 60px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Hero sections, landing page titles

#### DISPLAY-2
- **Font Family:** Work Sans Bold
- **Font Size:** 26px
- **Line Height:** 42px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Large feature headings

#### DISPLAY-3
- **Font Family:** Work Sans Bold
- **Font Size:** 26px
- **Line Height:** 30px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Prominent section titles

---

### HEADING Styles (Structural Hierarchy)

#### HEADING(H)-1
- **Font Family:** Montserrat Bold
- **Font Size:** 30px
- **Line Height:** 40px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Primary page headings

#### HEADING(H)-2
- **Font Family:** Work Sans Bold
- **Font Size:** 26px
- **Line Height:** 42px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Major section headings

#### HEADING(H)-3
- **Font Family:** Work Sans Bold
- **Font Size:** 26px
- **Line Height:** 30px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Subsection headings

#### HEADING(H)-4
- **Font Family:** Work Sans Bold
- **Font Size:** 24px
- **Line Height:** 30px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Minor headings, card titles

---

### SUBHEADING Styles (Supporting Text)

#### SUBHEADING(SH)-1
- **Font Family:** Work Sans Bold
- **Font Size:** 23px
- **Line Height:** 30px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Section introductions, lead text

#### SUBHEADING(SH)-2
- **Font Family:** Work Sans Bold
- **Font Size:** 20px
- **Line Height:** 30px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Supporting headlines, emphasized content

#### SUBHEADING(SH)-3
- **Font Family:** Work Sans Bold
- **Font Size:** 18px
- **Line Height:** 27px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Tertiary headings, category labels

---

### BODY Styles (Content Text)

#### BODY-1
- **Font Family:** Work Sans Regular
- **Font Size:** 18px
- **Line Height:** 24px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Primary body text, main content

#### BODY-2
- **Font Family:** Work Sans Regular
- **Font Size:** 16px
- **Line Height:** 23px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Secondary content, descriptions

#### BODY-3
- **Font Family:** Work Sans Regular
- **Font Size:** 15px
- **Line Height:** 18px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Compact text, sidebar content

#### BODY-4
- **Font Family:** Work Sans Regular
- **Font Size:** 14px
- **Line Height:** 18px
- **Letter Spacing:** 0px
- **Sample:** `AaBbCc`
- **Use Case:** Small text, captions, metadata

---

## Typography Naming Convention

```
{category}-{level}
Examples: DISPLAY-1, HEADING-2, BODY-3, SUBHEADING-1
```

## Implementation Guidelines

### Line Height (Leading)
- **Display text:** Tighter line height (0.85-1.0 ratio) for visual impact
- **Headings:** Moderate line height (1.2-1.4 ratio) for clarity
- **Body text:** Comfortable line height (1.5-1.7 ratio) for readability
- **Small text:** Slightly increased line height (1.6-1.8 ratio) for legibility

### Letter Spacing (Tracking)
- **Display & Headings:** Typically 0px or slight negative for cohesion
- **Body text:** 0px for optimal readability
- **Small text:** Small positive values (0.5-1px) to improve legibility
- **All caps:** Increase by 5-10% for better readability

### Font Weight Guidelines
- **Display:** Bold (700) or Black (900)
- **Headings:** Bold (700) or Semi-Bold (600)
- **Body:** Regular (400) or Medium (500)
- **Emphasis:** Use Medium (500) or Semi-Bold (600) within body text

## Accessibility Requirements

### Contrast Ratios
- **Normal text (< 18pt):** Minimum 4.5:1 contrast ratio
- **Large text (≥ 18pt):** Minimum 3:1 contrast ratio
- **Bold text (≥ 14pt bold):** Minimum 3:1 contrast ratio

### Readability Best Practices
- Minimum body text size: 16px for comfortable reading
- Maximum line length: 60-75 characters for optimal readability
- Use sufficient spacing between lines and paragraphs
- Avoid pure black (#000000) on pure white; use near-black (#1a1a1a) for reduced eye strain

## Responsive Typography

### Scale Adjustments
- **Mobile (< 768px):** Reduce display and heading sizes by 20-30%
- **Tablet (768px-1024px):** Reduce sizes by 10-15%
- **Desktop (> 1024px):** Use base scale values

### Breakpoint Strategy
```
Mobile:    DISPLAY-1 → 50px, HEADING-1 → 24px, BODY-1 → 16px
Tablet:    DISPLAY-1 → 60px, HEADING-1 → 28px, BODY-1 → 17px
Desktop:   DISPLAY-1 → 70px, HEADING-1 → 30px, BODY-1 → 18px
```

## Best Practices

### Do's
- ✓ Maintain consistent hierarchy throughout the interface
- ✓ Limit font families to 2-3 maximum per project
- ✓ Use system fonts when performance is critical
- ✓ Test typography across different devices and browsers
- ✓ Ensure sufficient color contrast for all text
- ✓ Use appropriate font weights for emphasis

### Don'ts
- ✗ Don't use more than 3 different fonts
- ✗ Don't ignore line height and letter spacing
- ✗ Don't use decorative fonts for body text
- ✗ Don't sacrifice readability for style
- ✗ Don't use font sizes smaller than 14px for body text
- ✗ Don't forget to optimize font loading performance

## Testing Checklist

- [ ] Verify all text meets WCAG AA contrast requirements
- [ ] Test readability at minimum supported screen size
- [ ] Confirm font files load correctly across browsers
- [ ] Validate hierarchy creates clear visual flow
- [ ] Check line length doesn't exceed 75 characters
- [ ] Test with actual content, not just Lorem Ipsum
- [ ] Verify font licensing for commercial use
- [ ] Ensure fallback fonts are appropriate
- [ ] Test with browser zoom at 200%
- [ ] Validate performance impact of font loading