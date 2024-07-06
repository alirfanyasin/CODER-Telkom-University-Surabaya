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
      },
      
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
}

