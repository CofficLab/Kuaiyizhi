import { Client, Account, OAuthProvider } from "appwrite";
import { appwriteConfig } from "@/config/appwrite";
// Initialize Appwrite client
const client = new Client()
    .setEndpoint(appwriteConfig.endpoint)
    .setProject(appwriteConfig.projectId);

// Initialize Account
const account = new Account(client);

// GitHub OAuth login function with improved configuration
export const loginWithGitHub = async () => {
    const currentOrigin = window.location.origin;
    return account.createOAuth2Session(
        OAuthProvider.Github,
        `${currentOrigin}/auth/callback`,  // Success URL
        `${currentOrigin}/auth/error`,     // Failure URL
        ['user', 'account']        // Request user profile and email access
    );
};

export { client, account }; 