import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'
import viteImagemin from 'vite-plugin-imagemin'

export default defineConfig({
  plugins: [
    vue(),
    viteImagemin({
      gifsicle: { optimizationLevel: 3, interlaced: true },
      optipng:   { optimizationLevel: 7 },
      pngquant:  { quality: [0.65, 0.9], speed: 4 },
      mozjpeg:   { quality: 75 },
      webp:      { quality: 75 },
      svgo:      { plugins: [{ removeViewBox: false }] }
    })
  ],
  build: {
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'index.html'),
        admin: path.resolve(__dirname, 'admin/index.html') 
      }
    }
  },
  base: '/mission_card/',
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
    },
  },
  server: { // <--- server 객체 추가 또는 수정
    proxy: {
      '/api': {
        target: 'https://spread0608.com',
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, '/spread0608/api')
      }
    }
  },
  esbuild: {
    drop: ['console', 'debugger'], // console.log와 debugger 제거
  }

})
