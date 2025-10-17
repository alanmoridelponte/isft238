import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/mqtt/helpers.js', 'resources/js/mqtt/gauge-controller.js', 'resources/js/mqtt/toggle-controller.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
