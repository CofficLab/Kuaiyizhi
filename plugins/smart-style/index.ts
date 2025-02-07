import type { StarlightPlugin } from '@astrojs/starlight/types'

export default function smartStylePlugin(): StarlightPlugin {
    return {
        name: 'smart-style',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Style Plugin initialized!');

                updateConfig({
                    customCss: ['./plugins/smart-style/style.css']
                });
            }
        }
    };
} 