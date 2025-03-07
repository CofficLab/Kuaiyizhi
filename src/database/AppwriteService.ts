import { Client, Account, OAuthProvider } from "appwrite";
import type { Models } from "appwrite";
import { appwriteConfig } from "@/config/appwrite";
import LinkDB from "@/database/LinkDB";

class AppwriteService {
    private client: Client;
    private account: Account;

    constructor() {
        this.client = new Client()
            .setEndpoint(appwriteConfig.endpoint)
            .setProject(appwriteConfig.projectId);

        this.account = new Account(this.client);
    }

    async loginWithGitHub(lang: string): Promise<string | void> {
        const currentOrigin = window.location.origin;
        return this.account.createOAuth2Session(
            OAuthProvider.Github,
            `${currentOrigin}${LinkDB.getAuthCallbackLink(lang)}`,  // Success URL
            `${currentOrigin}${LinkDB.getAuthErrorLink(lang)}`,     // Failure URL
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