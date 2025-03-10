import type { LessonEntry } from "@/database/LessonDB";
import LessonDB from "@/database/LessonDB";
import { logger } from "@/utils/logger";
import { SidebarItem } from "./SidebarItem";
import type { Heading } from "./Heading";
import { type RenderResult } from "astro:content";
import LinkUtil from "@/utils/link";
import BaseDoc from "./BaseDoc";

export default class LessonDoc extends BaseDoc<'lessons', LessonEntry> {
    constructor(entry: LessonEntry) {
        super(entry);
    }

    static async allTopDocs(): Promise<LessonDoc[]> {
        const db = LessonDB.getInstance();
        return await db.allTopLevelDocs();
    }

    static async all(): Promise<LessonDoc[]> {
        const db = LessonDB.getInstance();
        return await db.allTopLevelDocs();
    }

    static async allByDepth(depth: number): Promise<LessonDoc[]> {
        const db = LessonDB.getInstance();
        return await db.getDocsByDepth(depth);
    }

    static async allByDepthAndLang(depth: number, lang: string): Promise<LessonDoc[]> {
        const db = LessonDB.getInstance();
        return await db.getEntriesByDepthAndLang(depth, lang);
    }

    static async find(id: string): Promise<LessonDoc | null> {
        const db = LessonDB.getInstance();
        return await db.find(id);
    }

    isBook(): boolean {
        return this.entry.id.split('/').length === 2;
    }

    getParentId(): string | null {
        const parts = this.entry.id.split('/');
        return parts.length > 1 ? parts[parts.length - 2] : null;
    }

    getBookId(): string {
        const parts = this.entry.id.split('/');
        return parts[0] + '/' + parts[1];
    }

    async getBook(): Promise<LessonDoc | null> {
        const bookId = this.getBookId();
        return await LessonDoc.find(bookId);
    }

    getLevel(): number {
        return this.entry.id.split('/').length;
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
    getLang(): string {
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
        const bookId = this.getBookId();
        return await LessonDoc.find(bookId);
    }

    async getChildren(): Promise<LessonDoc[]> {
        const db = LessonDB.getInstance();
        return await db.getChildren(this.entry.id);
    }

    async getDescendants(): Promise<LessonDoc[]> {
        const db = LessonDB.getInstance();
        return await db.getDescendantDocs(this.entry.id);
    }

    async toSidebarItem(): Promise<SidebarItem> {
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