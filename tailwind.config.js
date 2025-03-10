import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                'inter': 'Inter Regular',
                'inter-medium': 'Inter Medium',
                'inter-semi-bold': 'Inter Semi Bold',
                'inter-bold': 'Inter Bold',
                'inter-extra-bold': 'Inter Extra Bold',
                'arial': 'Arial Regular',
                'arial-bold': 'Arial Bold',
            },
            colors: {
                'primary': {
                    DEFAULT: '#0C0F10', // use
                    120: '#F6F7F9', // use
                    200: '#F4F6FC', // use
                    250: '#EDF1FA', // use in input border
                    600: '#9CA7C3', // use in input placeholder
                    650: '#848DA4', // use
                },
                'secondary': {
                    DEFAULT: '#FFA500', // use
                },
                'danger': {
                    100: '#FFEBED',
                    200: '#FB3748', // use
                    DEFAULT: '#E93544',
                    600: '#E31D1C', // use
                },
                'warning': {
                    DEFAULT: '#FFBD4C',
                    '100': '#FFF3ED',
                    '200': '#FFF8EE',
                    '600': '#FFBB54',
                    '700': '#FF8447',
                },
                'success': {
                    DEFAULT: '#1FC16B', // use
                    50: '#E9F9F3',
                    100: '#E9F9F1',
                    150: '#CFFCD4',
                    200: '#52BD94',
                    300: '#25C78B', // use
                },
                'earth': {
                    DEFAULT: '#FBF9F9',
                },
                'black': {
                    DEFAULT: '#000000',
                    400: '#0D0D12', // use
                },

                'gray': '#96A0B5', // use
            },
        },
    },
    plugins: [],
    layers: ['base', 'components', 'utilities'],
};