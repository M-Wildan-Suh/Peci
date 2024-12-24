import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'liburanaja-1' : '#0D8FFF',
                'liburanaja-2' : '#F8AD1A',
                'liburanaja-3' : '#023e8b',
                'background' : '#FAF7F0',
                'main' : '#D8D2C2',
                'second' : '#B17457',
                'third' : '#4A4947',
            }
        },
    },

    plugins: [forms],
};
