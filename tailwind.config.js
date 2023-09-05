/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  safelist: [
    'text-xs', 
    'font-medium', 
    'mr-2', 
    // 'px-3', 
    // 'py-1.5', 
    'rounded', 
    'border', 
    'whitespace-normal', 
    {
      pattern: /bg-(red|green|blue|yellow)-(100|400|800)/,
    },
    { pattern: /text-(red|green|blue|yellow)-(100|400|800)/ },
    { pattern: /border-(red|green|blue|yellow)-(100|400|800)/ },
    { pattern: /px-(2|2.5|3)/ },
    { pattern: /py-(1.5|2|2.5|3)/ },
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

