/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/preline/dist/*.js'
  ],
  theme: {
    extend: {
      backgroundColor: {
        glass : "#0F0F0F",
        darkGray : "#0E0E0E"
      },
      
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
}

