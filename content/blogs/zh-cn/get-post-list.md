---
title: Astro + Starlight 获取文章列表
date: 2025-02-01
excerpt: 本文介绍如何在 Astro + Starlight 项目中获取和展示文章列表，包括使用 getCollection API 和自定义排序等功能。
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Astro
  - Starlight
---

# Astro + Starlight 获取文章列表

在使用 Astro + Starlight 构建文档或博客网站时，获取和展示文章列表是一个常见需求。本文将详细介绍如何实现这一功能。

## 使用 getCollection API

Astro 提供了强大的内容集合 API，可以轻松获取文章列表。以下是基本用法：

```astro
---
import { getCollection } from 'astro:content';

// 获取所有博客文章
const posts = await getCollection('docs');
---
```

## 文章过滤和排序

你可以使用 JavaScript 的数组方法对文章进行过滤和排序：

```astro
---
import { getCollection } from 'astro:content';

// 获取所有文章并按日期排序
const posts = await getCollection('docs', ({ data }) => {
  return data.draft !== true; // 排除草稿文章
}).then(posts =>
  posts.sort((a, b) =>
    new Date(b.data.date).getTime() - new Date(a.data.date).getTime()
  )
);
---
```

## 按标签分类

如果你想按标签对文章进行分类，可以这样做：

```astro
---
import { getCollection } from 'astro:content';

// 获取所有文章
const allPosts = await getCollection('docs');

// 创建标签映射
const tagToPosts = {};
allPosts.forEach(post => {
  post.data.tags?.forEach(tag => {
    if (!tagToPosts[tag]) {
      tagToPosts[tag] = [];
    }
    tagToPosts[tag].push(post);
  });
});
---
```

## 在页面中展示文章列表

获取到文章列表后，你可以在页面中展示它们：

```astro
---
// 上面的获取文章代码...
---

<ul>
  {posts.map(post => (
    <li>
      <a href={`/docs/${post.slug}`}>
        <h2>{post.data.title}</h2>
        <p>{post.data.excerpt}</p>
        <time datetime={post.data.date.toISOString()}>
          {post.data.date.toLocaleDateString()}
        </time>
      </a>
    </li>
  ))}
</ul>
```

## 分页功能

如果文章较多，你可能需要添加分页功能：

```astro
---
import { getCollection } from 'astro:content';

// 分页配置
const postsPerPage = 10;
const currentPage = Astro.url.searchParams.get('page') || 1;

// 获取所有文章
const allPosts = await getCollection('docs');
const totalPages = Math.ceil(allPosts.length / postsPerPage);

// 获取当前页的文章
const posts = allPosts.slice(
  (currentPage - 1) * postsPerPage,
  currentPage * postsPerPage
);
---

{/* 文章列表展示代码 */}

<!-- 分页导航 -->
<nav>
  {currentPage > 1 && (
    <a href={`?page=${currentPage - 1}`}>上一页</a>
  )}

  {currentPage < totalPages && (
    <a href={`?page=${currentPage + 1}`}>下一页</a>
  )}
</nav>
```

## 自定义排序和过滤

你可以根据需要自定义文章的排序和过滤规则：

```astro
---
import { getCollection } from 'astro:content';

// 按自定义规则排序
const posts = await getCollection('docs', ({ data }) => {
  // 只获取特定标签的文章
  return data.tags?.includes('featured');
}).then(posts =>
  // 按阅读时间排序
  posts.sort((a, b) =>
    (b.data.readingTime || 0) - (a.data.readingTime || 0)
  )
);
---
```

## 注意事项

1. **性能优化**：当文章数量较大时，建议实现分页或虚拟滚动。

2. **类型安全**：如果使用 TypeScript，可以为文章集合定义类型：

```typescript
interface BlogSchema {
  title: string;
  date: Date;
  excerpt?: string;
  tags?: string[];
  draft?: boolean;
}

const posts = (await getCollection('docs')) as CollectionEntry<BlogSchema>[];
```

3. **缓存考虑**：getCollection 的结果会被 Astro 自动缓存，所以不用担心性能问题。

## 结论

Astro + Starlight 提供了强大而灵活的 API 来处理文章列表。通过合理使用这些 API，你可以轻松实现文章的获取、过滤、排序和展示功能。根据具体需求，你可以进一步优化和扩展这些功能，打造出更好的用户体验。
