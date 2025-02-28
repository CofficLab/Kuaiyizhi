import { makeLink } from "@/utils/links";

export class SidebarItem {
    private label: string;
    private link?: string;
    private docId?: string;
    private items?: SidebarItem[];

    constructor(config: {
        label: string;
        items?: SidebarItem[];
    }) {
        this.label = config.label;
        this.items = config.items;
    }

    setDocId(docId: string): this {
        this.docId = docId;
        return this;
    }

    setLink(link: string): this {
        this.link = link;
        return this;
    }

    // 判断是否是分组（有子项目）
    isGroup(): boolean {
        return !!this.items && this.items.length > 0;
    }

    isNotGroup(): boolean {
        return !this.isGroup();
    }

    // 判断是否是链接
    isLink(): boolean {
        return !!this.link;
    }

    // 判断是否是文档
    isDoc(): boolean {
        return !!this.docId;
    }

    getLabel(): string {
        return this.label;
    }

    getLink(): string {
        if (this.isDoc() && this.docId) {
            return makeLink(this.docId);
        }

        return this.link || '/';
    }

    getItems(): SidebarItem[] {
        return this.items || [];
    }
} 