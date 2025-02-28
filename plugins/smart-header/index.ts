import type { StarlightPlugin } from '@astrojs/starlight/types'

export default function smartHeaderPlugin(): StarlightPlugin {
    return {
        name: 'smart-header',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Header Plugin initialized!');

                updateConfig({
                    components: {
                        ...config.components,
                        Header: './plugins/smart-header/SmartHeader.astro',
                    },
                });
            }
        }
    };
} 