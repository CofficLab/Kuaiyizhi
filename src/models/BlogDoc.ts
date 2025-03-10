import BlogDB from "@/database/BlogDB";
import { logger } from "@/utils/logger";
import { SidebarItem } from "./SidebarItem";
import type { BlogEntry } from "@/database/BlogDB";
import LinkDB from "@/database/LinkDB";
import Tag from "./Tag";
import BaseDoc from "./BaseDoc";

export default class BlogDoc extends BaseDoc<'blogs', BlogEntry> {
    constructor(entry: BlogEntry) {
        super(entry);
    }

    static fromEntry(entry: BlogEntry) {
        return new BlogDoc(entry);
    }

    getLink(): string {
        return LinkDB.getBlogLink(this.entry.id, this.getLang());
    }

    getTags(): Tag[] {
        const tags = this.entry.data.tags as string[];

        if (!tags || tags.length === 0) {
            return [];
        }

        return tags.map(tag => new Tag(tag, 0, this.getLang()));
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

    async getTopDoc(): Promise<BlogDoc | null> {
        const id = await this.getTopCourseId();
        const doc = await BlogDB.find(id);
        return doc;
    }

    async getChildren(): Promise<BlogDoc[]> {
        return await BlogDB.getChildren(this.entry.id);
    }
} 