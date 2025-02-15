import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwind from 'vite-plugin-tailwind';
import fs from 'fs';
import path from 'path';

export default defineConfig({
    server: {
        host: 'amarresdominiosyhechizos.com',
        port: 5174, // Cambiar el puerto si es necesario
        https: {
            key: fs.readFileSync(path.resolve(__dirname, '/etc/letsencrypt/live/amarresdominiosyhechizos.com/privkey.pem')),  // Ruta a tu clave privada
            cert: fs.readFileSync(path.resolve(__dirname, '/etc/letsencrypt/live/amarresdominiosyhechizos.com/fullchain.pem')) // Ruta a tu certificado
        },  
        cors: {
            origin: 'https://amarresdominiosyhechizos.com',  // Permitir solicitudes desde el mismo dominio
            methods: ['GET', 'POST', 'PUT', 'DELETE'],  // Métodos HTTP permitidos
            allowedHeaders: ['Content-Type', 'Authorization'],  // Cabeceras permitidas
        }  
    },    
    plugins: [
        tailwind(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
