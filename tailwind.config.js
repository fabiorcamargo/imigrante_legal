import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/* @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/tailwindcss-animated/**/*.js",
        // "./app/Forms/*.php",
        // "./app/Tables/*.php",
    ],
    daisyui: {
        themes: ["light", "winter"],
      },

    theme: {
        extend: {},
    },

    plugins: [require('flowbite/plugin'), forms, typography, require('tailwindcss-animated'), require('@tailwindcss/aspect-ratio'), require("@tailwindcss/typography"), require("daisyui"),]
};
