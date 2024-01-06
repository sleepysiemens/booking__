import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.min.css', 'resources/css/vendor.min.css', 'resources/js/app.min.js', 'resources/js/vendor.min.js'],
            refresh: true,
        }),
    ],
});
