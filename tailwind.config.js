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
        },
    },

    plugins: [forms],
    safelist: [
        'bg-gradient-to-r',
        'from-blue-500', 'to-blue-600',
        'from-green-500', 'to-green-600',
        'from-yellow-400', 'to-yellow-500',
        'from-purple-500', 'to-purple-600',
        'text-white'
    ],
    
};
