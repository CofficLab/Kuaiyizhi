import { appConfig } from "@/config/app";
import { appwriteConfig } from "@/service/appwrite-config";
import { createAdminClient, getKeyFromRuntime } from "@/service/appwrite-server";
import type { APIRoute } from "astro";

export const prerender = false;

export const GET: APIRoute = async ({ url, cookies }) => {
    const endpoint = appwriteConfig.endpoint;
    const project = appwriteConfig.projectId;
    const key = getKeyFromRuntime();

    if (!endpoint || !project || !key) {
        throw new Error("Missing Appwrite environment variables");
    }

    const userId = url.searchParams.get('userId');
    const secret = url.searchParams.get('secret');

    if (!userId || !secret) {
        throw new Error('OAuth2 did not provide userId or secret');
    }

    const { account } = createAdminClient(endpoint, project, key);

    const session = await account.createSession(userId, secret);
    if (!session || !session.secret) {
        throw new Error('Failed to create session from token');
    }

    console.log('Success');

    cookies.set(appConfig.session_key, session.secret, {
        // sameSite: "strict",
        expires: new Date(session.expire),
        // secure: true,
        httpOnly: true,
        path: '/',
    });

    console.log('cookies set');

    return Response.redirect(url.origin, 307);
};
