const mix = require('laravel-mix');

// Compilación de archivos CSS y JS
mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ]);

// Habilitar la versión de los archivos para producción
if (mix.inProduction()) {
    mix.version();
}
