import { ref } from 'vue';
import type { Models } from 'appwrite';

interface UserState {
    isLoggedIn: boolean;
    user: Models.User<Models.Preferences> | null;
}

class UserStore {
    private static instance: UserStore;
    private state;

    private constructor() {
        // 初始化空状态
        this.state = ref<UserState>({
            isLoggedIn: false,
            user: null
        });

        // 仅在浏览器环境中初始化 localStorage
        if (typeof window !== 'undefined') {
            this.initializeFromLocalStorage();
        }
    }

    private initializeFromLocalStorage() {
        const savedUser = localStorage.getItem('user');
        if (savedUser) {
            try {
                const user = JSON.parse(savedUser);
                this.state.value = {
                    isLoggedIn: true,
                    user
                };
            } catch (error) {
                console.error('Failed to parse user from localStorage:', error);
                localStorage.removeItem('user');
            }
        }
    }

    public static getInstance(): UserStore {
        if (!UserStore.instance) {
            UserStore.instance = new UserStore();
        }
        return UserStore.instance;
    }

    public getState() {
        return this.state;
    }

    public setUser(user: Models.User<Models.Preferences> | null) {
        this.state.value.user = user;
        this.state.value.isLoggedIn = !!user;

        // 仅在浏览器环境中操作 localStorage
        if (typeof window !== 'undefined') {
            if (user) {
                localStorage.setItem('user', JSON.stringify(user));
            } else {
                localStorage.removeItem('user');
            }
        }
    }

    public clearUser() {
        this.setUser(null);
    }

    public isLoggedIn(): boolean {
        return this.state.value.isLoggedIn;
    }

    public getUser(): Models.User<Models.Preferences> | null {
        return this.state.value.user;
    }
}

export const userStore = UserStore.getInstance(); 