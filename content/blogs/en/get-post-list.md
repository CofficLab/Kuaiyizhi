---
title: Getting Post List in Astro + Starlight
date: 2025-02-01
excerpt: This article explains how to retrieve and display post lists in an Astro + Starlight project, including using the getCollection API and custom sorting functionality.
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Astro
  - Starlight
---

# Getting Post List in Astro + Starlight

When building documentation or blog websites with Astro + Starlight, retrieving and displaying post lists is a common requirement. This article will explain in detail how to implement this functionality.

## Using the getCollection API

Astro provides a powerful content collection API that makes it easy to retrieve post lists. Here's the basic usage:

```astro
---
import { getCollection } from 'astro:content';

// Get all blog posts
const posts = await getCollection('docs');
---
```

## Post Filtering and Sorting

You can use JavaScript array methods to filter and sort posts:

```astro
---
import { getCollection } from 'astro:content';

// Get all posts and sort by date
const posts = await getCollection('docs', ({ data }) => {
  return data.draft !== true; // Exclude draft posts
}).then(posts =>
  posts.sort((a, b) =>
    new Date(b.data.date).getTime() - new Date(a.data.date).getTime()
  )
);
---
```

## Categorizing by Tags

If you want to categorize posts by tags, you can do it like this:

```astro
---
import { getCollection } from 'astro:content';

// Get all posts
const allPosts = await getCollection('docs');

// Create tag mapping
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

## Displaying Post Lists in Pages

After retrieving the post list, you can display them in your pages:

```astro
---
// Post retrieval code above...
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

## Pagination Functionality

If you have many posts, you might need to add pagination:

```astro
---
import { getCollection } from 'astro:content';

// Pagination configuration
const postsPerPage = 10;
const currentPage = Astro.url.searchParams.get('page') || 1;

// Get all posts
const allPosts = await getCollection('docs');
const totalPages = Math.ceil(allPosts.length / postsPerPage);

// Get posts for current page
const posts = allPosts.slice(
  (currentPage - 1) * postsPerPage,
  currentPage * postsPerPage
);
---

{/* Post list display code */}

<!-- Pagination navigation -->
<nav>
  {currentPage > 1 && (
    <a href={`?page=${currentPage - 1}`}>Previous</a>
  )}

  {currentPage < totalPages && (
    <a href={`?page=${currentPage + 1}`}>Next</a>
  )}
</nav>
```

## Custom Sorting and Filtering

You can customize post sorting and filtering rules according to your needs:

```astro
---
import { getCollection } from 'astro:content';

// Sort by custom rules
const posts = await getCollection('docs', ({ data }) => {
  // Only get posts with specific tags
  return data.tags?.includes('featured');
}).then(posts =>
  // Sort by reading time
  posts.sort((a, b) =>
    (b.data.readingTime || 0) - (a.data.readingTime || 0)
  )
);
---
```

## Important Considerations

1. **Performance Optimization**: When dealing with a large number of posts, consider implementing pagination or virtual scrolling.

2. **Type Safety**: If using TypeScript, you can define types for your post collections:

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

3. **Caching Considerations**: Results from getCollection are automatically cached by Astro, so you don't need to worry about performance.

## Conclusion

Astro + Starlight provides powerful and flexible APIs for handling post lists. By properly using these APIs, you can easily implement post retrieval, filtering, sorting, and display functionality. Based on your specific requirements, you can further optimize and extend these features to create a better user experience.
