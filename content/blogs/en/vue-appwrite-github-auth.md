---
title: Implementing GitHub Login in Vue with Appwrite
date: 2024-03-20
excerpt: This article provides a detailed guide on integrating Appwrite cloud services into a Vue project to implement GitHub third-party login, covering environment setup, authentication flow, and code implementation.
authors:
  - name: Nookery
    picture: https://avatars.githubusercontent.com/u/5194193?s=200
    url: https://github.com/nookery
tags:
  - Vue.js
  - Appwrite
  - GitHub
  - Authentication
---

## Introduction

In modern web application development, social media login has become a standard feature. This article will demonstrate how to quickly implement GitHub login functionality in a Vue project using Appwrite cloud services. Appwrite is an open-source Backend-as-a-Service (BaaS) platform that provides rich APIs and SDKs, helping developers easily implement user authentication, database, storage, and other functionalities.

## Prerequisites

### 1. GitHub OAuth Application Setup

1. Log into GitHub and navigate to Settings > Developer settings > OAuth Apps
2. Click "New OAuth App" to create a new application
3. Fill in the application information:
   - Application name: Your application name
   - Homepage URL: Application homepage URL (e.g., http://localhost:3000)
   - Authorization callback URL: Authentication callback URL (e.g., http://localhost:3000/auth/callback)
4. After creation, note down the Client ID and Client Secret

### 2. Appwrite Platform Configuration

1. Register and log into the Appwrite console
2. Create a new project
3. Add platform in project settings:
   - Select Web platform
   - Add project domain (use localhost for development)
4. In Authentication settings:
   - Enable GitHub OAuth provider
   - Configure GitHub Client ID and Client Secret

### 3. Vue Project Environment Setup

```bash
# Create Vue project (if it's a new project)
npm create vue@latest my-vue-app

# Install Appwrite SDK
npm install appwrite

# Install Vue Router (if needed)
npm install vue-router
```

## Implementation Steps

### 1. Configure Appwrite Service

Create `src/services/appwrite.js` file:

```javascript
import { Client, Account } from 'appwrite';

// Initialize Appwrite client
const client = new Client()
    .setEndpoint('Your Appwrite API Endpoint') // e.g., https://cloud.appwrite.io/v1
    .setProject('Your Project ID');

// Export Account instance for authentication operations
export const account = new Account(client);
```

### 2. Create Login Component

Create `src/components/GitHubLogin.vue` component:

```vue
<template>
  <div class="github-login">
    <button @click="handleLogin" :disabled="loading">
      {{ loading ? 'Logging in...' : 'Login with GitHub' }}
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { account } from '../services/appwrite';
import { useRouter } from 'vue-router';

const router = useRouter();
const loading = ref(false);

const handleLogin = async () => {
  try {
    loading.value = true;
    // Create GitHub OAuth session
    await account.createOAuth2Session(
      'github',
      'http://localhost:3000/auth/callback', // Success callback URL
      'http://localhost:3000/auth/error'     // Error callback URL
    );
  } catch (error) {
    console.error('GitHub login failed:', error);
    loading.value = false;
  }
};
</script>

<style scoped>
.github-login button {
  padding: 10px 20px;
  background-color: #24292e;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.github-login button:disabled {
  background-color: #6e7681;
  cursor: not-allowed;
}
</style>
```

### 3. Create Callback Handler Component

Create `src/components/AuthCallback.vue` component:

```vue
<template>
  <div class="auth-callback">
    <p v-if="loading">Processing login...</p>
    <p v-if="error">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { account } from '../services/appwrite';
import { useRouter } from 'vue-router';

const router = useRouter();
const loading = ref(true);
const error = ref('');

onMounted(async () => {
  try {
    // Get current session information
    const session = await account.getSession('current');
    
    // Get user information
    const user = await account.get();
    
    // Store user information locally
    localStorage.setItem('user', JSON.stringify(user));
    
    // Login successful, redirect to homepage
    router.push('/');
  } catch (err) {
    error.value = 'Authentication failed: ' + err.message;
  } finally {
    loading.value = false;
  }
});
</script>
```

### 4. Configure Router

Add route configuration in `src/router/index.js`:

```javascript
import { createRouter, createWebHistory } from 'vue-router';
import GitHubLogin from '../components/GitHubLogin.vue';
import AuthCallback from '../components/AuthCallback.vue';

const routes = [
  {
    path: '/login',
    component: GitHubLogin
  },
  {
    path: '/auth/callback',
    component: AuthCallback
  },
  {
    path: '/auth/error',
    component: () => import('../components/AuthError.vue')
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
```

## Usage and Testing

1. Start Vue development server:
```bash
npm run dev
```

2. Visit the login page (e.g., http://localhost:3000/login)

3. Click "Login with GitHub" button

4. Authorize GitHub access

5. Wait for callback processing to complete, automatic redirect to homepage

## Security Considerations

1. **Environment Variables**: Store Appwrite configuration in `.env` file:

```env
VITE_APPWRITE_ENDPOINT=Your Appwrite API Endpoint
VITE_APPWRITE_PROJECT_ID=Your Project ID
```

2. **Session Management**:
- Regularly check session status
- Implement logout functionality
- Handle session expiration

```javascript
// Check session status
const checkSession = async () => {
  try {
    await account.getSession('current');
    return true;
  } catch {
    return false;
  }
};

// Logout functionality
const logout = async () => {
  try {
    await account.deleteSession('current');
    localStorage.removeItem('user');
    router.push('/login');
  } catch (error) {
    console.error('Logout failed:', error);
  }
};
```

## Common Issues

1. **Cross-Origin Issues**: Ensure correct domain is added in Appwrite platform configuration

2. **Callback URL Error**: Verify callback URL configuration matches between GitHub OAuth application and Appwrite platform

3. **Safari ITP Impact on Login**: Safari's Intelligent Tracking Prevention (ITP) may affect login functionality

- **Issue Principle**:
  - Safari's ITP feature limits third-party cookie access
  - Appwrite as a third-party service needs to store authentication cookies in the browser
  - ITP blocks websites from reading these third-party cookies, causing session state loss

- **Solutions**:
  1. Prompt users to temporarily disable "Prevent Cross-Site Tracking" in Safari
  2. Deploy Appwrite service with a custom domain as same-domain service
  3. Implement alternative local storage authentication scheme

4. **Session State Anomalies**: Implement retry mechanism

```javascript
const retryOperation = async (operation, maxAttempts = 3) => {
  for (let attempt = 1; attempt <= maxAttempts; attempt++) {
    try {
      return await operation();
    } catch (error) {
      if (attempt === maxAttempts) throw error;
      await new Promise(resolve => setTimeout(resolve, 1000 * attempt));
    }
  }
};
```

## Summary

Implementing GitHub login through Appwrite cloud service has several advantages:

1. **Quick Integration**: No need to build backend services
2. **Secure and Reliable**: Uses standard OAuth2.0 protocol
3. **Easy Maintenance**: Appwrite provides complete management interface
4. **Scalability**: Support for adding other social login methods

The implementation approach described in this article is suitable for most small to medium-sized Vue projects. For larger projects, more complex authentication flows and user permission management may need to be considered.

## References

- [Appwrite Documentation](https://appwrite.io/docs)
- [Vue.js Official Documentation](https://vuejs.org/)
- [GitHub OAuth Documentation](https://docs.github.com/en/developers/apps/building-oauth-apps)