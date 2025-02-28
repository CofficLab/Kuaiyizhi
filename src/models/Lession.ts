import { makeLink } from "@/utils/links";
import type { DataEntry } from "astro:content";

export class Lession {
    link: string;
    title: string;

    constructor(link: string, title: string) {
        this.link = link;
        this.title = title;
    }

    static fromDataEntry(dataEntry: DataEntry) {
        let link = makeLink(dataEntry.id);
        return new Lession(link, dataEntry.data.title as string);
    }
}