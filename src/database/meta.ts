import { getCollection } from 'astro:content';
import type { CollectionEntry } from 'astro:content';
import { logger } from '../utils/logger';
import { SidebarItem } from '@/models/Sidebar';

// 获取所有元数据，返回的格式是：
// [
//     {
//         id: 'zh-cn/meta/supervisor',
//         data: {
//             title: 'Supervisor 完全指南：进程管理利器',
//         },
//         body: '...'
//         rendered: {
//             html: '...'
//         }
//     },
// ]
export const getMetas = async (): Promise<CollectionEntry<'metas'>[]> => {
    const metas = await getCollection('metas');

    logger.info(`getMetas, total: ${metas.length}`);

    return metas;
}

// 获取所有元数据ID，返回的格式是：
// [
//     {
//         id: 'zh-cn/meta/supervisor'
//     },
// ]
export const getMetaIds = async (lang: string): Promise<string[]> => {
    // 如果lang=zh-CN，lang=zh-cn，都转换成lang=zh-cn
    lang = lang.replace('zh-CN', 'zh-cn');
    const metas = await getMetas();
    return metas.filter((meta) => meta.id.startsWith(lang)).map((meta) => meta.id);
}

// 获取所有元数据ID和标题，返回的格式是：
// [
//     {
//         id: 'zh-cn/meta/supervisor',
//         title: 'Supervisor 完全指南：进程管理利器',
//     },
// ]
export const getMetaIdsAndTitles = async (lang: string): Promise<{ id: string, title: string }[]> => {
    // 如果lang=zh-CN，lang=zh-cn，都转换成lang=zh-cn
    lang = lang.replace('zh-CN', 'zh-cn');

    //logger.info(`getMetaIdsAndTitles for lang: ${lang}`);

    const metas = await getMetas();
    const items = metas.filter((meta) => meta.id.startsWith(lang)).map((meta) => ({
        id: meta.id,
        title: meta.data.title || '',
    }));

    //logger.info(`getIdsAndTitles, total: ${metas.length}`);
    //logger.array(`getIdsAndTitles, subset`, items.slice(0, 2));

    return items;
}

export const getMetaSidebarItem = async (lang: string): Promise<SidebarItem> => {
    const metas = await getMetaIdsAndTitles(lang);
    return new SidebarItem({
        type: 'group',
        label: 'Meta',
        items: metas.map((meta) => new SidebarItem({
            type: 'link',
            label: meta.title,
            link: makeLinkWithoutLang(meta.id),
        })),
    });
}

// 根据id生成链接
// 例如：
// id=zh-cn/supervisor，则返回/zh-cn/meta/supervisor
// id=en/supervisor，则返回/en/meta/supervisor
function makeLink(id: string, withLang: boolean = true): string {
    let lang = id.split('/')[0];
    let path = id.split('/').slice(1).join('/');

    let link = `/${withLang ? lang : ''}/meta/${path}`;

    // 如果开头有多个 /，则去掉
    link = link.replace(/\/+/g, '/');

    return link;
}

// 根据id生成不带语言的链接
// 例如：
// id=zh-cn/supervisor，则返回/meta/supervisor
// id=en/supervisor，则返回/meta/supervisor
function makeLinkWithoutLang(id: string): string {
    return makeLink(id, false);
}