import type { StarlightPlugin } from '@astrojs/starlight/types';
import Search from './Search.astro';

// interface StarlightPlugin {
//     name: string;
//     hooks: {
//         setup: (options: {
//             config: StarlightUserConfig;
//             updateConfig: (newConfig: StarlightUserConfig) => void;
//             addIntegration: (integration: AstroIntegration) => void;
//             astroConfig: AstroConfig;
//             command: 'dev' | 'build' | 'preview';
//             isRestart: boolean;
//             logger: AstroIntegrationLogger;
//             injectTranslations: (Record<string, Record<string, string>>) => void;
//         }) => void | Promise<void>;
//     };
// }

export default function hideSearchPlugin(): StarlightPlugin {
    return {
        name: 'hide-search',
        hooks: {
            setup({ logger, updateConfig, config }) {
                logger.info('Hide Search Plugin initialized!');

                updateConfig({
                    components: {
                        Search: './plugins/hide-search/Search.astro'
                    }
                });
            }
        }
    };
} 