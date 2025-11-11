/** @type {import('tailwindcss').Config} */

export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.jsx',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        // Primary Colors Scale
        primary: {
          100: '#add8ff',
          200: '#1f93ff',
          300: '#0066ac',
          400: '#004a8f',
          500: '#002d56',
          10: '#3041e1', // Transparency overlay
        },
        // Secondary Colors Scale (Accent)
        secondary: {
          100: '#fbccf6',
          200: '#f298e6',
          300: '#a60e52',
          400: '#840811',
          500: '##250325',
          10: '#ae6552', // Transparency overlay
        },
        // Neutral Colors - Extended Scale
        neutral: {
          100: '#ffffff',
          200: '#f5f5f5',
          300: '#d2d2d2',
          400: '#b8b8b8',
          500: '#949494',
          600: '#6b6b6c',
          700: '#777777',
          800: '#606060',
          900: '#34343a',
          950: '#1a1a1a', // For text on white backgrounds
          1000: '#111111',
          10: '#233333', // Transparency overlay
        },
        // Feedback Colors
        success: '#2ea44f', // Green for positive actions
        warning: '#fdb81e', // Yellow/Orange for caution
        error: '#da3633',   // Red for failures
        info: '#0969da',    // Blue for information
      },
      fontFamily: {
        // Font families
        sans: ['Work Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        display: ['Manrope', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        heading: ['Montserrat', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      fontSize: {
        // Display Styles (Largest Impact)
        'display-1': ['80px', { lineHeight: '125%', letterSpacing: '0px', fontWeight: '600' }],
        'display-2': ['64px', { lineHeight: '125%', letterSpacing: '0px', fontWeight: '600' }],
        'display-3': ['56px', { lineHeight: '125%', letterSpacing: '0px', fontWeight: '600' }],

        // Heading Styles (Structural Hierarchy)
        'heading-1': ['30px', { lineHeight: '125%', letterSpacing: '0px', fontWeight: '600' }],
        'heading-2': ['28px', { lineHeight: '125%', letterSpacing: '0px', fontWeight: '600' }],
        'heading-3': ['26px', { lineHeight: '125%', letterSpacing: '0px', fontWeight: '600' }],
        'heading-4': ['24px', { lineHeight: '125%', letterSpacing: '0px', fontWeight: '600' }],

        // Subheading Styles (Supporting Text)
        'subheading-1': ['22px', { lineHeight: '125%', letterSpacing: '1px', fontWeight: '400' }],
        'subheading-2': ['20px', { lineHeight: '125%', letterSpacing: '1px', fontWeight: '400' }],
        'subheading-3': ['18px', { lineHeight: '125%', letterSpacing: '1px', fontWeight: '400' }],

        // Body Styles (Content Text)
        'body-1': ['16px', { lineHeight: '125%', letterSpacing: '1px', fontWeight: '400' }],
        'body-2': ['14px', { lineHeight: '125%', letterSpacing: '1px', fontWeight: '400' }],
        'body-3': ['12px', { lineHeight: '125%', letterSpacing: '1px', fontWeight: '400' }],
        'body-4': ['10px', { lineHeight: '125%', letterSpacing: '1px', fontWeight: '400' }],
      },
      spacing: {
        // Add consistent spacing scale if needed
        gutter: '1rem',
        'gutter-lg': '2rem',
        'gutter-xl': '3rem',
      },
      borderRadius: {
        sm: '4px',
        md: '8px',
        lg: '12px',
        xl: '16px',
        '2xl': '24px',
      },
      boxShadow: {
        sm: '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
        md: '0 4px 6px -1px rgba(0, 0, 0, 0.1)',
        lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1)',
        xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1)',
      },
    },
  },
  plugins: [],
}
