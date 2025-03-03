---
title: Complete Guide to Astro Routing System
date: 2025-05-10
excerpt: Astro's routing system provides an intuitive development experience through file system conventions while supporting multiple modes from static generation to server-side rendering.
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Astro
---

# Complete Guide to Astro Routing System

## Routing Fundamentals

### 1. File System Routing

Astro uses convention-based routing based on directory structure:

```
src/pages/
├─ index.astro         => /
├─ about.astro         => /about
├─ blog/
│  ├─ index.astro      => /blog
│  └─ [slug].astro     => /blog/:slug
└─ [[...path]].astro   => 404 page
```

### 2. Routing Features Comparison

| Feature | Astro | Next.js | Nuxt |
| --- | --- | --- | --- |
| Routing Mode | File System | File System + Config | File System |
| Dynamic Parameters | `[param]` syntax | `[param]` syntax | `:param` syntax |
| Route Priority | Alphabetical | Path Depth First | Path Depth First |
| Wildcard Routes | Supports `[...path]` | Supports `[[...path]]` | Supports `_:path` |

## Route Types in Detail

### 1. Static Routes

Basic page routing:

```astro
<!-- src/pages/contact.astro -->
---
// Page logic
---
<html>
  <body>
    <h1>Contact Us</h1>
  </body>
</html>
```

### 2. Dynamic Routes

#### Basic Dynamic Parameters:

```astro
<!-- src/pages/users/[id].astro -->
---
const { id } = Astro.params;
---
<p>User ID: {id}</p>
```

#### Multi-Segment Parameters:

```astro
<!-- src/pages/docs/[lang]/[version]/[...slug].astro -->
---
const { lang, version, slug } = Astro.params;
// When accessing /docs/en/1.0/getting-started:
// lang => 'en', version => '1.0', slug => 'getting-started'
```

### 3. RESTful Routes

| File Path                 | Matching Path  | Parameter Access         |
| ------------------------- | -------------- | ------------------------ |
| pages/products/[id].astro | /products/123  | { id: '123' }            |
| pages/[...all].astro      | /any/path/here | { all: 'any/path/here' } |

## Advanced Routing Features

### 1. Route Redirects

`redirects.config.mjs` configuration:

```javascript
// Static redirects
export const get = () => [
  {
    source: '/old-about',
    destination: '/about',
    status: 301,
  },
  // Dynamic redirects
  {
    source: '/user/:id',
    destination: '/users/:id',
    status: 302,
  },
];
```

### 2. Route Middleware

Creating middleware file:

```javascript
// src/middleware/auth.js
export const onRequest = async (context, next) => {
  if (!context.locals.user) {
    return new Response('Unauthorized', { status: 401 });
  }
  return next();
};
```

Applying middleware:

```astro
<!-- src/pages/dashboard.astro -->
---
import middleware from '../middleware/auth';
export const onRequest = middleware;
// Page logic...
---
```

## Routing Optimization Techniques

### 1. Route Prefetching

```astro
<a href="/about" data-astro-prefetch>About Us</a>
```

Global prefetch configuration:

```javascript
// astro.config.mjs
export default defineConfig({
  prefetch: {
    prefetchAll: true,
    defaultStrategy: 'viewport',
  },
});
```

### 2. Route Splitting

Loading components on demand:

```astro
---
const HeavyComponent = await import('../components/Heavy.astro');
---
<HeavyComponent />
```

## Internationalization Routes

### Multilingual Route Configuration

```javascript
// astro.config.mjs
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';

export default defineConfig({
  integrations: [
    starlight({
      locales: {
        root: { label: 'English', lang: 'en' },
        zh: { label: '中文', lang: 'zh' },
      },
    }),
  ],
});
```

Directory structure:

```
src/content/docs/
├─ en/
│  └─ getting-started.md
└─ zh/
   └─ getting-started.md
```

## Common Issues

### Q1: How to Handle Route Conflicts?

Priority rules:

1. Static routes take precedence over dynamic routes
2. Routes with more parameters take precedence
3. Alphabetical sorting

### Q2: How to Implement Custom 404 Pages?

Create `src/pages/[[...path]].astro`:

```astro
---
import NotFound from '../layouts/NotFound.astro';
---
<NotFound />
```

## Performance Optimization

### 1. Hybrid Rendering Modes

```javascript
// Page-level configuration
export const getStaticPaths = () => [
  { params: { id: '1' } }, // Static generation
  { params: { id: '2' }, props: { ssr: true } }, // Server-side rendering
];
```

### 2. Incremental Static Generation

```javascript
// src/pages/products/[id].astro
export const getStaticPaths = async () => {
  const products = await fetch('https://api.example.com/products');
  return products.map((product) => ({
    params: { id: product.id },
    props: { product },
    // Revalidate every 24 hours
    revalidate: 60 * 60 * 24,
  }));
};
```

## Best Practices

1. **Naming Conventions**: Use lowercase letters and hyphens (kebab-case)
2. **Dynamic Parameters**: Prefer explicit parameter names (e.g., `[userId]` over `[id]`)
3. **Performance Optimization**: Enable prefetching and preloading for high-frequency pages
4. **Security Protection**: Strictly validate dynamic route parameters

## Conclusion

Astro's routing system provides a powerful and flexible foundation for building modern web applications. By understanding and properly implementing these routing features, you can create efficient, maintainable, and user-friendly applications.
