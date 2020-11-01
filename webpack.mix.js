const mix = require('laravel-mix');
require('laravel-mix-tailwind');
require('laravel-mix-purgecss');
const tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//    .postCss('resources/css/app.css', 'public/css')
//    .tailwind('./tailwind.config.js');

if (mix.inProduction()) {
  mix
   .version();
}

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copyDirectory('resources/images', 'public/images')
    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('./tailwind.config.js')
        ],
    })
    .purgeCss({
        enabled: mix.inProduction(),
        extensions: ['html', 'js', 'php', 'vue', 'scss'],
        whitelist: [
            'flex',
            'flex-col',
            'md:flex-row',
            'items-center',
            'justify-center',
            'js-cookie-consent-agree',
            'js-cookie-consent',
            'code',
            'ql-syntax',
            'tech-icon',
            'main',
            'div',
            'article',
            'pre'
        ],
    });

