import type { MiddlewareHandler } from 'astro';
import { logger } from './utils/logger';

/**
 * @type {import("astro").MiddlewareHandler}
 */
export const onRequest: MiddlewareHandler = (context, next) => {
    const debug = false;
    if (debug) {
        logger.info(`current path: ${context.url.pathname}`);
    }

    return next();
};