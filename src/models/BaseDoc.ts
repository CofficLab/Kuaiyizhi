import { render, type RenderResult, type CollectionEntry, type DataEntryMap } from "astro:content";
import { SidebarItem } from "./SidebarItem";
import { logger } from "@/utils/logger";

export default abstract class BaseDoc<Collection extends keyof DataEntryMap, T extends CollectionEntry<Collection>> {
    protected entry: T;

    constructor(entry: T) {
        this.entry = entry;
    }

    getId(): string {
        return this.entry.id;
    }

    getTitle(): string {
        return this.entry.data.title as string;
    }

    getLang(): string {
        return this.entry.id.split('/')[0];
    }

    getSlug(): string {
        return this.getId().split('/').slice(1).join('/');
    }

    getDescription(): string {
        return this.entry.data.description as string;
    }

    abstract getLink(): string;

    async render(): Promise<RenderResult> {
        return await render(this.entry);
    }

    async getTopCourseId(): Promise<string> {
        const id = this.entry.id;
        const parts = id.split('/');
        return parts[0] + '/' + parts[1];
    }

    abstract getTopDoc(): Promise<BaseDoc<Collection, T> | null>;
    abstract getChildren(): Promise<BaseDoc<Collection, T>[]>;

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