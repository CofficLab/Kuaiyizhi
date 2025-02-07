import type { StarlightPlugin } from '@astrojs/starlight/types'

export default function smartTitlePlugin(): StarlightPlugin {
    return {
        name: 'smart-title',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Title Plugin initialized!');

                updateConfig({
                    components: {
                        ...config.components,
                        SiteTitle: './plugins/smart-title/SmartTitle.astro'
                    },
                });
            }
        }
    };
} 