import { defineCollection, z } from 'astro:content';
import { docsLoader, i18nLoader } from '@astrojs/starlight/loaders';
import { docsSchema, i18nSchema } from '@astrojs/starlight/schema';
import { glob } from 'astro/loaders';

export const collections = {
	docs: defineCollection({
		loader: docsLoader(),
		schema: docsSchema(),
	}),
	i18n: defineCollection({ loader: i18nLoader(), schema: i18nSchema() }),
	blogs: defineCollection({
		loader: glob({
			pattern: "**/*.{md,mdx}",
			base: "./src/content/blogs"
		}),
		schema: z.object({
			title: z.string(),
			tags: z.array(z.string()),
			description: z.string().optional(),
		}),
	}),
	metas: defineCollection({
		loader: glob({
			pattern: "**/*.{md,mdx}",
			base: "./src/content/meta"
		}),
		schema: z.object({
			title: z.string().optional(),
			description: z.string().optional(),
		}),
	}),
};
