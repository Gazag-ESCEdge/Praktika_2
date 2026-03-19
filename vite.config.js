import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        vue(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    // Обработка шрифтов
    assetsInclude: ['**/*.ttf', '**/*.woff', '**/*.woff2'],
    build: {
        rollupOptions: {
            output: {
                // Обеспечиваем правильное размещение шрифтов
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name.endsWith('.ttf')) {
                        return 'assets/fonts/[name][extname]';
                    }
                    return 'assets/[name][extname]';
                },
            },
        },
    },
});
