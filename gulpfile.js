var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;
elixir.config.production = false;

elixir(function(mix) {

	mix.sass(['app.scss'], 'resources/public/css/app.css')
		.scripts(
		[
			'../../../node_modules/jquery/dist/jquery.min.js',
			'../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
			'main.js'
		], 'resources/public/js/app.js')
		.copy('node_modules/font-awesome/fonts', 'resources/public/fonts')
		.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'resources/public/fonts/bootstrap');

});