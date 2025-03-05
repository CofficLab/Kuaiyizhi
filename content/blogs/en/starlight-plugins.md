---
title: Starlight Plugin Extension Guide
date: 2025-01-31
excerpt: Starlight's plugin system is built on Astro integration, allowing modular extension of documentation site functionality. All plugins are distributed through npm packages, supporting both official and community plugins.
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Starlight
---

## Plugin System Overview

Starlight's plugin system is built on Astro integration, allowing modular extension of documentation site functionality. All plugins are distributed through npm packages, supporting both official and community plugins.

## Core Concepts

1. **Feature Extension**: Add new components, optimize build process, or integrate third-party services
2. **Configuration Inheritance**: Plugin configuration deeply integrates with Starlight main configuration
3. **Type Safety**: Complete TypeScript type support provided

## Plugin Management

### Installing Plugins

Using the official image plugin as an example:

```bash
npm install @astrojs/starlight-image @astrojs/image
```

### Configuration File

Create `starlight.plugins.mjs` in the project root:

```javascript
import imagePlugin from '@astrojs/starlight-image';

/** @type {import('@astrojs/starlight').StarlightPlugins} */
export default {
  image: imagePlugin({
    defaultLocale: 'en',
    imageService: 'sharp',
  }),
};
```

### Applying Configuration

Update `astro.config.mjs`:

```javascript
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';
import plugins from './starlight.plugins.mjs';

export default defineConfig({
  integrations: [
    starlight({
      // ... existing configuration ...
      plugins: Object.values(plugins),
    }),
  ],
});
```

## Common Plugin Examples

### 1. Image Optimization Plugin

Configuration example:

```javascript
// starlight.plugins.mjs
export default {
  image: imagePlugin({
    responsive: {
      deviceSizes: [640, 750, 828, 1080, 1200],
      imageSizes: [16, 32, 48, 64],
    },
  }),
};
```

### 2. Analytics Plugin

Installation:

```bash
npm install starlight-google-analytics
```

Usage:

```javascript
// starlight.plugins.mjs
import analytics from 'starlight-google-analytics';

export default {
  analytics: analytics({
    trackingID: 'UA-XXXXX-Y',
  }),
};
```

## Plugin Development Basics

### 1. Create Plugin Template

```bash
mkdir starlight-plugin-example
cd starlight-plugin-example
npm init -y
```

### 2. Basic Structure

```javascript
// index.js
/** @type {import('@astrojs/starlight').StarlightPlugin} */
export default {
  name: 'example-plugin',
  hooks: {
    setup({ config, updateConfig }) {
      // Plugin logic
      updateConfig({
        head: [
          ...config.head,
          { tag: 'meta', attrs: { name: 'plugin-added' } },
        ],
      });
    },
  },
};
```

### 3. Local Testing

Temporarily install in your project:

```bash
npm install ./path/to/starlight-plugin-example
```

## Troubleshooting

1. **Version Conflicts**: Ensure plugin version is compatible with Starlight version
2. **Configuration Validation**: Use `astro check` to validate configuration
3. **Cache Issues**: Run `npm run clear` to clear build cache
