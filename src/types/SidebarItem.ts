export default class SidebarItem {
    label: string = '';
    link: string = '';

    static withLabel(label: string): SidebarItem {
        const item = new SidebarItem();
        item.setLabel(label);
        return item;
    }

    static withLink(link: string): SidebarItem {
        const item = new SidebarItem();
        item.setLink(link);
        return item;
    }

    setLabel(label: string): SidebarItem {
        this.label = label;
        return this;
    }

    setLink(link: string): SidebarItem {
        this.link = link;
        return this;
    }
}