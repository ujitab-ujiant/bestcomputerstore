import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'resources/css/about.css',
                'resources/css/contact.css',
                'resources/css/dashboard.css',
                'resources/css/help.css',
                'resources/css/home.css',
                'resources/css/lapcom.css',
                'resources/css/login.css',
                'resources/css/pcperipheral.css',
                'resources/css/service-status-result.css',
                'resources/css/servicestatus.css',
                'resources/css/servmaintenance.css',
                'resources/css/layouts/app.css',

                'resources/js/dashboard.js',
                'resources/js/help.js',
                'resources/js/home.js',
                'resources/js/lapcom.js',
                'resources/js/pcperipheral.js',
                'resources/js/servicestatus.js',
                'resources/js/servmaintenance.js',
                'resources/js/layouts/app.js',
            ],
            refresh: true,
        }),
    ],
});
