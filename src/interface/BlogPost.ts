import type { RenderedContent } from 'astro:content';

export interface BlogPost {
    id: string;
    body?: string;
    collection: 'blogs';
    data: {
        title: string;
        description?: string;
        tags: string[];
    };
    rendered?: RenderedContent;
    filePath?: string;
    slug: string;
} 