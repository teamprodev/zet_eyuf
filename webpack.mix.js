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

mix.js('render/vue/dev/js/app.js', 'render/vue/rendered/js/app.js').sourceMaps();
mix.copy('quasarapp/dist/spa/index.html', 'resources/views/app.blade.php').copyDirectory('quasarapp/dist/spa', 'public');
