import { defineCollection, z } from 'astro:content';
import { glob } from 'astro/loaders';

export const collections = {
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
