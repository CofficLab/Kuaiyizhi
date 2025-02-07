import { defineCollection } from 'astro:content';
import { docsLoader, i18nLoader } from '@astrojs/starlight/loaders';
import { docsSchema, i18nSchema } from '@astrojs/starlight/schema';
import { blogSchema } from 'starlight-blog/schema'
import blog from '../config/blogs.content.ts';

export const collections = {
	docs: defineCollection({
		loader: docsLoader(),
		schema: docsSchema(
			{
				extend: (context) => blogSchema(context)
			}
		),

	}),
	i18n: defineCollection({ loader: i18nLoader(), schema: i18nSchema() }),
	blogs: blog,
};
