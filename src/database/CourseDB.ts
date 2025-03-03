import CourseDoc from "@/models/CourseDoc";
import { logger } from "@/utils/logger";
import { getCollection, getEntry, type CollectionEntry } from "astro:content";

const collectionName = 'courses';

export type CourseEntry = CollectionEntry<'courses'>;

export default class CourseDB {
    /**
     * 获取指定深度的文档
     * 
     * @param {number} depth - 深度
     * @returns {Promise<LessonEntry[]>} 返回文档集合
     */
    static async getDocsByDepth(depth: number): Promise<CourseDoc[]> {
        const entries = await getCollection(collectionName, ({ id }) => id.split('/').length === depth);
        return entries.map(entry => CourseDoc.fromEntry(entry));
    }

    static async find(id: string): Promise<CourseDoc | null> {
        const entry = await getEntry(collectionName, id);
        return entry ? new CourseDoc(entry) : null;
    }

    /**
     * 获取指定文档的子文档, 不包括孙子文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<CourseDoc[]>} 返回子文档集合
     */
    static async getChildren(parentId: string): Promise<CourseDoc[]> {
        const parentLevel = parentId.split('/').length;
        const childrenLevel = parentLevel + 1;

        const entries = await getCollection(collectionName,
            ({ id }) => id.startsWith(parentId) && id.split('/').length === childrenLevel);
        return entries.map(entry => CourseDoc.fromEntry(entry));
    }

    /**
     * 获取指定文档的所有后代文档
     * 
     * @param {string} parentId - 父文档ID
     * @returns {Promise<CourseDoc[]>} 返回后代文档集合
     */
    static async getDescendantDocs(parentId: string): Promise<CourseDoc[]> {
        const entries = await getCollection(collectionName, ({ id }) => id.startsWith(parentId));
        return entries.map(entry => CourseDoc.fromEntry(entry));
    }

    static async allTopLevelDocs(): Promise<CourseDoc[]> {
        const debug = false
        const entries = await CourseDB.getDocsByDepth(2);

        if (debug) {
            logger.array('所有顶级文档', entries);
        }

        return entries;
    }

    static async allTopLevelDocsByLang(lang: string): Promise<CourseDoc[]> {
        const docs = await CourseDB.getDocsByDepth(2);
        const filteredEntries = docs.filter(doc => doc.getId().startsWith(lang));

        return filteredEntries;
    }

    static async getFamousCourses(lang: string): Promise<CourseDoc[]> {
        const courses = await this.allTopLevelDocsByLang(lang);
        return courses.slice(0, 4);
    }

    static async getStaticPaths() {
        const debug = false;
        const docs = await CourseDB.getDescendantDocs('');

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
            logger.array('所有课程文档的路径', paths);
        }

        return paths;
    }
}