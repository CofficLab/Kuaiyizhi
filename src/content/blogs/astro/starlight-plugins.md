---
title: Starlight 插件扩展指南
date: 2025-01-31
excerpt: Starlight 的插件系统基于 Astro 集成开发，允许通过模块化方式扩展文档站点的功能。所有插件都通过 npm 包分发，支持官方和社区插件。
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Starlight
---

## 插件系统概述

Starlight 的插件系统基于 Astro 集成开发，允许通过模块化方式扩展文档站点的功能。所有插件都通过 npm 包分发，支持官方和社区插件。

## 核心概念

1. **功能扩展**：添加新组件、优化构建流程或集成第三方服务
2. **配置继承**：插件配置与 Starlight 主配置深度集成
3. **类型安全**：提供完整的 TypeScript 类型支持

## 插件管理

### 安装插件

以官方图片插件为例：

```bash
npm install @astrojs/starlight-image @astrojs/image
```

### 配置文件

在项目根目录创建 `starlight.plugins.mjs`：

```javascript
import imagePlugin from '@astrojs/starlight-image';

/** @type {import('@astrojs/starlight').StarlightPlugins} */
export default {
  image: imagePlugin({
    defaultLocale: 'zh-CN',
    imageService: 'sharp',
  }),
};
```

### 应用配置

更新 `astro.config.mjs`：

```javascript
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';
import plugins from './starlight.plugins.mjs';

export default defineConfig({
  integrations: [
    starlight({
      // ... 原有配置 ...
      plugins: Object.values(plugins),
    }),
  ],
});
```

## 常用插件示例

### 1. 图片优化插件

配置示例：

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

### 2. 分析统计插件

安装：

```bash
npm install starlight-google-analytics
```

使用：

```javascript
// starlight.plugins.mjs
import analytics from 'starlight-google-analytics';

export default {
  analytics: analytics({
    trackingID: 'UA-XXXXX-Y',
  }),
};
```

## 插件开发基础

### 1. 创建插件模板

```bash
mkdir starlight-plugin-example
cd starlight-plugin-example
npm init -y
```

### 2. 基本结构

```javascript
// index.js
/** @type {import('@astrojs/starlight').StarlightPlugin} */
export default {
  name: 'example-plugin',
  hooks: {
    setup({ config, updateConfig }) {
      // 插件逻辑
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

### 3. 本地测试

在项目中临时安装：

```bash
npm install ./path/to/starlight-plugin-example
```

## 故障排查

1. **版本冲突**：确保插件版本与 Starlight 版本兼容
2. **配置验证**：使用 `astro check` 验证配置
3. **缓存问题**：运行 `npm run clear` 清除构建缓存
