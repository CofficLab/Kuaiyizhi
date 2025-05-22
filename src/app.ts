import { LangPackage } from '@coffic/cosy-ui';
import LinkDB from '@/utils/link';
class App {
    companyName = LangPackage.setZh('青岛岳亿网络科技有限公司')
        .setEn('Qingdao Yueyi Network Technology Co., Ltd.')
    icp = LangPackage.setZh('鲁ICP备2022009149号-2')
        .setEn('ICP License: 2022009149-2')
    slogan = LangPackage.setZh('精彩软件，有爱创造').setEn('Wonderful Software, Built with Love')
    inspirationalSlogan = LangPackage.setZh('也许，这是一番成就的开始').setEn('Perhaps, this is the beginning of achievement')
    copyright = LangPackage.setZh('版权所有').setEn('All rights reserved')
    keywords = 'Cisum,GitOk,TravelMode,Netto,CosyUI,菲克与象彩彩'
    siteName = '快易知'
    getNavItems(lang: string) {
        return [
            {
                href: LinkDB.getHomeLink(lang),
                label: lang === 'zh-cn' ? '首页' : 'Home',
            },
            {
                href: LinkDB.getLessonsLink(lang),
                label: 'Build Your Own X',
            },
            {
                href: LinkDB.getBlogsLink(lang),
                label: lang === 'zh-cn' ? '博客' : 'Blogs',
            },
        ]
    }

    socialLinks = ['https://github.com/CofficLab']
    products =
        [
            {
                name: 'Cisum',
                href: 'https://coffic.zone.id/cisum',
                external: true,
            },
            {
                name: 'GitOk',
                href: 'https://coffic.zone.id/gitok',
                external: true,
            },
            {
                name: 'TravelMode',
                href: 'https://coffic.zone.id/travelmode',
                external: true,
            },
            {
                name: 'Netto',
                href: 'https://coffic.zone.id/netto',
                external: true,
            },
            {
                name: 'CosyUI',
                href: 'https://cofficlab.github.io/cosy-ui',
                external: true,
            },
            {
                name: '菲克与象彩彩',
                href: 'https://feekoo.zone.id',
                external: true,
            },
        ]
}

const app = new App();
export default app;