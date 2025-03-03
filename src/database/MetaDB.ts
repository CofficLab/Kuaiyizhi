import MetaDoc from "@/models/MetaDoc";
import { logger } from "@/utils/logger";
import { getCollection, getEntry, type CollectionEntry } from "astro:content";

const collectionName = 'meta';

export type MetaEntry = CollectionEntry<'meta'>;

export default class MetaDB {
    /**
     * 获取指定深度的文档
     * 
     * @param {number} depth - 深度
     * @returns {Promise<LessonEntry[]>} 返回文档集合
     */
    static async getDocsByDepth(depth: number): Promise<MetaDoc[]> {
        const entries = await getCollection(collectionName, ({ id }) => id.split('/').length === depth);
        return entries.map(entry => MetaDoc.fromEntry(entry));
    }

    static async find(id: string): Promise<MetaDoc | null> {
        const debug = false

        if (debug) {
            logger.info(`MetaDB: 获取元数据文档: ${id}`);
        }

        const entry = await getEntry(collectionName, id);
        return entry ? new MetaDoc(entry) : null;
    }

    /**
     * 获取指定文档的子文档, 不包括孙子文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<MetaDoc[]>} 返回子文档集合
     */
    static async getChildren(parentId: string): Promise<MetaDoc[]> {
        const parentLevel = parentId.split('/').length;
        const childrenLevel = parentLevel + 1;

        const entries = await getCollection(collectionName,
            ({ id }) => id.startsWith(parentId) && id.split('/').length === childrenLevel);
        return entries.map(entry => MetaDoc.fromEntry(entry));
    }

    /**
     * 获取指定文档的兄弟文档
     * 
     * @param {string} targetId - 目标文档ID
     * @returns {Promise<MetaDoc[]>} 返回兄弟文档集合
     */
    static async getSiblingDocs(targetId: string): Promise<MetaDoc[]> {
        const debug = false;
        const parentId = targetId.split('/').slice(0, -1).join('/');
        const docs = await getCollection(collectionName, ({ id }) => id.startsWith(parentId));
        if (debug) {
            logger.array('兄弟文档', docs);
        }
        return docs.map(doc => MetaDoc.fromEntry(doc));
    }

    /**
     * 获取指定文档的所有后代文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<CourseDoc[]>} 返回后代文档集合
     */
    static async getDescendantDocs(parentId: string): Promise<MetaDoc[]> {
        const entries = await getCollection(collectionName, ({ id }) => id.startsWith(parentId));
        return entries.map(entry => MetaDoc.fromEntry(entry));
    }

    static async allTopLevelDocs(): Promise<MetaDoc[]> {
        const debug = false
        const entries = await MetaDB.getDocsByDepth(2);

        if (debug) {
            logger.array('所有顶级文档', entries);
        }

        return entries;
    }

    static async allTopLevelDocsByLang(lang: string): Promise<MetaDoc[]> {
        const docs = await MetaDB.getDocsByDepth(2);
        const filteredEntries = docs.filter(doc => doc.getId().startsWith(lang));

        return filteredEntries;
    }

    static async getFamousCourses(lang: string): Promise<MetaDoc[]> {
        const courses = await this.allTopLevelDocsByLang(lang);
        return courses.slice(0, 4);
    }

    static async getStaticPaths() {
        const debug = false;
        const docs = await MetaDB.getDescendantDocs('');

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
            logger.array('所有元数据文档的路径', paths);
        }

        return paths;
    }
}