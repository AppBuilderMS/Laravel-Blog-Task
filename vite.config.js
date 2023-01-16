import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import legacy from '@vitejs/plugin-legacy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        legacy({
            polyfills: ['es.promise.finally', 'es/map', 'es/set'],
            modernPolyfills: ['es.promise.finally']
        })
    ],

    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
