import type { StarlightPlugin } from '@astrojs/starlight/types'

export default function smartHeaderPlugin(): StarlightPlugin {
    return {
        name: 'smart-header',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Header Plugin initialized!');

                updateConfig({
                    customCss: ['./plugins/smart-style/style.css']
                });
            }
        }
    };
} 