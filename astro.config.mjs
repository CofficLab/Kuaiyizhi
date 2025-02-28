// @ts-check
import { defineConfig } from 'astro/config';
import node from '@astrojs/node';
import path from 'path';
import pagefind from 'astro-pagefind';
import tailwindcss from '@tailwindcss/vite';
import vue from '@astrojs/vue';

// https://astro.build/config
export default defineConfig({
  output: 'server',
  site: 'https://www.kuaiyizhi.cn',

  prefetch: {
    prefetchAll: true,
  },

  vite: {
    server: {
      hmr: {
        overlay: false,
      },
    },

    resolve: {
      alias: {
        '@': path.resolve('./src'),
        '@components': path.resolve('./src/components'),
        '@utils': path.resolve('./src/utils'),
        '@paths': path.resolve('./src/paths'),
        '@database': path.resolve('./src/database'),
        '@models': path.resolve('./src/models'),
        '@layouts': path.resolve('./src/layouts'),
        '@interface': path.resolve('./src/interface'),
        '@assets': path.resolve('./src/assets'),
      },
    },

    // @ts-ignore
    plugins: [tailwindcss()],
  },

  integrations: [pagefind(), vue()],

  adapter: node({
    mode: 'standalone',
  }),
});
