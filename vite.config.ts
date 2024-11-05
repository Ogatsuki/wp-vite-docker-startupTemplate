import { defineConfig } from 'vite';
import tsconfigPaths from 'vite-tsconfig-paths'
import liveReload from 'vite-plugin-live-reload';
import terser from '@rollup/plugin-terser';

export default defineConfig({
  plugins: [
    tsconfigPaths(),
    liveReload(['./wp/src/*.php']),
  ],
  root: '.',
  base: './',

  build: {
    outDir: './wp/src/dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        main: './src/main.ts'
      },
      output: {
        entryFileNames: '[name].js',
        chunkFileNames: '[name].js',
        assetFileNames: '[name].[ext]'
      },
      plugins: [terser()]
    },
  },
  server: {
    host: true,
    cors: true,
    strictPort: true,
    port: 3000,
    hmr: {
      protocol: 'ws',
      host: 'localhost',
      port: 3000
    },
    watch: {
      usePolling: true,
    }
  },
  preview: {
    host: true,
    port: 3000
  }
});