import type SidebarItem from "./SidebarItem";

export interface AppLayoutProps {
    title: string;
    description: string;
    template: "splash" | "doc";
    frontmatter: {
        title: string;
        description: string;
        template: "splash" | "doc";
    };
    hasSidebar: boolean;
    headings: Array<{ depth: number; slug: string; text: string }>;
    sidebar: SidebarItem[];
}