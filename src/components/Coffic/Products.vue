<template>
  <div class="flex flex-col gap-4 container mx-auto items-center my-10">
    <h2>{{ lang === 'en' ? 'Our Products' : '我们的产品' }}</h2>
    <div data-type="products" class="flex flex-row gap-4 container mx-auto justify-center">
      <Product v-for="product in products" :key="typeof product.name === 'string' ? product.name : product.name.en"
        :product="getLocalizedProduct(product)" />
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
export default defineComponent({
  name: 'Products'
})
</script>

<script setup lang="ts">
import Product from '../Common/Product.vue';

const props = defineProps({
  lang: {
    type: String,
    default: 'en',
    validator: (value: string) => ['en', 'zh'].includes(value)
  }
});

interface Product {
  avatar: string;
  name: string | { en: string; zh: string };
  description: string | { en: string; zh: string };
  store?: string;
  github?: string;
  homepage: string;
}

const products = [
  {
    avatar: '/images/cisum/logo.min.png',
    name: { en: 'Cisum', zh: 'Cisum' },
    description: { en: 'A music player', zh: 'Apple 平台的音乐播放器' },
    store: 'https://apps.apple.com/cn/app/cisum/id6466401036',
    github: 'https://github.com/yueyinet/cisum',
    homepage: '/' + props.lang + '/cisum',
  },
  {
    avatar: '/images/juiceNote/logo.min.png',
    name: { en: 'JuiceNote', zh: '快易知' },
    description: { en: 'A note application', zh: 'macOS 的笔记应用' },
    store: 'https://apps.apple.com/cn/app/%E5%BF%AB%E6%98%93%E7%9F%A5/id6457892799',
    homepage: '/' + props.lang + '/juiceNote',
  },
  {
    avatar: '/images/travelmode/logo.min.png',
    name: 'TravelMode',
    description: { en: 'Control your network', zh: 'macOS 的网络控制应用' },
    store: 'https://apps.apple.com/cn/app/travelmode/id6474899051',
    github: 'https://github.com/CofficLab/TravelMode',
    homepage: '/' + props.lang + '/travelmode',
  },
  {
    avatar: '/images/juiceEditor/logo.min.png',
    name: 'JuiceEditor',
    description: { en: 'Powerful editor', zh: '简洁强大的富文本编辑器' },
    github: 'https://github.com/CofficLab/JuiceEditor',
    homepage: '/' + props.lang + '/juiceEditor',
  },
  {
    avatar: '/images/gitok/logo.png',
    name: 'GitOk',
    description: { en: 'Project management', zh: 'macOS 的项目管理应用' },
    github: 'https://github.com/CofficLab/gitok',
    homepage: '/' + props.lang + '/gitok',
  }
];

const getLocalizedProduct = (product: Product) => {
  return {
    ...product,
    name: typeof product.name === 'object' ? product.name[props.lang as keyof typeof product.name] : product.name,
    description: typeof product.description === 'object' ? product.description[props.lang as keyof typeof product.description] : product.description,
  };
};
</script>
