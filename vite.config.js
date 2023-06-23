// vite.config.js

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/sliders.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'dist' // этот параметр определяет название папки для вывода собранных файлов
    }
})
