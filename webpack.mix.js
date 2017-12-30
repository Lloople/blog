let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

mix
    .js('resources/assets/frontend/js/main.js', 'public/js/frontend.js')
    .sass('resources/assets/frontend/css/main.scss', 'public/css/frontend.css')

    .js('resources/assets/backend/js/main.js', 'public/js/backend.js')
    .sass('resources/assets/backend/css/main.scss', 'public/css/backend.css')

    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('tailwind.js'),
        ]
    })

    .version()

    .extract(['lodash', 'axios', 'vue', 'babel-regenerator-runtime', 'simplemde']);


