import { defineCollection, z } from 'astro:content';
import { glob } from 'astro/loaders';

export const collections = {
	blogs: defineCollection({
		loader: glob({
			pattern: '**/*.{md,mdx}',
			base: './content/blogs',
		}),
		schema: z.object({
			title: z.string().optional(),
			description: z.string().optional(),
			tags: z.array(z.string()).optional(),
			date: z.date().optional(),
			authors: z.array(z.object({
				name: z.string(),
				picture: z.string().optional(),
				url: z.string().optional(),
			})).optional(),
		}),
	}),

	meta: defineCollection({
		loader: glob({
			pattern: '**/*.{md,mdx}',
			base: './content/meta',
		}),

	}),

	courses: defineCollection({
		loader: glob({
			pattern: '**/*.{md,mdx}',
			base: './content/courses',
		}),

	}),

	lessons: defineCollection({
		loader: glob({
			pattern: '**/*.{md,mdx}',
			base: './content/lessons',
		}),
		schema: z.object({
			title: z.string(),
			description: z.string().optional(),
			authors: z.array(z.object({
				name: z.string(),
				picture: z.string().optional(),
			})).optional(),
		}),
	}),
};
