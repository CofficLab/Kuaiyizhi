import { defineCollection, z } from 'astro:content';
import { docsLoader, i18nLoader } from '@astrojs/starlight/loaders';
import { docsSchema, i18nSchema } from '@astrojs/starlight/schema';
import { glob } from 'astro/loaders';

export const collections = {
	docs: defineCollection({
		loader: docsLoader(),
		schema: docsSchema(),
	}),
	i18n: defineCollection({
		loader: i18nLoader(),
		schema: i18nSchema()
	}),
	content: defineCollection({
		loader: glob({
			pattern: "**/*.{md,mdx}",
			base: "./content"
		}),
		schema: z.object({
			title: z.string().optional(),
			description: z.string().optional(),
			tags: z.array(z.string()).optional(),
			date: z.date().optional(),
		}),
	}),
};
