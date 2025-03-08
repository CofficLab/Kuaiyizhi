import { Client, Account, OAuthProvider } from "appwrite";

import type { Models } from "appwrite";
import { appwriteConfig } from "@/config/appwrite";
import LinkDB from "@/database/LinkDB";
import { createAdminClient } from "@/server/appwrite";

class AppwriteService {
    private client: Client;
    private account: Account;

    constructor() {
        this.client = new Client()
            .setEndpoint(appwriteConfig.endpoint)
            .setProject(appwriteConfig.projectId);

        this.account = new Account(this.client);
    }

    async loginWithGitHubCookie(lang: string): Promise<string | void> {
        const currentOrigin = window.location.origin;
        return this.account.createOAuth2Session(
            OAuthProvider.Github,
            `${currentOrigin}${LinkDB.getAuthCallbackCookieLink(lang)}`,  // Success URL
            `${currentOrigin}${LinkDB.getAuthErrorLink(lang)}`,     // Failure URL
            ['user', 'account']                // Request user profile and email access
        );
    }

    async loginWithGitHubToken(lang: string): Promise<string | void> {
        const currentOrigin = window.location.origin;
        const successUrl = `${currentOrigin}${LinkDB.getAuthCallbackTokenLink(lang)}`;
        const failureUrl = `${currentOrigin}${LinkDB.getAuthErrorLink(lang)}`;

        return this.account.createOAuth2Token(
            OAuthProvider.Github,
            successUrl,
            failureUrl,
            ['user', 'account']                // Request user profile and email access
        );
    }

    async getCurrentUser(): Promise<Models.User<Models.Preferences> | null> {
        try {
            return await this.account.get();
        } catch (error) {
            console.error('Failed to get current user:', error);
            return null;
        }
    }

    async logout(): Promise<void> {
        try {
            // 先检查当前会话
            try {
                await this.account.get();
            } catch (error) {
                // 如果获取用户信息失败，说明已经退出登录
                if (error instanceof Error && error.message.includes('Unauthorized')) {
                    throw new Error(
                        'Already signed out. No active session found.'
                    );
                }
                // 如果是其他错误，继续尝试退出登录
            }

            // 执行退出登录
            await this.account.deleteSession('current');
        } catch (error) {
            console.error('Failed to logout:', error);
            throw error;
        }
    }

    getClient(): Client {
        return this.client;
    }

    getAccount(): Account {
        return this.account;
    }
}

// Create a singleton instance
const appwriteService = new AppwriteService();
export default appwriteService; 