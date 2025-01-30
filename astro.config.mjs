// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';
import vue from '@astrojs/vue';

import tailwind from '@astrojs/tailwind';

// https://astro.build/config
export default defineConfig({
  site: 'https://cofficlab.github.io',
  redirects: {
    '/zh/juiceEditor': '/juiceEditor',
  },
  integrations: [
    starlight({
      customCss: ['./src/styles/custom.css'],
      title: '快易知',
      defaultLocale: 'en',
      locales: {
        // 英文文档在 `src/content/docs/en/` 中。
        en: {
          label: 'English',
        },
        // 简体中文文档在 `src/content/docs/zh-cn/` 中。
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
          label: 'JuiceEditor',
          autogenerate: { directory: 'juiceEditor' },
        },
      ],
    }),
    vue({
      include: ['**/*.vue'], // 明确包含Vue组件
    }),
    tailwind(),
  ],
});
