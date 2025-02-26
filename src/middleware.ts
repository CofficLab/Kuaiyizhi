import type { MiddlewareHandler } from 'astro';
import { logger } from './utils/logger';

/**
 * @type {import("astro").MiddlewareHandler}
 */
export const onRequest: MiddlewareHandler = (context, next) => {
    logger.info(`current path: ${context.url.pathname}`);

    return next();
};