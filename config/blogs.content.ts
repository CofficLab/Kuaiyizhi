import { defineCollection, z } from 'astro:content';
import { glob, file } from 'astro/loaders'; // 不适用于旧版 API

const blog = defineCollection({
    loader: glob({ pattern: "**/*.md", base: "./src/content/blogs" }),
});

export default blog;