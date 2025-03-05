import type { LangCode } from '@/i18n/trans';
import { makeMetaLink } from '@utils/links';
import { RiGithubFill } from '@remixicon/vue';

export interface FooterLink {
    key: string;
    href: string;
    external: boolean;
    text: string;
}

export interface FooterNavGroup {
    titleKey: string;
    links: FooterLink[];
}

export interface FooterSocialLink {
    name: string;
    url: string;
    icon: typeof RiGithubFill;
}

export interface FooterConfig {
    siteName: string;
    homeLink: string;
    slogan: string;
    company: string;
    copyright: string;
    inspirationalSlogan: string;
    icp?: string;
    navGroups: FooterNavGroup[];
    socialLinks: FooterSocialLink[];
}

export const getFooterConfig = (lang: LangCode): FooterConfig => ({
    siteName: lang === 'zh-cn' ? '快易知' : 'KuaiYiZhi',
    homeLink: lang === 'zh-cn' ? '/zh-cn/' : '/en/',
    slogan: lang === 'zh-cn' ? '精彩软件，有爱创造' : 'Wonderful Software, Built with Love',
    company: lang === 'zh-cn' ? '青岛岳亿网络科技有限公司' : 'Qingdao Yueyi Network Technology Co., Ltd.',
    copyright: lang === 'zh-cn' ? '版权所有' : 'All rights reserved',
    inspirationalSlogan: lang === 'zh-cn' ? '也许，这是一番成就的开始' : 'Perhaps, this is the beginning of achievement',
    icp: lang === 'zh-cn' ? '鲁ICP备2022009149号-2' : 'ICP License: 2022009149-2',

    navGroups: [
        {
            titleKey: lang === 'zh-cn' ? '关于我们' : 'About Us',
            links: [
                { key: 'privacy', href: makeMetaLink(lang, 'privacy'), text: '隐私政策', external: false },
                { key: 'terms', href: makeMetaLink(lang, 'terms'), text: '服务条款', external: false },
                { key: 'about', href: makeMetaLink(lang, 'about'), text: '关于我们', external: false },
                {
                    key: 'githubComments',
                    href: 'https://github.com/CofficLab/FeedbackHub',
                    text: '反馈中心',
                    external: true,
                },
            ],
        },
        {
            titleKey: lang === 'zh-cn' ? '产品与服务' : 'Products & Services',
            links: [
                {
                    key: 'kuaiyicha',
                    href: 'https://query.kuaiyizhi.cn',
                    text: lang === 'zh-cn' ? '快易查' : 'KuaiYiCha',
                    external: true,
                },
                {
                    key: 'apiProducts',
                    href: 'https://query.kuaiyizhi.cn/products',
                    text: lang === 'zh-cn' ? 'API产品' : 'API Products',
                    external: true,
                },
                {
                    key: 'knowledgeBase',
                    href: 'https://www.kuaiyizhi.cn',
                    text: lang === 'zh-cn' ? '知识库' : 'Knowledge Base',
                    external: true,
                },
                {
                    key: 'cofficSeries',
                    href: 'https://cofficlab.github.io',
                    text: lang === 'zh-cn' ? 'Coffic系列' : 'Coffic Series',
                    external: true,
                },
            ],
        },
        {
            titleKey: lang === 'zh-cn' ? 'GitHub' : 'GitHub',
            links: [
                {
                    key: 'github',
                    href: 'https://github.com/cofficlab',
                    text: lang === 'zh-cn' ? 'GitHub' : 'GitHub',
                    external: true,
                },
                {
                    key: 'juiceeditor',
                    href: 'https://github.com/CofficLab/JuiceEditor',
                    text: lang === 'zh-cn' ? 'JuiceEditor' : 'JuiceEditor',
                    external: true,
                },
                {
                    key: 'kuaiyizhi',
                    href: 'https://apps.apple.com/cn/app/%E5%BF%AB%E6%98%93%E7%9F%A5/id6457892799',
                    text: lang === 'zh-cn' ? '快易知' : 'KuaiYiZhi',
                    external: true,
                },
                {
                    key: 'cisum',
                    href: 'https://apps.apple.com/cn/app/cisum/id6466401036',
                    text: lang === 'zh-cn' ? 'Cisum' : 'Cisum',
                    external: true,
                },
            ],
        },
    ],
    socialLinks: [
        {
            name: 'GitHub',
            url: 'https://github.com/CofficLab',
            icon: RiGithubFill,
        },
    ],
}); 