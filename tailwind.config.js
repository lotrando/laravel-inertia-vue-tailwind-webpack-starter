/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        inter: ['Inter', 'sans-serif'],  // font-inter
        matemasie: ['Matemasie', 'sans-serif'],  // font-matemasie
      },
    },
  },
  plugins: [],
}

