import BlogDB from "@/database/BlogDB";
import { SidebarItem } from "@/models/SidebarItem";
import { type TagStaticPath } from "@/interface/StaticPath";
import LinkDB from "@/database/LinkDB";

export class Tag {
    name: string;
    lang: string;
    count: number;

    constructor(name: string, count: number, lang: string) {
        this.name = name;
        this.count = count;
        this.lang = lang;
    }

    toSidebarItem(lang: string): SidebarItem {
        return new SidebarItem({
            label: this.name,
            link: LinkDB.getTagLink(lang, this.name),
        });
    }

    toTagPath(): TagStaticPath {
        return {
            params: { slug: this.lang + '/blogs/tag/' + this.name },
            props: { tag: this.name },
        };
    }

    static async makeRootSidebarItem(lang: string): Promise<SidebarItem> {
        const tags = await BlogDB.getTagsByLang(lang);

        return new SidebarItem({
            label: 'Tags',
            link: LinkDB.getTagLink(lang, ''),
            items: tags.map((tag: Tag) => tag.toSidebarItem(lang)),
        });
    }
}

export default Tag;