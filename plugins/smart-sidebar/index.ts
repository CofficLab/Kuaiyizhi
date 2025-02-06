import type { StarlightPlugin } from '@astrojs/starlight/types';

export default function smartSidebarPlugin(): StarlightPlugin {
    return {
        name: 'smart-sidebar',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Smart Sidebar Plugin initialized!');

                updateConfig({
                    components: {
                        ...config.components,
                        Sidebar: './plugins/smart-sidebar/Sidebar.astro'
                    }
                });
            }
        }
    };
} 