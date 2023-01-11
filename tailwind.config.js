/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/filament/**/*.blade.php'
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#d9bd97',
          100: '#d9bd97',
          200: '#d9bd97',
          300: '#d9bd97',
          400: '#d9bd97',
          500: '#d9bd97',
          600: '#d9bd97',
          700: '#d9bd97',
          800: '#d9bd97',
          900: '#d9bd97'
        }
      }
    }
  },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]
};
