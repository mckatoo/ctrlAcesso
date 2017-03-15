const { mix } = require('laravel-mix');

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

mix
	.js([
		'resources/assets/js/app.js',
		'resources/assets/js/milton.js',
		'node_modules/jquery/dist/jquery.min.js',
		'resources/assets/js/jquery-ui.js',
	], 'public/js')
	.js([
		'resources/assets/js/holder.min.js',
	], 'public/js/dashboard.js')
   	.sass('resources/assets/sass/app.scss', 'public/css')
   	.combine([
   		'resources/assets/css/dashboard.css',
   		'resources/assets/css/milton.css',
   	], 'public/css/dashboard.css')
   	.version();
