const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .vue();


// require('laravel-mirvx-polyfill');

// mix.js('resources/js/app.js', 'public/js/app.js')
// mix.sass('resources/sass/app.scss', 'public/css');
// mix.polyfill({
//     enabled: true,
//     useBuiltIns: "usage",
//     targets: {"firefox": "50", "ie": "11"}
// })s
