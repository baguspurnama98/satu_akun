const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  theme: {
    screens: {
      xs: { max: '639px' },
      ...defaultTheme.screens,
    },
  },
  variants: {
    extend: {
        opacity: ['disabled'],
    }
  },
  plugins: [],
  content: [
    'node_modules/tv-*/dist/tv-*.umd.min.js',
  ],
}
