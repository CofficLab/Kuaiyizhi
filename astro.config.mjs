// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';
import vue from '@astrojs/vue';

import tailwind from '@astrojs/tailwind';

// https://astro.build/config
export default defineConfig({
  site: 'https://cofficlab.github.io',
  integrations: [
    starlight({
      customCss: ['./src/styles/custom.css'],
      title: '快易知',
      defaultLocale: 'zh-cn',
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
      ],
    }),
    vue({
      include: ['**/*.vue'], // 明确包含Vue组件
    }),
    tailwind(),
  ],
});
