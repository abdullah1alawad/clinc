import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/studentProfile.js',
                'resources/js/studentProfileEdit.js',
                'resources/js/doctorProfile.js',
                'resources/js/set-sub-marks.js',
                'resources/js/doctorProfileEdit.js',
                'resources/js/assistantProfile.js',
                'resources/js/assistantProfileEdit.js',
                'resources/js/search.js',
                'resources/js/patientInfo.js',
                'resources/js/adminProfile.js',
                'resources/js/adminProfileEdit.js',
                'resources/js/showProfile.js',
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
