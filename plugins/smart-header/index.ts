import type { StarlightPlugin } from '@astrojs/starlight/types'

export default function smartHeaderPlugin(): StarlightPlugin {
    return {
        name: 'smart-style',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Style Plugin initialized!');

                updateConfig({
                    components: {
                        ...config.components,
                        Header: './plugins/smart-header/SmartHeader.astro'
                    }
                });
            }
        }
    };
} 