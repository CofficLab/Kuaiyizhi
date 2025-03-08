import type { MiddlewareHandler } from 'astro';
import { logger } from './utils/logger';
import { createSessionClient } from "./server/appwrite";
import { getSecret } from "astro:env/server";
/**
 * @type {import("astro").MiddlewareHandler}
 */
export const onRequest: MiddlewareHandler = async ({ request, locals }, next) => {
    const debug = false;
    if (debug) {
        logger.info(`current path: ${request.url}`);
    }

    const endpoint = process.env.PUBLIC_APPWRITE_ENDPOINT;
    const project = process.env.PUBLIC_APPWRITE_PROJECT;
    const key = process.env.APPWRITE_KEY
    const endpoint2 = import.meta.env.PUBLIC_APPWRITE_ENDPOINT;
    const project2 = import.meta.env.PUBLIC_APPWRITE_PROJECT;
    const key2 = import.meta.env.APPWRITE_KEY;

    console.log('endpoint -------------', endpoint);
    console.log('project -------------', project);
    console.log('key -------------', key);
    console.log('locals -------------', locals);
    console.log('endpoint2 -------------', endpoint2);
    console.log('project2 -------------', project2);
    console.log('key2 -------------', key2);
    console.log('getSecret -------------', getSecret('APPWRITE_KEY'));

    return next();
};