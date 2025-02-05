// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';
import vue from '@astrojs/vue';

import tailwind from '@astrojs/tailwind';
import smartStylePlugin from './plugins/smart-style/index.ts';
import smartSearchPlugin from './plugins/smart-search/index.ts';
import smartHeaderPlugin from './plugins/smart-header/index.ts';
import smartPagePlugin from './plugins/smart-page/index.ts';

// https://astro.build/config
export default defineConfig({
  site: 'https://cofficlab.github.io',
  integrations: [
    starlight({
      title: '快易知',
      defaultLocale: 'zh-cn',
      plugins: [
        smartSearchPlugin(),
        smartHeaderPlugin(),
        smartPagePlugin(),
        // smartStylePlugin(),
      ],
      locales: {
        'zh-cn': {
          label: '简体中文',
          lang: 'zh-CN',
        },
      },
      logo: {
        light: './src/assets/coffic/logo4.min.png',
        dark: './src/assets/coffic/logo4.min.png',
      },
      social: {
        github: 'https://github.com/cofficlab',
      },
      sidebar: [
        {
          label: 'Laravel',
          autogenerate: { directory: 'laravel_learn' },
        },
        {
          label: 'Kong',
          autogenerate: { directory: 'kong' },
        },
        {
          label: 'Vue',
          autogenerate: { directory: 'vue' },
        },
        {
          label: 'Caddy',
          autogenerate: { directory: 'caddy' },
        },
        {
          label: 'Build Your Own Web Toolbox',
          autogenerate: { directory: 'build_your_own_web_toolbox' },
        },
      ],
    }),
    vue({
      include: ['**/*.vue'], // 明确包含Vue组件
    }),
    tailwind({
      applyBaseStyles: true,
    }),
  ],
});
