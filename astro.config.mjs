import { defineConfig } from 'astro/config';
import path from 'path';
import pagefind from 'astro-pagefind';
import tailwindcss from '@tailwindcss/vite';
import vue from '@astrojs/vue';
import markdoc from '@astrojs/markdoc';
import mdx from '@astrojs/mdx';
import cloudflare from '@astrojs/cloudflare';
import sitemap from '@astrojs/sitemap';
import robotsTxt from 'astro-robots-txt';

// https://astro.build/config
export default defineConfig({
  site: 'https://kuaiyizhi.cn',

  i18n: {
    locales: ['zh-cn', 'en'],
    defaultLocale: 'zh-cn',
    routing: {
      prefixDefaultLocale: true,
    },
  },

  prefetch: {
    prefetchAll: false,
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
      },
    },

    plugins: [tailwindcss()],
  },

  integrations: [
    pagefind(),
    vue(),
    markdoc(),
    mdx(),
    sitemap({
      filter: (page) => page !== 'https://kuaiyizhi.cn/auth/login',
    }),
    robotsTxt({
      policy: [
        {
          userAgent: '*',
          allow: '/',
          disallow: ['/auth/login'],
        },
      ],
    }),
  ],

  adapter: cloudflare(),
});
