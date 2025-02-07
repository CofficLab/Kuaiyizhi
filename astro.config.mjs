// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';
import vue from '@astrojs/vue';
import tailwind from '@astrojs/tailwind';
import smartSearchPlugin from './plugins/smart-search/index.ts';
import smartHeaderPlugin from './plugins/smart-header/index.ts';
import smartPagePlugin from './plugins/smart-page/index.ts';
import smartStylePlugin from './plugins/smart-style/index.ts';
import starlightUtils from '@lorenzo_lewis/starlight-utils';
import smartSidebarPlugin from './plugins/smart-sidebar/index.ts';
import starlightBlog from 'starlight-blog';

// https://astro.build/config
export default defineConfig({
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
  },
  integrations: [
    starlight({
      title: '快易知',
      defaultLocale: 'zh-cn',
      plugins: [
        smartStylePlugin(),
        smartSearchPlugin(),
        smartHeaderPlugin(),
        smartPagePlugin(),
        starlightBlog(),
        starlightUtils({
          multiSidebar: {
            switcherStyle: 'dropdown',
          },
        }),
        smartSidebarPlugin(),
      ],
      locales: {
        en: {
          label: 'English',
          lang: 'en',
        },
        'zh-cn': {
          label: '简体中文',
          lang: 'zh-CN',
        },
      },
      logo: {
        light: './src/assets/logo.png',
        dark: './src/assets/logo.png',
      },
      social: {
        github: 'https://github.com/cofficlab',
      },
    }),
    vue({
      include: ['**/*.vue'], // 明确包含Vue组件
    }),
    tailwind({
      applyBaseStyles: true,
    }),
  ],
});
