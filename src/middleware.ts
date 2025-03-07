import type { MiddlewareHandler } from 'astro';
import { logger } from './utils/logger';
import { createSessionClient } from "./server/appwrite";

/**
 * @type {import("astro").MiddlewareHandler}
 */
export const onRequest: MiddlewareHandler = async ({ request, locals }, next) => {
    const debug = false;
    if (debug) {
        logger.info(`current path: ${request.url}`);
    }

    return next();
};