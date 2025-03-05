import type { LessonEntry } from "@/database/LessonDB";
import LessonDB from "@/database/LessonDB";
import { logger } from "@/utils/logger";
import { SidebarItem } from "./SidebarItem";
import type { Heading } from "./Heading";
import { render, type RenderResult } from "astro:content";
import LinkDB from "@/database/LinkDB";

export default class LessonDoc {
    entry: LessonEntry;

    constructor(entry: LessonEntry) {
        this.entry = entry;
    }

    static async allTopDocs(): Promise<LessonDoc[]> {
        return (await LessonDoc.allByDepth(2)) as LessonDoc[];
    }

    static async allTopDocsByLang(lang: string): Promise<LessonDoc[]> {
        return (await LessonDoc.allByDepthAndLang(2, lang)) as LessonDoc[];
    }

    static async all(): Promise<LessonDoc[]> {
        return (await LessonDB.getEntries())
            .map(entry => new LessonDoc(entry));
    }

    static async allByDepth(depth: number): Promise<LessonDoc[]> {
        return (await LessonDB.getEntriesByDepth(depth))
            .map(entry => new LessonDoc(entry));
    }

    static async allByDepthAndLang(depth: number, lang: string): Promise<LessonDoc[]> {
        return (await LessonDB.getEntriesByDepthAndLang(depth, lang))
            .map(entry => new LessonDoc(entry));
    }

    static async find(id: string): Promise<LessonDoc | null> {
        const entry = await LessonDB.getEntry(id);
        return entry ? new LessonDoc(entry) : null;
    }

    static async getStaticPaths() {
        const debug = false;
        const entries = await LessonDB.getEntries();

        if (debug) {
            logger.array('所有文档', entries);
        }

        // doc.id: supervisor/zh-cn/index.md
        // 对应的lang: zh-cn
        // 对应的slug: supervisor/index.md，即去掉lang后的路径

        const paths = entries.map((entry) => {
            const id = entry.id;
            const lang = id.split('/')[1];

            let slug = '';
            if (id.endsWith(lang)) {
                slug = id.replace(`${lang}`, '');
            } else {
                slug = id.replace(`${lang}/`, '');
            }

            return {
                params: {
                    lang: lang,
                    slug: slug,
                },
            };
        });

        if (debug) {
            logger.array('所有文档的路径', paths);
        }

        return paths;
    }

    isBook(): boolean {
        return this.entry.id.split('/').length === 2;
    }

    getTitle(): string {
        return this.entry.data.title;
    }

    getDescription(): string | undefined {
        return this.entry.data.description;
    }

    getId(): string {
        return this.entry.id;
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
        let link = LinkDB.getLessonLink(lang, this.getId());

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
        const debug = false

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

    async render(): Promise<RenderResult> {
        return await render(this.entry);
    }

    getHeadings(): Heading[] {
        const debug = false;

        if (debug) {
            logger.info(`获取 ${this.entry.id} 的 headings`);
        }

        return this.entry.rendered?.metadata?.headings as Heading[] || [];
    }

    async getChildren(): Promise<LessonDoc[]> {
        return (await LessonDB.getChildrenEntries(this.entry.id))
            .map(entry => new LessonDoc(entry));
    }

    async getDescendants(): Promise<LessonDoc[]> {
        return (await LessonDB.getDescendantEntries(this.entry.id))
            .map(entry => new LessonDoc(entry));
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