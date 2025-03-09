import type { APIRoute } from "astro";
import { createSessionClient } from "@/service/appwrite-server";

export const prerender = false;

export const GET: APIRoute = async ({ request, url, cookies }) => {
    const { account } = createSessionClient(request);
    await account.deleteSession('current');

    cookies.delete('session', { path: '/' });

    return new Response('Logout successful');
}
