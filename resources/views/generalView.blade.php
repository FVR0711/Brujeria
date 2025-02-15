<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descubre los amarres de amor efectivos y rituales de brujería para recuperar a tu ser querido. Conoce nuestros servicios especializados y transforma tu vida amorosa con resultados garantizados. ¡Recupera el amor que mereces hoy mismo!">

    <title>Amarres de amor | EFECTIVOS amarres de amor | Recupera tu Amor</title>


    <link href="/storage/favicon-amarres-de-amor.ico" rel="icon" type="image/x-icon" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body >
    {{-- Se invoca el componente y se le pasa el contenido de la página (body) --}}
    @livewire('boton-whatsapp', ['body' => $body])

    @livewireScripts
</body>
</html>
