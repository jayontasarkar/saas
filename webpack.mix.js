const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
	'node_modules/jquery/dist/jquery.min.js'
], 'public/js/vendor.js');

mix.styles([
	'node_modules/vue-multiselect/dist/vue-multiselect.min.css'
], 'public/css/multiselect.css');
