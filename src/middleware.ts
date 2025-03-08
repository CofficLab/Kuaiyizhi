import type { MiddlewareHandler } from 'astro';
import { logger } from './utils/logger';

/**
 * @type {import("astro").MiddlewareHandler}
 */
export const onRequest: MiddlewareHandler = async ({ request }, next) => {
    const debug = false;
    if (debug) {
        logger.info(`current path: ${request.url}`);
    }

    return next();
};