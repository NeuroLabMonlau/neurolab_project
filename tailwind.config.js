import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                customGreen: '#3EC785',
                customGreen1: '#c2fff4',
                customGreen2: '#7bffe9',
                customGreen3: '#d2ff9b',
                customGreen4: '#8cffc1',
                customGreen5: '#e2ffd7',
            },
            spacing: {
                '18': '4.6rem'
            }
        },
    },

    plugins: [forms, typography],
};
