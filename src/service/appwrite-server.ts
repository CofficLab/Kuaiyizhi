import { Client, Account } from "node-appwrite";
import { getSecret } from "astro:env/server";

export function createAdminClient(endpoint: string, project: string, key: string) {
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


/**
 * 获取 Appwrite 的密钥
 * 
 * @astrojs/cloudflare 与其他适配器有些不同。环境变量是针对请求的，不像 Node.js 中是全局的。
 * 这意味着你总是需要在请求范围内使用私密变量：
 * 
 * src/middleware.ts
 * 
 * import { defineMiddleware } from "astro:middleware"
 * import { FOO, getSecret } from "astro:env"
 * 
 * console.log(FOO) // undefined
 * console.log(getSecret("FOO")) // undefined
 * 
 * export const onRequest = defineMiddleware((context, next) => {
 *     console.log(FOO) // boolean
 *     console.log(getSecret("FOO")) // string
 * 
 *     return next()
 * })
 * 
 * @returns 
 */
export function getKeyFromRuntime() {
  const key = getSecret('APPWRITE_KEY');
  if (!key) {
    throw new Error('APPWRITE_KEY is not set');
  }
  return key;
}
