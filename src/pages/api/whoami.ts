import { createSessionClient } from "@/service/appwrite-server";
import type { APIRoute } from "astro";

export const prerender = false;

/**
 * 获取当前用户信息
 * @param locals 上下文
 * @param request 请求
 * 
 * @returns 用户信息，例如：
 * 
 * {
 *     "$id": "67cba9e0448beaa49568",
 *     "$createdAt": "2025-03-08T02:22:24.282+00:00",
 *     "$updatedAt": "2025-03-09T05:05:35.830+00:00",
 *     "name": "Nookery",
 *     "registration": "2025-03-08T02:22:24.280+00:00",
 *     "status": true,
 *     "labels": [],
 *     "passwordUpdate": "",
 *     "email": "nooks@qq.com",
 *     "phone": "",
 *     "emailVerification": true,
 *     "phoneVerification": false,
 *     "mfa": false,
 *     "prefs": {},
 *     "targets": [
 *         {
 *             "$id": "67cba9e054cc13cb476f",
 *             "$createdAt": "2025-03-08T02:22:24.347+00:00",
 *             "$updatedAt": "2025-03-08T02:22:24.347+00:00",
 *             "name": "",
 *             "userId": "67cba9e0448beaa49568",
 *             "providerId": null,
 *             "providerType": "email",
 *             "identifier": "nobody@qq.com",
 *             "expired": false
 *         }
 *     ],
 *     "accessedAt": "2025-03-09T05:05:23.860+00:00"
 * }
 */
export const GET: APIRoute = async ({ request }) => {
    try {
        const { account } = createSessionClient(request);
        const user = await account.get();

        return new Response(JSON.stringify(user), {
            headers: {
                'Content-Type': 'application/json'
            }
        });
    } catch (error) {
        console.error('whoami error', error);
        return new Response(
            JSON.stringify({
                error: {
                    code: 'UNAUTHORIZED',
                    message: 'User is not authenticated'
                }
            }),
            {
                status: 401,
                headers: {
                    'Content-Type': 'application/json'
                }
            }
        );
    }
};