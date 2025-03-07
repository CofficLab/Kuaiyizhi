import { logger } from "@/utils/logger";
import { render, type RenderResult } from "astro:content";
import { SidebarItem } from "./SidebarItem";
import type { CourseEntry } from "@/database/CourseDB";
import CourseDB from "@/database/CourseDB";
import LinkDB from "@/database/LinkDB";

export default class CourseDoc {
    entry: CourseEntry;

    constructor(entry: CourseEntry) {
        this.entry = entry;
    }

    static fromEntry(entry: CourseEntry) {
        return new CourseDoc(entry);
    }

    getLink(): string {
        return LinkDB.getCourseLink(this.entry.id);
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

    async getTopDoc(): Promise<CourseDoc | null> {
        const id = await this.getTopCourseId();
        const doc = await CourseDB.find(id);
        return doc;
    }

    async getChildren(): Promise<CourseDoc[]> {
        return await CourseDB.getChildren(this.entry.id);
    }

    async toSidebarItem(): Promise<SidebarItem> {
        const debug = false;

        let selfItem = new SidebarItem({
            label: this.getTitle(),
            items: [],
            link: this.getLink(),
        });
        const children = await this.getChildren();
        let childItems = await Promise.all(children.map(child => child.toSidebarItem()));

        if (this.isBook()) {
            childItems = [...childItems]
        }

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

    isBook(): boolean {
        return this.entry.id.split('/').length === 2;
    }
}