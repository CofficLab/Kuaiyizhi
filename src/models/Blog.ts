import { makeLink } from "@/utils/links";
import type { DataEntry } from "astro:content";

export class Blog {
    link: string;
    title: string;
    date: string;
    tags?: string[];
    content: string;

    constructor(link: string, title: string, date: string, tags: string[], content: string) {
        this.link = link;
        this.title = title;
        this.date = date;
        this.tags = tags;
        this.content = content;
    }

    static fromDataEntry(dataEntry: DataEntry) {
        let link = makeLink(dataEntry.id);
        let title = dataEntry.data.title as string;
        let date = dataEntry.data.date as string;
        let tags = dataEntry.data.tags as string[];
        let content = dataEntry.body ?? '';
        return new Blog(link, title, date, tags, content);
    }

    getDateForDisplay() {
        try {
            const dateObj = new Date(this.date);
            // Check if date is valid
            if (isNaN(dateObj.getTime())) {
                console.warn(`Invalid date format: ${this.date}`);
                return 'Date unavailable: ' + this.title + ' ' + this.link;
            }
            return dateObj.toLocaleDateString('zh-CN', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            });
        } catch (error) {
            console.error(`Error formatting date: ${this.date}`, error);
            return 'Date unavailable';
        }
    }
}