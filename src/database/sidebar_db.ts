/**
 * 课程数据库模块
 * 
 * 该模块提供了与课程内容相关的数据访问功能，包括获取课程列表、
 * 获取课程章节、生成课程侧边栏等功能。
 * 
 * @module database/courses
 */

import { getCollection, type DataEntry } from 'astro:content';
import { logger } from '@/utils/logger';
import { SidebarItem } from '@/models/Sidebar';
import { getChildren, getDescendants, getDocById, getParentDocId, getTopCategories, slugToId } from '@/database/content_db';
import { makeLink, makeLinkWithoutLang, makeTopLevelLink } from '@/database/link_db';


/**
 * 获取顶级侧边栏项目
 * 
 * 该函数根据指定语言获取所有顶级侧边栏项目。
 * 
 * @param {string} lang - 语言代码，例如 'zh-cn', 'en'
 * @returns {Promise<Array<SidebarItem>>} 返回侧边栏项目数组，例如：
 * [
 *     {
 *         type: 'link',
 *         label: 'Courses',
 *         link: '/zh-cn/courses',
 *     },
 *     {
 *         type: 'link',
 *         label: 'Blogs',
 *         link: '/zh-cn/blogs',
 *     },
 * ]
 */
export const getTopLevelSidebarItems = async (lang: string): Promise<SidebarItem[]> => {
    const topLevelCategories = await getTopCategories();

    return topLevelCategories.map((category) => {
        return new SidebarItem({
            type: 'link',
            link: makeTopLevelLink(category, lang),
            label: category,
        });
    });
}

/**
 * 获取指定文档的侧边栏项目
 * 
 * 该函数根据指定文档ID获取其侧边栏项目。
 * 
 * @param {string} docId - 文档ID, 例如 'courses/zh-cn/supervisor/index.md'
 * @param {number} level - 侧边栏级别，例如 1, 2, 3
 * @returns {Promise<SidebarItem[]>} 返回侧边栏项目数组
 */
export const getSidebarItemsByDocId = async (docId: string, level: number): Promise<SidebarItem[]> => {
    const items: SidebarItem[] = [];
    const children = await getChildren(docId);
    for (const child of children) {
        // 判断当前child是否还需要继续获取子节点

        const childSidebarItems = await getSidebarItemsByDocId(child.id, level - 1);

        if (childSidebarItems.length > 0) {
            items.push(new SidebarItem({
                type: 'group',
                label: child.data.title as string,
                items: childSidebarItems,
            }));
        } else {
            items.push(new SidebarItem({
                type: 'link',
                link: makeLink(child.id, false),
                label: child.data.title as string,
            }));
        }
    }

    return items;
}

/**
 * 获取指定文档的侧边栏项目
 * 
 * 该函数根据指定文档ID获取其侧边栏项目。
 * 
 * @param {string} docId - 文档ID, 例如 'courses/zh-cn/supervisor/index.md'
 * @param {number} level - 侧边栏级别，例如 1, 2, 3
 * @returns {Promise<SidebarItem>} 返回侧边栏项目
 */
export const getSidebarItemByDocId = async (docId: string, level: number): Promise<SidebarItem> => {
    const debug = true;
    if (debug) {
        logger.info(`getSidebarItemByDocId, docId: ${docId}, level: ${level}`);
    }

    // 如果是顶级文档，即：courses、blogs、docs，则直接返回
    if (docId.split('/').length === 2) {
        const lang = docId.split('/')[0];
        return new SidebarItem({
            type: 'link',
            link: makeTopLevelLink(docId, lang),
            label: docId,
        });
    }

    // 如果比顶级文档低一级，返回其子文档转换成的侧边栏
    if (docId.split('/').length === 3) {
        const doc = await getDocById(docId);
        const sidebarItems = await getSidebarItemsByDocId(docId, level);
        return new SidebarItem({
            type: 'group',
            label: doc.data.title as string,
            items: sidebarItems,
        });
    }

    // 其他情况，返回getSidebarItemsByDocId(其父文档, level - 1)
    const parentDocId = getParentDocId(docId);
    return getSidebarItemByDocId(parentDocId, level - 1);
}

/**
 * 获取指定slug的侧边栏项目
 * 
 * 该函数根据指定slug获取其侧边栏项目。
 * 
 * @param {string} slug - slug, 例如 'zh-cn/courses/supervisor/index.md'
 * @param {number} level - 侧边栏级别，例如 1, 2, 3
 * @returns {Promise<SidebarItem>} 返回侧边栏项目
 */
export const getSidebarItemBySlug = async (slug: string, level: number): Promise<SidebarItem> => {
    const docId = slugToId(slug);
    return getSidebarItemByDocId(docId, level);
}