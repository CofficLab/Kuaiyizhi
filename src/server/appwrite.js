// src/server/appwrite.js

import { Client, Account } from 'node-appwrite';

// The name of your cookie that will store the session
export const SESSION_COOKIE = 'my-custom-session';

// Admin client, used to create new accounts
export function createAdminClient() {
  const client = new Client()
    .setEndpoint(import.meta.env.PUBLIC_APPWRITE_ENDPOINT)
    .setProject(import.meta.env.PUBLIC_APPWRITE_PROJECT)
    .setKey(import.meta.env.APPWRITE_KEY); // Set the API key here!

  // Return the services you need
  return {
    get account() {
      return new Account(client);
    },
  };
}

// Session client, used to make requests on behalf of the logged in user
export function createSessionClient(request) {
  const client = new Client()
    .setEndpoint(import.meta.env.PUBLIC_APPWRITE_ENDPOINT)
    .setProject(import.meta.env.PUBLIC_APPWRITE_PROJECT);

  // Get the session cookie from the request and set the session
  const cookies = parseCookies(request.headers.get('cookie') ?? '');
  const session = cookies.get(SESSION_COOKIE);
  if (!session) {
    throw new Error('Session cookie not found');
  }

  client.setSession(session);

  // Return the services you need
  return {
    get account() {
      return new Account(client);
    },
  };
}

// Helper function to parse cookies
function parseCookies(cookies) {
  const map = new Map();
  for (const cookie of cookies.split(';')) {
    const [name, value] = cookie.split('=');
    map.set(name.trim(), value ?? null);
  }
  return map;
}
