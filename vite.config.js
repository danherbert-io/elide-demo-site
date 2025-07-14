import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        watch: {
            ignored: ['**/vendor/danherbert-io/**']
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
