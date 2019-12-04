let mix = require('laravel-mix');

require('laravel-mix-tailwind');

/*
|--------------------------------------------------------------------------
| Mix Asset Management		
|-------------------------------------	-------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
*/

mix.minTemplate = require('laravel-mix-template-minifier');
// mix.js('resources/assets/js/scripts.js', 'public/js')
mix.js('resources/assets/js/app.js', 'public/js')
// .js('resources/assets/js/script.js','public/js')
.sass('resources/assets/sass/app.scss', 'public/css')
.tailwind()
.browserSync('localhost:8004');


if (mix.inProduction()) {
	mix.minTemplate('storage/framework/views/*.php', 'storage/framework/views/')
}