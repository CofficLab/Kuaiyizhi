import type { APIRoute } from "astro";
import { createAdminClient, SESSION_COOKIE } from "../../server/appwrite";
import { OAuthProvider } from "node-appwrite";

export const prerender = false;

export const POST: APIRoute = async ({ redirect, url }) => {
  const { account } = createAdminClient();

  const successUrl = `${url.origin}/zh-cn/auth/callback_ssr`;
  const failedUrl = `${url.origin}/zh-cn/auth/failed`;
  console.log('url -------------', url);
  console.log('url.origin -------------', url.origin);
  console.log('successUrl -------------', successUrl);
  console.log('failedUrl -------------', failedUrl);

  const redirectUrl = await account.createOAuth2Token(
    OAuthProvider.Github,
    successUrl,
    failedUrl
  );

  console.log('redirectUrl -------------', redirectUrl);

  return redirect(redirectUrl);
};

export const GET: APIRoute = async ({ cookies, redirect, url }) => {
  const userId = url.searchParams.get("userId");
  const secret = url.searchParams.get("secret");

  console.log('userId -------------', userId);
  console.log('secret -------------', secret);

  if (!userId || !secret) {
    throw new Error("OAuth2 did not provide userId or secret");
  }

  const { account } = createAdminClient();

  const session = await account.createSession(userId, secret);
  if (!session || !session.secret) {
    throw new Error("Failed to create session from token");
  }

  cookies.set(SESSION_COOKIE, session.secret, {
    // sameSite: "strict",
    expires: new Date(session.expire),
    // secure: true,
    httpOnly: true,
    path: "/",
  });

  return redirect("/account");
  // return new Response("Hello World");
};