const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('public')
  .js('resources/js/app.js', 'public')
  .sass('resources/sass/app.scss', 'public')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind.js') ],
  })
  .version()
  .copy('public', '../../../public/vendor/builder');
