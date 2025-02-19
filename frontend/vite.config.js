import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite'
import path from 'path';

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    tailwindcss(),
  ],
  resolve: {
    alias: {
        "@": path.resolve(__dirname, "src"), // @를 src/로 설정
    },
  },
  server: {
    host: '127.0.0.1',
    port: 5173,
  },
})
