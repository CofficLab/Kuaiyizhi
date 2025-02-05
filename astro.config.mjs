// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';
import vue from '@astrojs/vue';
import tailwind from '@astrojs/tailwind';
import { sidebar } from './astro.sidebar';
import smartSearchPlugin from './plugins/smart-search/index.ts';
import smartHeaderPlugin from './plugins/smart-header/index.ts';
import smartPagePlugin from './plugins/smart-page/index.ts';
import smartStylePlugin from './plugins/smart-style/index.ts';

// https://astro.build/config
export default defineConfig({
  site: 'https://cofficlab.github.io',
  integrations: [
    starlight({
      title: '快易知',
      defaultLocale: 'zh-cn',
      plugins: [
        smartStylePlugin(),
        smartSearchPlugin(),
        smartHeaderPlugin(),
        smartPagePlugin()
      ],
      locales: {
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
      sidebar,
    }),
    vue({
      include: ['**/*.vue'], // 明确包含Vue组件
    }),
    tailwind({
      applyBaseStyles: true,
    }),
  ],
});
