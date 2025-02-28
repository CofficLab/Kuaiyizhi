import type { StarlightPlugin } from '@astrojs/starlight/types';

export default function smartArticleActions(): StarlightPlugin {
    return {
        name: 'smart-article-actions',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Article Actions Plugin initialized!');

                updateConfig({
                    components: {
                        ...config.components,
                        TableOfContents: './plugins/smart-article-actions/TableOfContents.astro'
                    }
                });
            }
        }
    };
} 