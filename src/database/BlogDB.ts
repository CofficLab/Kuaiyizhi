import BlogDoc from "@/models/BlogDoc";
import type Tag from "@/models/Tag";
import { logger } from "@/utils/logger";
import { getCollection, getEntry, type CollectionEntry } from "astro:content";

const collectionName = 'blogs';

export type BlogEntry = CollectionEntry<'blogs'>;

export default class BlogDB {
    /**
     * 获取指定深度的文档
     * 
     * @param {number} depth - 深度
     * @returns {Promise<BlogDoc[]>} 返回文档集合
     */
    static async getDocsByDepth(depth: number): Promise<BlogDoc[]> {
        const entries = await getCollection(collectionName, ({ id }) => id.split('/').length === depth);
        return entries
            .map(entry => BlogDoc.fromEntry(entry))
            .sort((a, b) => b.getDate().getTime() - a.getDate().getTime());
    }

    static async find(id: string): Promise<BlogDoc | null> {
        const entry = await getEntry(collectionName, id);
        return entry ? new BlogDoc(entry) : null;
    }

    /**
     * 获取指定文档的子文档, 不包括孙子文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<BlogDoc[]>} 返回子文档集合
     */
    static async getChildren(parentId: string): Promise<BlogDoc[]> {
        const parentLevel = parentId.split('/').length;
        const childrenLevel = parentLevel + 1;

        const entries = await getCollection(collectionName,
            ({ id }) => id.startsWith(parentId) && id.split('/').length === childrenLevel);
        return entries.map(entry => BlogDoc.fromEntry(entry));
    }

    /**
     * 获取指定文档的所有后代文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<BlogDoc[]>} 返回后代文档集合
     */
    static async getDescendantDocs(parentId: string): Promise<BlogDoc[]> {
        const entries = await getCollection(collectionName, ({ id }) => id.startsWith(parentId));
        return entries.map(entry => BlogDoc.fromEntry(entry));
    }

    static async allTopLevelDocs(): Promise<BlogDoc[]> {
        const debug = false
        const entries = await BlogDB.getDocsByDepth(2);

        if (debug) {
            logger.array('所有顶级博客文档', entries);
        }

        return entries;
    }

    static async allTopLevelDocsByLang(lang: string): Promise<BlogDoc[]> {
        const docs = await BlogDB.getDocsByDepth(2);
        const filteredEntries = docs.filter(doc => doc.getId().startsWith(lang));

        return filteredEntries;
    }

    static async getStaticPaths() {
        const debug = false;
        const docs = await BlogDB.getDescendantDocs('');

        // DocId 的格式为 courses/zh-cn/supervisor/index.md
        // 需要转换为 /zh-cn/courses/supervisor/index.md

        const paths = docs.map((doc) => {
            return {
                params: {
                    lang: doc.getLang(),
                    slug: doc.getSlug(),
                },
            };
        });

        if (debug) {
            logger.array('所有博客文档的路径', paths);
        }

        return paths;
    }

    static async getTagsStaticPaths() {
        const debug = false;
        const tags = await BlogDB.getTags();

        // DocId 的格式为 courses/zh-cn/supervisor/index.md
        // 需要转换为 /zh-cn/courses/supervisor/index.md

        let paths = tags.map((tag) => {
            return {
                params: {
                    lang: tag.lang,
                    name: tag.name,
                },
            };
        });

        if (debug) {
            logger.array('所有的标签路径', paths);
        }

        return paths;
    }

    static async getTags(): Promise<Tag[]> {
        // 使用复合键"lang:name"来确保标签的唯一性
        const tagsMap = new Map<string, Tag>();
        const posts = await BlogDB.allTopLevelDocs();

        posts.forEach(post => {
            post.getTags().forEach(tag => {
                const key = `${tag.lang}:${tag.name}`;
                if (!tagsMap.has(key)) {
                    tagsMap.set(key, tag);
                }
            });
        });

        return Array.from(tagsMap.values());
    }

    /**
     * 获取博客标签
     * 
     * 该函数获取博客的标签。
     * 
     * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
     * @returns {Promise<Tag[]>} 返回博客标签数组
     */
    static async getTagsByLang(lang: string): Promise<Tag[]> {
        const debug = false
        // 使用Map，以"lang:name"作为键，确保语言和名称都相同才视为同一标签
        const tagsMap = new Map<string, Tag>();
        const posts = await BlogDB.allTopLevelDocsByLang(lang);

        if (debug) {
            logger.array("posts", posts);
        }

        if (posts.length === 0) {
            return [];
        }

        posts.forEach(post => {
            post.getTags().forEach(tag => {
                // 创建复合键，同时包含语言和名称
                const key = `${tag.lang}:${tag.name}`;
                // 只有当Map中不存在该复合键的tag时，才添加
                if (!tagsMap.has(key)) {
                    tagsMap.set(key, tag);
                }
            });
        });

        if (debug) {
            logger.array("tags", Array.from(tagsMap.values()));
        }

        return Array.from(tagsMap.values());
    }

    static async getBlogsByTag(tag: string, lang: string): Promise<BlogDoc[]> {
        const debug = false
        const posts = await BlogDB.allTopLevelDocsByLang(lang);

        return posts.filter(post => post.getTags().some(t => t.name === tag));
    }
}