import { getCollection } from 'astro:content';
import type { CollectionEntry } from 'astro:content';
import { logger } from '../utils/logger';

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
