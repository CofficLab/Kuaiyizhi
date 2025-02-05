import type { StarlightPlugin } from '@astrojs/starlight/types'

export default function homeHideSearchPlugin(): StarlightPlugin {
    return {
        name: 'home-hide-search',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Hide Home Search Plugin initialized!');

                updateConfig({
                    components: {
                        ...config.components,
                        Search: './plugins/home-hide-search/HomeSearch.astro'
                    }
                });
            }
        }
    };
} 