---
title: 使用 Starlight 构建文档站点
date: 2025-01-31
excerpt: Starlight 是 Astro 生态中的文档主题工具，专为构建现代化、高性能的文档网站而设计。它基于 Astro 构建，继承了其快速、灵活的特性，同时提供了开箱即用的文档功能。
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Starlight
---

Starlight 是 Astro 生态中的文档主题工具，专为构建现代化、高性能的文档网站而设计。它基于 Astro 构建，继承了其快速、灵活的特性，同时提供了开箱即用的文档功能。以下是 Starlight 的核心功能介绍：

## Starlight 的特点

1. **Astro 基础**: 基于 Astro 构建，享受静态生成、组件优先等特性，同时保持极快的加载速度。

2. **主题定制**: 提供可配置的 UI 主题，支持自定义颜色、字体、logo 等品牌元素，无需编写 CSS 即可创建个性化文档。

3. **多语言支持**: 内置国际化（i18n）解决方案，支持创建多语言文档站点，自动处理语言切换和路由。

4. **智能搜索**: 集成全文搜索功能，支持快捷键操作和搜索结果高亮显示。

5. **SEO 优化**: 自动生成规范的元标签、Open Graph 数据和结构化数据，提升搜索引擎可见性。

6. **组件库**: 提供丰富的内置组件，包括标签页、代码块、版本提示等，加速文档编写。

## 如何使用 Starlight

### 创建新项目

使用以下命令创建基于 Starlight 的文档项目：

```bash
npm create astro@latest -- --template starlight
```

### 项目结构

典型的 Starlight 项目结构：

- `src/content/docs/`: Markdown/MDX 文档内容
- `src/configs/`: 配置文件（主题、导航栏等）
- `public/`: 静态资源文件
- `astro.config.mjs`: Astro 配置文件

### 基本配置

在 `astro.config.mjs` 中配置基础信息：

```javascript
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';

export default defineConfig({
  integrations: [
    starlight({
      title: '我的文档',
      social: {
        github: 'https://github.com/your-repo',
      },
    }),
  ],
});
```

### 添加文档内容

在 `src/content/docs/` 目录下创建 `.md` 文件：

````markdown
---
title: 快速开始
---

# 安装指南

1. 安装依赖：
   ```bash
   npm install
   ```
````

2. 启动开发服务器：
   ```bash
   npm run dev
   ```

````

### 自定义主题

通过配置文件修改主题颜色：

```javascript
// astro.config.mjs
starlight({
  // ...其他配置
  components: {
    theme: {
      colors: {
        primary: {
          hue: 200,
          saturation: 100,
        }
      }
    }
  }
})
````

## 最佳实践

1. 使用组件增强内容：

   ````markdown
   ## 功能演示

   <Tabs>
     <Tab label="React">
       ```jsx
       function Counter() { ... }
       ```
     </Tab>
     <Tab label="Vue">
       ```vue
       <script setup>
       const count = ref(0)
       </script>
       ```
     </Tab>
   </Tabs>
   ````

2. 利用版本控制：
   ```markdown
   ---
   title: 更新日志
   version:
     current: v2.0
   ---
   ```

## 部署文档

Starlight 支持所有 Astro 兼容的部署平台。推荐使用：

```bash
npm run build
```

将生成的 `dist/` 目录部署到托管服务。

## 结论

Starlight 为技术文档的创建和维护提供了现代化解决方案，结合 Astro 的性能优势和开箱即用的文档功能，是构建产品文档、API 参考和技术指南的理想选择。通过其丰富的配置选项和扩展能力，可以轻松创建专业级的文档站点。
