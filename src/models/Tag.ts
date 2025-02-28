import TagDB from "@/database/TagDB";
import { SidebarItem } from "@/models/SidebarItem";
import { type TagStaticPath } from "@/interface/StaticPath";

export class Tag {
    name: string;
    count: number;

    constructor(name: string, count: number) {
        this.name = name;
        this.count = count;
    }

    toSidebarItem(): SidebarItem {
        return new SidebarItem({
            label: this.name,
            link: `/blogs/tag/${this.name}`,
        });
    }

    toTagPath(): TagStaticPath {
        return {
            params: { slug: 'zh-cn/blogs/tags/' + this.name },
            props: { tag: this.name },
        };
    }

    static async makeRootSidebarItem(): Promise<SidebarItem> {
        const tags = await TagDB.getTags('zh-cn');

        return new SidebarItem({
            label: 'Tags',
            items: tags.map((tag) => tag.toSidebarItem()),
        });
    }
}

export default Tag;