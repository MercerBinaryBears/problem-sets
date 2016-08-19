var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix
      .copy('resources/assets/js/autowire-chosen.js', 'public/build/js/autowire-chosen.js')
      .copy('resources/assets/js/search-form.js', 'public/build/js/search-form.js')
      .copy('resources/assets/js/admin-toggle-button.js', 'public/build/js/admin-toggle-button.js')
      .less('app.less')
      .version('css/app.css');
});
