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
		'resources/assets/js/milton.js',
		'resources/assets/js/bootstrap-datepicker.min.js',
		'resources/assets/js/bootstrap-datepicker.pt-BR.min.js',
	], 'public/js/app.js')
	.js([
		'resources/assets/js/holder.min.js',
	], 'public/js/dashboard.js')
   	.sass('resources/assets/sass/app.scss', 'public/css')
      .combine([
         'node_modules/sb-admin-2/vendor/bootstrap/css/bootstrap.min.css',
         'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.min.css',
         'node_modules/sb-admin-2/dist/css/sb-admin-2.css',
         'node_modules/sb-admin-2/vendor/morrisjs/morris.css',
         'node_modules/sb-admin-2/vendor/font-awesome/css/font-awesome.min.css',
         'resources/assets/css/dashboard.css',
         'resources/assets/css/milton.css',
         'resources/assets/css/bootstrap-datepicker.css',
      ], 'public/css/dashboard.css')
   	.combine([
   		'node_modules/sb-admin-2/vendor/bootstrap/css/bootstrap.min.css',
   		'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.min.css',
   		'node_modules/sb-admin-2/dist/css/sb-admin-2.css',
   		'node_modules/sb-admin-2/vendor/font-awesome/css/font-awesome.min.css',
   		'resources/assets/css/milton.css',
   	], 'public/css/base.css')
   	.copy([
   		'resources/assets/fonts/',
   		'node_modules/sb-admin-2/vendor/font-awesome/fonts/',
   	], 'public/fonts/')
   	.copy('resources/assets/images/', 'public/images/')
   	.copy([
		'node_modules/sb-admin-2/vendor/jquery/jquery.min.js',
		'node_modules/sb-admin-2/vendor/bootstrap/js/bootstrap.min.js',
		'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.min.js',
		'node_modules/sb-admin-2/vendor/raphael/raphael.min.js',
		'node_modules/sb-admin-2/vendor/morrisjs/morris.min.js',
		'node_modules/sb-admin-2/data/morris-data.js',
		'node_modules/sb-admin-2/dist/js/sb-admin-2.js',
	], 'public/js/')
   	.version();
