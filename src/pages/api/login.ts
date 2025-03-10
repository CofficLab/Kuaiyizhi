import type { APIRoute } from "astro";
import { createAdminClient, getKeyFromRuntime } from "@/service/appwrite-server";
import { OAuthProvider } from "node-appwrite";
import { appwriteConfig } from "@/service/appwrite-config";
import LinkUtil from "@/utils/link";

export const prerender = false;

/**
 * 生成 OAuth2 的授权链接
 * 
 * @returns 授权链接
 */
export const GET: APIRoute = async ({ url }) => {
	const endpoint = appwriteConfig.endpoint;
	const project = appwriteConfig.projectId;
	const key = getKeyFromRuntime();
	const providerCode = url.searchParams.get('provider');
	let provider: OAuthProvider;
	switch (providerCode) {
		case 'github':
			provider = OAuthProvider.Github;
			break;
		case 'google':
			provider = OAuthProvider.Google;
			break;
		default:
			return new Response('Invalid provider code', { status: 400 });
	}

	if (!endpoint || !project || !key) {
		throw new Error("Missing Appwrite environment variables");
	}

	const { account } = createAdminClient(endpoint, project, key);

	try {
		const redirectUrl = await account.createOAuth2Token(
			provider,
			LinkUtil.getOAuthSuccessLink(url.origin),
			LinkUtil.getOAuthErrorLink(url.origin)
		);

		return new Response(redirectUrl);
	} catch (error) {
		return new Response(
			JSON.stringify({
				error: {
					code: 'LOGIN_FAILED',
					message: error instanceof Error ? error.message : String(error)
				}
			}),
			{
				status: 500,
				headers: {
					'Content-Type': 'application/json'
				}
			}
		);
	}
};