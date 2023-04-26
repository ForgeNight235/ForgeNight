// vite.config.js

const VitePluginLaravel = require('laravel-vite-plugin').default;

module.exports = {
    plugins: [
        VitePluginLaravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
};
