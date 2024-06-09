import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                'off-white': '#FAF9F6',
                'midnight-blue': '#101720',
                'green': '#B5F9BB',
                'blue': '#B5F5F9',
                'beige': '#FFEED6',
                'purple': '#9747FF',
                'red': '#E95D5D',
                'grey': '#C1C9D2',
            },
            fontWeight: {
                light: '400',
                normal: '460',
            },
            fontFamily: {
                sans: ['PPAvenir', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
