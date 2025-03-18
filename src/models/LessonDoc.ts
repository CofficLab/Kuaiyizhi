import type { LessonEntry } from "@/database/LessonDB";
import lessonDB from "@/database/LessonDB";
import { logger } from "@/utils/logger";
import { SidebarItem } from "./SidebarItem";
import type { Heading } from "./Heading";
import LinkUtil from "@/utils/link";
import { HierarchicalDoc } from "./BaseDoc";
import { COLLECTION_NAME } from "@/database/LessonDB";

export default class LessonDoc extends HierarchicalDoc<typeof COLLECTION_NAME, LessonEntry> {
    constructor(entry: LessonEntry) {
        super(entry);
    }

    isBook(): boolean {
        return this.entry.id.split('/').length === 2;
    }

    async getBookId(): Promise<string> {
        return await this.getTopDocId();
    }

    async getBook(): Promise<LessonDoc | null> {
        const bookId = await this.getBookId();
        return await lessonDB.find(bookId);
    }

    getLink(): string {
        const debug = false;
        const lang = this.getLang();
        let link = LinkUtil.getLessonLink(lang, this.getId());

        if (debug) {
            logger.info(`获取 ${this.entry.id} 的链接: ${link}`);
        }

        return link;
    }

    /**
     * 获取文档的语言
     * 
     * 文档的 id 格式为 `book-id/zh-cn/chapter-id/lesson-id`
     * 
     * @returns 语言
     */
    override getLang(): string {
        const debug = false;

        const parts = this.entry.id.split('/');
        const lang = parts[1];

        if (debug) {
            logger.info(`获取 ${this.entry.id} 的语言: ${lang}`);
        }

        return lang;
    }

    getHTML(): string {
        const debug = false;

        if (debug) {
            logger.info(`获取 ${this.entry.id} 的 HTML`);
        }

        return this.entry.rendered?.html || '';
    }

    getHeadings(): Heading[] {
        const debug = false;

        if (debug) {
            logger.info(`获取 ${this.entry.id} 的 headings`);
        }

        return this.entry.rendered?.metadata?.headings as Heading[] || [];
    }

    async getTopDoc(): Promise<LessonDoc | null> {
        const bookId = await this.getBookId();
        return await lessonDB.find(bookId);
    }

    async getChildren(): Promise<LessonDoc[]> {
        return (await lessonDB.getChildren(this.entry.id)).sort((a, b) => {
            const aId = a.getId();
            const bId = b.getId();

            return aId.localeCompare(bId);
        });
    }

    async getDescendants(): Promise<LessonDoc[]> {
        return await lessonDB.getDescendantDocs(this.entry.id);
    }

    override async toSidebarItem(): Promise<SidebarItem> {
        const debug = false;

        const selfItem = new SidebarItem({
            label: this.getTitle(),
            link: this.getLink(),
        });

        const children = await this.getChildren();
        let childItems = await Promise.all(children.map(child => child.toSidebarItem()));

        if (this.isBook()) {
            childItems = [...childItems];
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
}