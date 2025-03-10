import { logger } from "@/utils/logger";
import { SidebarItem } from "./SidebarItem";
import type { CourseEntry } from "@/database/CourseDB";
import CourseDB from "@/database/CourseDB";
import LinkDB from "@/database/LinkDB";
import BaseDoc from "./BaseDoc";

export default class CourseDoc extends BaseDoc<'courses', CourseEntry> {
    constructor(entry: CourseEntry) {
        super(entry);
    }

    static fromEntry(entry: CourseEntry) {
        return new CourseDoc(entry);
    }

    getLink(): string {
        return LinkDB.getCourseLink(this.entry.id);
    }

    async getTopDoc(): Promise<CourseDoc | null> {
        const id = await this.getTopCourseId();
        const doc = await CourseDB.getInstance().find(id);
        return doc;
    }

    async getChildren(): Promise<CourseDoc[]> {
        return await CourseDB.getInstance().getChildren(this.entry.id);
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

    isBook(): boolean {
        return this.entry.id.split('/').length === 2;
    }
} 