import type { StarlightPlugin } from '@astrojs/starlight/types';

export default function smartSearchPlugin(): StarlightPlugin {
    return {
        name: 'smart-search',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Search Plugin initialized!');

                updateConfig({
                    components: {
                        Search: './plugins/smart-search/Search.astro'
                    }
                });
            }
        }
    };
} 