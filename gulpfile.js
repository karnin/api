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
    mix.scripts([
        "jquery-2.1.1.js",
        "bootstrap.min.js",
        "jquery.metisMenu.js",
        "jquery.slimscroll.min.js",
        "pace.min.js",
        "inspinia.js",
        "jquery-ui-1.10.4.min.js",
        "vue.js",
        "vue-resource.min.js"
    ])
    mix.styles([
        "bootstrap.min.css",

        "animate.css",
        "style.css",
    ])




});