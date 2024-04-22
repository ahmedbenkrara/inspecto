const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                varelarounded: ['Varela Round', ...defaultTheme.fontFamily.sans],
                poppins: ['poppins', ...defaultTheme.fontFamily.sans],
                mplus: ['M PLUS Rounded 1c', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                xs: '0px',
                sm: '320px',
                md: '760px',
                lg: '1072px',
                xl: '1280px',
                '2xl': '1536px',
            }
        },
    },

    plugins: [],
};
