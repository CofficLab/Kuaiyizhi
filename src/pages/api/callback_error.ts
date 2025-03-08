import { appConfig } from "@/config/app";
import { appwriteConfig } from "@/service/appwrite-config";
import { createAdminClient } from "@/service/appwrite-server";
import type { APIRoute } from "astro";

export const GET: APIRoute = async ({ request, url, cookies }) => {
    return new Response('Error');
};
