const defaultTheme = require('tailwindcss/defaultTheme')


/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily:{
        sans: ['inter var', ...defaultTheme.fontFamily.sans], 
      }
    },
  },
  plugins: [
    require("@tailwindcss/forms")({
      strategy: 'class', // only generate classes
    }), 
  ],
}