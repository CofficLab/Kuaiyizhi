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
import expressiveCode from 'astro-expressive-code';
import { pluginColorChips } from 'expressive-code-color-chips';

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
    expressiveCode({
      plugins: [pluginColorChips()],
      shiki: {
        langAlias: {
          caddyfile: 'nginx',
          env: 'ini',
          conf: 'nginx',
        },
      },
    }),
    markdoc(),
    mdx(),
  ],

  adapter: cloudflare({
    imageService: 'cloudflare',
  }),
});
