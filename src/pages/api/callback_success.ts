import { appConfig } from "@/config/app";
import { appwriteConfig } from "@/service/appwrite-config";
import LinkDB from "@/database/LinkDB";
import { createAdminClient, getKeyFromRuntime } from "@/service/appwrite-server";
import type { APIRoute } from "astro";

export const GET: APIRoute = async ({ request, url, cookies }) => {
    const endpoint = appwriteConfig.endpoint;
    const project = appwriteConfig.projectId;
    const key = getKeyFromRuntime();

    if (!endpoint || !project || !key) {
        throw new Error("Missing Appwrite environment variables");
    }

    const userId = url.searchParams.get('userId');
    const secret = url.searchParams.get('secret');

    console.log('完整URL:', url.toString());
    console.log('搜索参数:', url.searchParams.toString());
    console.log('userId:', userId);
    console.log('secret:', secret);

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

    return Response.redirect(LinkDB.getDashboardUrl('zh-cn'));
};
