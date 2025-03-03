export interface BadgeConfig {
    text: string;
    variant?: 'note' | 'tip' | 'caution' | 'danger' | 'success' | 'default';
    class?: string;
}