/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {
      backgroundImage: {
        'background': "url('./src/assets/img/background.jpg')",
      }
    },
  },
  plugins: [require('tailwindcss-primeui')],
}

