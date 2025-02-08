export interface BlogLayoutProps {
    title: string;
    description: string;
    headings?: Array<{ depth: number; slug: string; text: string }>;
}
