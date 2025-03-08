import { Client, Account } from "node-appwrite";

export const SESSION_COOKIE = "kuaiyizhi-session";

export function createAdminClient() {
  const isCloudflarePages = process.env.CF_PAGES;
  const endpoint = process.env.PUBLIC_APPWRITE_ENDPOINT;
  const project = process.env.PUBLIC_APPWRITE_PROJECT;
  const key = process.env.APPWRITE_KEY;

  console.log('isCloudflarePages -------------', isCloudflarePages);
  console.log('endpoint -------------', endpoint);
  console.log('project -------------', project);
  console.log('key -------------', key);

  if (!endpoint || !project || !key) {
    throw new Error("Missing Appwrite environment variables");
  }

  const client = new Client()
    .setEndpoint(endpoint)
    .setProject(project)
    .setKey(key);

  return {
    get account() {
      return new Account(client);
    },
  };
}

export function createSessionClient(request: Request) {
  const client = new Client()
    .setEndpoint(import.meta.env.PUBLIC_APPWRITE_ENDPOINT)
    .setProject(import.meta.env.PUBLIC_APPWRITE_PROJECT);

  const cookies = parseCookies(request.headers.get("cookie") ?? "");
  const session = cookies.get(SESSION_COOKIE);
  if (!session) {
    throw new Error("No session");
  }

  client.setSession(session);

  return {
    get account() {
      return new Account(client);
    },
  };
}

function parseCookies(cookies: string): Map<string, string | null> {
  const map = new Map<string, string | null>();
  for (const cookie of cookies.split(";")) {
    const [name, value] = cookie.split("=");
    map.set(name.trim(), value ?? null);
  }
  return map;
}

