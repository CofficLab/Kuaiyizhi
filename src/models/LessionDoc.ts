import type { LessionEntry } from "@/database/LessionDB";
import LessionDB from "@/database/LessionDB";
import { logger } from "@/utils/logger";
import { SidebarItem } from "./SidebarItem";
import type { Heading } from "./Heading";
export default class LessionDoc {
    entry: LessionEntry;

    constructor(entry: LessionEntry) {
        this.entry = entry;
    }

    static async all(): Promise<LessionDoc[]> {
        return (await LessionDB.getEntries())
            .map(entry => new LessionDoc(entry));
    }

    static async allByDepth(depth: number): Promise<LessionDoc[]> {
        return (await LessionDB.getEntriesByDepth(depth))
            .map(entry => new LessionDoc(entry));
    }

    static async allByDepthAndLang(depth: number, lang: string): Promise<LessionDoc[]> {
        return (await LessionDB.getEntriesByDepthAndLang(depth, lang))
            .map(entry => new LessionDoc(entry));
    }

    static async find(id: string): Promise<LessionDoc | null> {
        const entry = await LessionDB.getEntry(id);
        return entry ? new LessionDoc(entry) : null;
    }

    static async getStaticPaths() {
        const debug = false;
        const entries = await LessionDB.getEntries();

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

    async getBook(): Promise<LessionDoc | null> {
        const bookId = this.getBookId();
        return await LessionDoc.find(bookId);
    }

    getLevel(): number {
        return this.entry.id.split('/').length;
    }

    getLink(): string {
        const debug = false;
        const lang = this.getLang();
        let link = '';

        if (this.getId().endsWith(lang)) {
            link = `/${lang}/lessions/${this.getId().replace(`${lang}`, '')}`;
        } else {
            const idWithoutLang = this.getId().replace(`${lang}/`, '');
            link = `/${lang}/lessions/${idWithoutLang}`;
        }

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
        const debug = true;

        if (debug) {
            logger.info(`获取 ${this.entry.id} 的 HTML`);
        }

        return this.entry.rendered?.html || '';
    }

    getHeadings(): Heading[] {
        const debug = true;

        if (debug) {
            logger.info(`获取 ${this.entry.id} 的 headings`);
        }

        return this.entry.rendered?.metadata?.headings as Heading[] || [];
    }

    async getChildren(): Promise<LessionDoc[]> {
        return (await LessionDB.getChildrenEntries(this.entry.id))
            .map(entry => new LessionDoc(entry));
    }

    async getDescendants(): Promise<LessionDoc[]> {
        return (await LessionDB.getDescendantEntries(this.entry.id))
            .map(entry => new LessionDoc(entry));
    }

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
            items: childItems
        }).setLink(this.getLink());
    }
}
