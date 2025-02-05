import type { StarlightPlugin } from '@astrojs/starlight/types'

export default function smartPagePlugin(): StarlightPlugin {
    return {
        name: 'smart-page',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Page Plugin initialized!');

                updateConfig({
                    components: {
                        ...config.components,
                        PageFrame: './plugins/smart-page/SmartPage.astro'
                    }
                });
            }
        }
    };
} 