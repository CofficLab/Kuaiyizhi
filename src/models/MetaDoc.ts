import { logger } from "@/utils/logger";
import { SidebarItem } from "./SidebarItem";
import type { MetaEntry } from "@/database/MetaDB";
import LinkUtil from "@/utils/link";
import BaseDoc from "./BaseDoc";
import metaDB from "@/database/MetaDB";

export default class MetaDoc extends BaseDoc<'meta', MetaEntry> {
    constructor(entry: MetaEntry) {
        super(entry);
    }

    static fromEntry(entry: MetaEntry) {
        return new MetaDoc(entry);
    }

    getLink(): string {
        return LinkUtil.getMetaLink(this.getLang(), this.getSlug());
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

    async getTopCourseId(): Promise<string> {
        const id = this.entry.id;
        const parts = id.split('/');
        return parts[0] + '/' + parts[1];
    }

    async getTopDoc(): Promise<MetaDoc | null> {
        const id = await this.getTopCourseId();
        return await metaDB.find(id);
    }

    async getChildren(): Promise<MetaDoc[]> {
        return await metaDB.getChildren(this.entry.id);
    }

    async getSiblingDocs(): Promise<MetaDoc[]> {
        return await metaDB.getSiblings(this.entry.id);
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

    override async getTopSidebarItem(): Promise<SidebarItem> {
        return new SidebarItem({
            label: "了解我们",
            items: await this.getSiblingSidebarItems(),
            link: '',
        });
    }
}