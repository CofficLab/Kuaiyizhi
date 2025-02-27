import { makeLink } from "@/database/link_db";
import type { DataEntry } from "astro:content";

export class Book {
    link: string;
    title: string;

    constructor(link: string, title: string) {
        this.link = link;
        this.title = title;
    }

    static fromDataEntry(dataEntry: DataEntry) {
        let link = makeLink(dataEntry.id);
        return new Book(link, dataEntry.data.title as string);
    }
}