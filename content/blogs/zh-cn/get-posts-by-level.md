---
title: Astro + Starlight 获取特定层级的文章
date: 2025-02-02
excerpt: 本文介绍如何在 Astro + Starlight 项目中获取特定层级的文章，包括如何筛选一级目录文章、获取子目录文章等。
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Astro
  - Starlight
---

# Astro + Starlight 获取特定层级的文章

在 Astro + Starlight 项目中，文章通常按照多级目录组织。有时我们只需要获取特定层级的文章，本文将介绍几种实现方法。

## 获取一级目录文章

使用 getCollection API 获取文章后，我们可以通过分析文章的 `slug` 来确定其层级：

```astro
---
import { getCollection } from 'astro:content';

// 获取所有文章
const allPosts = await getCollection('docs');

// 获取一级目录的文章
const topLevelPosts = allPosts.filter(post => {
  // slug 格式例如: "blog/astro" 或 "guide/start"
  // 统计斜杠的数量来判断层级
  return post.slug.split('/').length === 2;
});
---

<ul>
  {topLevelPosts.map(post => (
    <li>
      <a href={`/docs/${post.slug}`}>{post.data.title}</a>
    </li>
  ))}
</ul>
```

## 获取指定目录下的文章

如果要获取特定目录下的文章：

```astro
---
import { getCollection } from 'astro:content';

// 获取所有文章
const allPosts = await getCollection('docs');

// 获取 blog/astro 目录下的文章
const astroPosts = allPosts.filter(post => {
  return post.slug.startsWith('blog/astro/');
});

// 只获取 blog/astro 直接子目录的文章（不包含更深层级）
const directAstroPosts = allPosts.filter(post => {
  const parts = post.slug.split('/');
  return parts[0] === 'blog' &&
         parts[1] === 'astro' &&
         parts.length === 3;
});
---
```

## 构建目录树

如果需要构建完整的目录树结构：

```astro
---
import { getCollection } from 'astro:content';

interface TreeNode {
  slug: string;
  title: string;
  children: Record<string, TreeNode>;
}

// 构建目录树
function buildTree(posts: any[]) {
  const tree: Record<string, TreeNode> = {};

  posts.forEach(post => {
    const parts = post.slug.split('/');
    let current = tree;

    parts.forEach((part, index) => {
      if (!current[part]) {
        current[part] = {
          slug: parts.slice(0, index + 1).join('/'),
          title: index === parts.length - 1 ? post.data.title : part,
          children: {}
        };
      }
      current = current[part].children;
    });
  });

  return tree;
}

const allPosts = await getCollection('docs');
const directoryTree = buildTree(allPosts);
---

<!-- 递归渲染目录树 -->
<ul>
  {Object.values(directoryTree).map(node => (
    <li>
      <a href={`/docs/${node.slug}`}>{node.title}</a>
      {Object.keys(node.children).length > 0 && (
        <ul>
          {Object.values(node.children).map(child => (
            <li>
              <a href={`/docs/${child.slug}`}>{child.title}</a>
            </li>
          ))}
        </ul>
      )}
    </li>
  ))}
</ul>
```

## 按层级分组

如果需要将文章按层级分组：

```astro
---
import { getCollection } from 'astro:content';

// 获取所有文章
const allPosts = await getCollection('docs');

// 按层级分组
const postsByLevel = allPosts.reduce((acc, post) => {
  const level = post.slug.split('/').length - 1;
  if (!acc[level]) {
    acc[level] = [];
  }
  acc[level].push(post);
  return acc;
}, {} as Record<number, typeof allPosts>);

// postsByLevel[1] 包含所有一级文章
// postsByLevel[2] 包含所有二级文章
// 以此类推
---
```

## 实用工具函数

这里是一些实用的工具函数，可以帮助处理文章层级：

```typescript
// 获取文章层级
function getPostLevel(slug: string): number {
  return slug.split('/').length - 1;
}

// 获取父级目录
function getParentPath(slug: string): string {
  const parts = slug.split('/');
  return parts.slice(0, -1).join('/');
}

// 检查是否为子目录
function isChildOf(childSlug: string, parentSlug: string): boolean {
  return childSlug.startsWith(parentSlug + '/');
}

// 获取指定层级的所有文章
function getPostsByLevel(posts: any[], level: number) {
  return posts.filter((post) => getPostLevel(post.slug) === level);
}
```

## 注意事项

1. **性能考虑**：处理大量文章时，建议缓存处理结果，避免重复计算。

2. **路径规范**：确保文章的 slug 路径格式统一，这样更容易进行层级判断。

3. **空目录处理**：某些目录可能没有直接的文章，只有子目录，需要妥善处理这种情况。

4. **排序问题**：同一层级的文章可能需要按照特定规则排序，可以结合文章的 frontmatter 数据进行排序。

## 结论

通过合理使用 slug 分析和过滤，我们可以灵活地获取和组织不同层级的文章。这对于构建导航菜单、面包屑导航等功能非常有帮助。根据具体需求，你可以组合使用上述方法，实现更复杂的文章组织和展示功能。
