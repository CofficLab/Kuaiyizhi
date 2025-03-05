---
title: Astro 路由系统完全指南
date: 2025-05-10
excerpt: Astro 的路由系统通过文件系统约定提供了直观的开发体验，同时支持从静态生成到服务端渲染的多种模式。
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Astro
---

## 路由基础原理

### 1. 文件系统路由

Astro 采用基于目录结构的约定式路由：

```
src/pages/
├─ index.astro         => /
├─ about.astro         => /about
├─ blog/
│  ├─ index.astro      => /blog
│  └─ [slug].astro     => /blog/:slug
└─ [[...path]].astro   => 404 页面
```

### 2. 路由特性对比

| 特性       | Astro            | Next.js            | Nuxt          |
| ---------- | ---------------- | ------------------ | ------------- |
| 路由模式   | 文件系统         | 文件系统 + 配置    | 文件系统      |
| 动态参数   | `[param]` 语法   | `[param]` 语法     | `:param` 语法 |
| 路由优先级 | 字母顺序         | 路径深度优先       | 路径深度优先  |
| 通配路由   | 支持 `[...path]` | 支持 `[[...path]]` | 支持 `_:path` |

## 路由类型详解

### 1. 静态路由

基础页面路由：

```astro
<!-- src/pages/contact.astro -->
---
// 页面逻辑
---
<html>
  <body>
    <h1>联系我们</h1>
  </body>
</html>
```

### 2. 动态路由

#### 基本动态参数

```astro
<!-- src/pages/users/[id].astro -->
---
const { id } = Astro.params;
---
<p>用户ID: {id}</p>
```

#### 多段参数

```astro
<!-- src/pages/docs/[lang]/[version]/[...slug].astro -->
---
const { lang, version, slug } = Astro.params;
// 访问 /docs/zh/1.0/getting-started 时：
// lang => 'zh', version => '1.0', slug => 'getting-started'
```

### 3. RESTful 路由

| 文件路径                  | 匹配路径       | 参数获取                 |
| ------------------------- | -------------- | ------------------------ |
| pages/products/[id].astro | /products/123  | { id: '123' }            |
| pages/[...all].astro      | /any/path/here | { all: 'any/path/here' } |

## 高级路由功能

### 1. 路由重定向

`redirects.config.mjs` 配置：

```javascript
// 静态重定向
export const get = () => [
  {
    source: '/old-about',
    destination: '/about',
    status: 301,
  },
  // 动态重定向
  {
    source: '/user/:id',
    destination: '/users/:id',
    status: 302,
  },
];
```

### 2. 路由中间件

创建中间件文件：

```javascript
// src/middleware/auth.js
export const onRequest = async (context, next) => {
  if (!context.locals.user) {
    return new Response('Unauthorized', { status: 401 });
  }
  return next();
};
```

应用中间件：

```astro
<!-- src/pages/dashboard.astro -->
---
import middleware from '../middleware/auth';
export const onRequest = middleware;
// 页面逻辑...
---
```

## 路由优化技巧

### 1. 路由预取

```astro
<a href="/about" data-astro-prefetch>关于我们</a>
```

配置全局预取：

```javascript
// astro.config.mjs
export default defineConfig({
  prefetch: {
    prefetchAll: true,
    defaultStrategy: 'viewport',
  },
});
```

### 2. 路由分割

按需加载组件：

```astro
---
const HeavyComponent = await import('../components/Heavy.astro');
---
<HeavyComponent />
```

## 国际化路由

### 多语言路由配置

```javascript
// astro.config.mjs
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';

export default defineConfig({
  integrations: [
    starlight({
      locales: {
        root: { label: '中文', lang: 'zh' },
        en: { label: 'English', lang: 'en' },
      },
    }),
  ],
});
```

目录结构：

```
src/content/docs/
├─ zh/
│  └─ getting-started.md
└─ en/
   └─ getting-started.md
```

## 常见问题

### Q1: 如何处理路由冲突？

优先级规则：

1. 静态路由优先于动态路由
2. 参数数量多的路由优先
3. 字母顺序排序

### Q2: 如何实现自定义 404 页面？

创建 `src/pages/[[...path]].astro`：

```astro
---
import NotFound from '../layouts/NotFound.astro';
---
<NotFound />
```

## 性能优化

### 1. 混合渲染模式

```javascript
// 页面级配置
export const getStaticPaths = () => [
  { params: { id: '1' } }, // 静态生成
  { params: { id: '2' }, props: { ssr: true } }, // 服务端渲染
];
```

### 2. 增量静态生成

```javascript
// src/pages/products/[id].astro
export const getStaticPaths = async () => {
  const products = await fetch('https://api.example.com/products');
  return products.map((product) => ({
    params: { id: product.id },
    props: { product },
    // 每24小时重新验证
    revalidate: 60 * 60 * 24,
  }));
};
```

## 最佳实践

1. **命名规范**：使用小写字母和连字符（kebab-case）
2. **动态参数**：优先使用明确参数名（如 `[userId]` 而非 `[id]`）
3. **性能优化**：对高频页面启用预取和预加载
4. **安全防护**：对动态路由参数进行严格验证

## 总结

Astro 的路由系统通过文件系统约定提供了直观的开发体验，同时支持从静态生成到服务端渲染的多种模式。建议开发者根据内容类型选择合适的路由策略，善用中间件和国际化功能构建高效安全的 Web 应用。
