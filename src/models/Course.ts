import { makeLink } from "@/utils/links";
import type { DataEntry } from "astro:content";

export class Course {
    link: string;
    title: string;

    constructor(link: string, title: string) {
        this.link = link;
        this.title = title;
    }

    static fromDataEntry(dataEntry: DataEntry) {
        let link = makeLink(dataEntry.id);
        return new Course(link, dataEntry.data.title as string);
    }
}