import BlogDB from "@/database/BlogDB";
import { makeLink } from "@/utils/links";
import { logger } from "@/utils/logger";
import { render, type DataEntry, type RenderResult } from "astro:content";
import { SidebarItem } from "./SidebarItem";
import type { BlogEntry } from "@/database/BlogDB";
import LinkDB from "@/database/LinkDB";
import Tag from "./Tag";

export default class BlogDoc {
    entry: BlogEntry;

    constructor(entry: BlogEntry) {
        this.entry = entry;
    }

    static fromEntry(entry: BlogEntry) {
        return new BlogDoc(entry);
    }

    getLink(): string {
        return LinkDB.getBlogLink(this.entry.id, this.getLang());
    }

    /**
     * 获取博客的 ID
     *
     * ID是根据博客的目录结构生成的，例如：
     *  目录结构：
     *  blogs/
     *    zh-cn/
     *      supervisor/
     *        index.md
     *    en/
     *      supervisor/
     *        index.md
     *
     *  ID: zh-cn/supervisor 的 ID 为 zh-cn/supervisor
     *  ID: en/supervisor 的 ID 为 en/supervisor
     *
     * @returns 
     */
    getId(): string {
        return this.entry.id;
    }

    getTitle(): string {
        return this.entry.data.title as string;
    }

    getLang(): string {
        return this.entry.id.split('/')[0];
    }

    /**
     * 获取课程的 slug，slug = pages目录中定义的slug
     *
     * 例如：
     *  ID: zh-cn/supervisor 的 slug 为 supervisor
     *  ID: en/supervisor 的 slug 为 supervisor
     *
     * @returns 
     */
    getSlug(): string {
        // 从 ID 中获取 slug，即删除以/分割后的第一个元素
        return this.getId().split('/').slice(1).join('/');
    }

    getTags(): Tag[] {
        const tags = this.entry.data.tags as string[];

        if (!tags || tags.length === 0) {
            return [];
        }

        return tags.map(tag => new Tag(tag, 0, this.getLang()));
    }

    getDescription(): string {
        return this.entry.data.description as string;
    }

    getDate(): Date {
        return new Date(this.entry.data.date as Date);
    }

    getDateForDisplay() {
        try {
            const dateObj = new Date(this.entry.data.date as Date);

            // Check if date is valid
            if (isNaN(dateObj.getTime())) {
                console.warn(`Invalid date format: ${this.entry.data.date}`);
                return 'Date unavailable: ' + this.getTitle() + ' ' + this.getLink();
            }
            return dateObj.toLocaleDateString('zh-CN', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            });
        } catch (error) {
            console.error(`Error formatting date: ${this.entry.data.date}`, error);
            return 'Date unavailable';
        }
    }

    async render(): Promise<RenderResult> {
        return await render(this.entry);
    }

    async getTopCourseId(): Promise<string> {
        const id = this.entry.id;
        const parts = id.split('/');
        return parts[0] + '/' + parts[1];
    }

    async getTopDoc(): Promise<BlogDoc | null> {
        const id = await this.getTopCourseId();
        const doc = await BlogDB.find(id);
        return doc;
    }

    async getChildren(): Promise<BlogDoc[]> {
        return await BlogDB.getChildren(this.entry.id);
    }

    async toSidebarItem(): Promise<SidebarItem> {
        const debug = false;

        const children = await this.getChildren();
        const childItems = await Promise.all(children.map(child => child.toSidebarItem()));

        if (debug) {
            logger.info(`${this.entry.id} 的侧边栏项目`);
            console.log(childItems);
        }

        return new SidebarItem({
            label: this.getTitle(),
            items: childItems,
            link: this.getLink(),
        });
    }

    async getTopSidebarItem(): Promise<SidebarItem> {
        const topDoc = await this.getTopDoc();
        if (topDoc) {
            return await topDoc.toSidebarItem();
        }

        return new SidebarItem({
            label: this.getTitle(),
            items: [],
            link: this.getLink(),
        });
    }
}