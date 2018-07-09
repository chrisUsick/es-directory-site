let mix = require('laravel-mix');
let parseEnv = require('./parse-env');
let webpack = require('webpack');

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

mix.js('resources/assets/js/app.js', 'public/js').sourceMaps().version()
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.webpackConfig({
    plugins: [
        new webpack.DefinePlugin(parseEnv(path.resolve(__dirname, '.env')))
    ]
});