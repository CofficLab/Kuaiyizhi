import { logger } from "@/utils/logger";
import { render, type RenderResult } from "astro:content";
import { SidebarItem } from "./SidebarItem";
import type { MetaEntry } from "@/database/MetaDB";
import MetaDB from "@/database/MetaDB";
import LinkDB from "@/database/LinkDB";

export default class MetaDoc {
    entry: MetaEntry;

    constructor(entry: MetaEntry) {
        this.entry = entry;
    }

    static fromEntry(entry: MetaEntry) {
        return new MetaDoc(entry);
    }

    getLink(): string {
        return LinkDB.getMetaLink(this.getLang(), this.getSlug());
    }

    /**
     * 获取课程的 ID
     *
     * ID是根据课程的目录结构生成的，例如：
     *  目录结构：
     *  courses/
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

    getDescription(): string {
        return this.entry.data.description as string;
    }

    async render(): Promise<RenderResult> {
        return await render(this.entry);
    }

    async getTopCourseId(): Promise<string> {
        const id = this.entry.id;
        const parts = id.split('/');
        return parts[0] + '/' + parts[1];
    }

    async getTopDoc(): Promise<MetaDoc | null> {
        const id = await this.getTopCourseId();
        const doc = await MetaDB.find(id);
        return doc;
    }

    async getChildren(): Promise<MetaDoc[]> {
        return await MetaDB.getChildren(this.entry.id);
    }

    async getSiblingDocs(): Promise<MetaDoc[]> {
        return await MetaDB.getSiblingDocs(this.entry.id);
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

    async getSiblingSidebarItems(): Promise<SidebarItem[]> {
        const siblings = await this.getSiblingDocs();
        const siblingItems = await Promise.all(siblings.map(sibling => sibling.toSidebarItem()));
        return siblingItems;
    }

    async getTopSidebarItem(): Promise<SidebarItem> {
        return new SidebarItem({
            label: "了解我们",
            items: await this.getSiblingSidebarItems(),
            link: this.getLink(),
        });
    }
}