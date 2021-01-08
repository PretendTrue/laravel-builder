const mix = require('laravel-mix');

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

mix.setPublicPath('public');

mix.js('resources/src/app.js', 'public/js').vue({version: 3});
mix.sass('resources/src/styles/app.scss', 'public/css');

mix.options({
  processCssUrls: false,
  postCss: [ require("tailwindcss") ],
})

mix.copy('public', '../../../public/vendor/builder');

mix.browserSync(process.env.MIX_APP_URL);
