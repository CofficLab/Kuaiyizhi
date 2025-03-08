import type { APIRoute } from "astro";
import { createAdminClient, getKeyFromRuntime } from "@/service/appwrite-server";
import { OAuthProvider } from "node-appwrite";
import { appwriteConfig } from "@/service/appwrite-config";
import LinkDB from "@/database/LinkDB";

/**
 * 生成 OAuth2 的授权链接
 * 
 * @returns Redirect to the OAuth2 provider
 */
export const GET: APIRoute = async ({ redirect, url }) => {
  const endpoint = appwriteConfig.endpoint;
  const project = appwriteConfig.projectId;
  const key = getKeyFromRuntime();

  if (!endpoint || !project || !key) {
    throw new Error("Missing Appwrite environment variables");
  }

  const { account } = createAdminClient(endpoint, project, key);
  const redirectUrl = await account.createOAuth2Token(
    OAuthProvider.Github,
    LinkDB.getOAuthSuccessLink(url.origin),
    LinkDB.getOAuthErrorLink(url.origin)
  );

  return redirect(redirectUrl);
};