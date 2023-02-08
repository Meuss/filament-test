/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/filament/**/*.blade.php'
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Montserrat', ...defaultTheme.fontFamily.sans]
      },
      colors: {
        danger: colors.rose,
        // primary: colors.red,
        success: colors.green,
        warning: colors.fuchsia,
        primary: {
          DEFAULT: '#D9BD97',
          50: '#FFFFFF',
          100: '#FFFFFF',
          200: '#FAF6F1',
          300: '#EFE3D3',
          400: '#E4D0B5',
          500: '#D9BD97',
          600: '#CAA36E',
          700: '#BB8945',
          800: '#926B35',
          900: '#694D26'
        }
      }
    }
  },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]
};
