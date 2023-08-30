/** @type {import('tailwindcss').Config} */

import defaultTheme from 'tailwindcss/defaultTheme';

export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Mada', ...defaultTheme.fontFamily.sans],
        },
        colors: {
            custom: {
                'deep-purple': '#55337F',
                'goldenrod': '#EBB81F',
                'green-mint': '#00CF80',
                'sky-blue': '#60C7E4',
            },
        },
    },

  },
}

