// vite.config.js

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/css/app.css', 'public/js/sliders.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'dist' // этот параметр определяет название папки для вывода собранных файлов
    }
})
