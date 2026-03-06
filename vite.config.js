import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0', // Listen on all interfaces
        port: 5173,
        strictPort: true,
        cors: true, // Enable CORS explicitly
        origin: '*',
    },
    build: {
        outDir: 'dist',
        rollupOptions: {
            input: {
                main: 'src/main.js',
                style: 'src/style.css'
            },
            output: {
                entryFileNames: 'assets/[name].js',
                assetFileNames: 'assets/[name].[ext]'
            }
        }
    }
})
