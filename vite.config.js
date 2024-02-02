import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.min.css',
                'resources/css/vendor.min.css',
                'resources/js/app.js',
                'resources/js/app.min.js',
                'resources/js/vendor.min.js',

                'resources/css/login/app.min.css',
                'resources/css/login/vendor.min.css',

                'resources/css/admin/app.min.css',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
