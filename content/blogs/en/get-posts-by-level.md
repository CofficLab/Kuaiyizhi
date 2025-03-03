---
title: Getting Posts by Level in Astro + Starlight
date: 2025-02-02
excerpt: This article explains how to retrieve posts from specific levels in an Astro + Starlight project, including filtering top-level posts and getting posts from subdirectories.
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Astro
  - Starlight
---

In Astro + Starlight projects, articles are typically organized in a multi-level directory structure. Sometimes we need to retrieve posts from specific levels only. This article will introduce several methods to achieve this.

## Getting Top-Level Posts

After retrieving posts using the getCollection API, we can determine their level by analyzing the `slug`:

```astro
---
import { getCollection } from 'astro:content';

// Get all posts
const allPosts = await getCollection('docs');

// Get top-level posts
const topLevelPosts = allPosts.filter(post => {
  // slug format example: "blog/astro" or "guide/start"
  // Count slashes to determine level
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

## Getting Posts from a Specific Directory

If you want to get posts from a specific directory:

```astro
---
import { getCollection } from 'astro:content';

// Get all posts
const allPosts = await getCollection('docs');

// Get posts from blog/astro directory
const astroPosts = allPosts.filter(post => {
  return post.slug.startsWith('blog/astro/');
});

// Get posts only from direct subdirectories of blog/astro (excluding deeper levels)
const directAstroPosts = allPosts.filter(post => {
  const parts = post.slug.split('/');
  return parts[0] === 'blog' &&
         parts[1] === 'astro' &&
         parts.length === 3;
});
---
```

## Building a Directory Tree

If you need to build a complete directory tree structure:

```astro
---
import { getCollection } from 'astro:content';

interface TreeNode {
  slug: string;
  title: string;
  children: Record<string, TreeNode>;
}

// Build directory tree
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

<!-- Recursively render directory tree -->
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

## Grouping by Level

If you need to group posts by level:

```astro
---
import { getCollection } from 'astro:content';

// Get all posts
const allPosts = await getCollection('docs');

// Group by level
const postsByLevel = allPosts.reduce((acc, post) => {
  const level = post.slug.split('/').length - 1;
  if (!acc[level]) {
    acc[level] = [];
  }
  acc[level].push(post);
  return acc;
}, {} as Record<number, typeof allPosts>);

// postsByLevel[1] contains all first-level posts
// postsByLevel[2] contains all second-level posts
// And so on
---
```

## Utility Functions

Here are some useful utility functions for handling post levels:

```typescript
// Get post level
function getPostLevel(slug: string): number {
  return slug.split('/').length - 1;
}

// Get parent directory path
function getParentPath(slug: string): string {
  const parts = slug.split('/');
  return parts.slice(0, -1).join('/');
}

// Check if it's a subdirectory
function isChildOf(childSlug: string, parentSlug: string): boolean {
  return childSlug.startsWith(parentSlug + '/');
}

// Get all posts at a specific level
function getPostsByLevel(posts: any[], level: number) {
  return posts.filter((post) => getPostLevel(post.slug) === level);
}
```

## Important Considerations

1. **Performance**: When dealing with many posts, consider caching the results to avoid repeated calculations.

2. **Path Standardization**: Ensure consistent slug path formats for easier level determination.

3. **Empty Directory Handling**: Some directories might have no direct posts, only subdirectories - handle these cases appropriately.

4. **Sorting**: Posts at the same level might need to be sorted according to specific rules, which can be done using the posts' frontmatter data.

## Conclusion

Through proper use of slug analysis and filtering, we can flexibly retrieve and organize posts from different levels. This is particularly helpful for building navigation menus, breadcrumb navigation, and other features. Depending on your specific needs, you can combine these methods to implement more complex post organization and display functionality.
