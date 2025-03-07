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

// Check and refresh OAuth session if needed
export const checkAndRefreshSession = async () => {
    try {
        // First try to get the current session
        let session;
        try {
            session = await account.getSession('current');
        } catch (e) {
            // If session not found, try to get the last session
            const sessions = await account.listSessions();
            session = sessions.sessions[sessions.sessions.length - 1];
            if (!session) {
                throw new Error('No active session found');
            }
        }

        // Check if token is about to expire (within next 1 hour)
        const expiryTime = new Date(session.providerAccessTokenExpiry).getTime();
        const now = new Date().getTime();
        const oneHour = 60 * 60 * 1000;

        if (expiryTime - now < oneHour) {
            // Token will expire soon, refresh it
            await account.updateSession(session.$id);
        }

        return {
            provider: session.provider,
            providerUid: session.providerUid,
            accessToken: session.providerAccessToken,
            isValid: true
        };
    } catch (error) {
        console.error('Session check failed:', error);
        return {
            provider: null,
            providerUid: null,
            accessToken: null,
            isValid: false,
            error
        };
    }
};

// Get user profile from GitHub
export const getGitHubProfile = async (accessToken: string) => {
    try {
        const response = await fetch('https://api.github.com/user', {
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/vnd.github.v3+json'
            }
        });

        if (!response.ok) {
            throw new Error('Failed to fetch GitHub profile');
        }

        return await response.json();
    } catch (error) {
        console.error('Failed to fetch GitHub profile:', error);
        throw error;
    }
};

export { client, account }; 