import type { APIRoute } from "astro";

export const GET: APIRoute = async ({ request, url, cookies }) => {
    return new Response('Logout successful');
}
