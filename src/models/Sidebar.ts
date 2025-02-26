import type { BadgeConfig } from '@interface/BadgeConfig';

/**
 * 
 * 

// Create a link item
const linkItem = new SidebarItem({
  type: 'link',
  link: '/docs/getting-started',
  label: 'Getting Started',
  badge: 'New'
});

// Create a group
const group = new SidebarItem({
  type: 'group',
  label: 'Guides',
  items: [linkItem],
  collapsed: true
});

// Get Starlight format
const starlightFormat = group.toStarlightFormat();

 */


export interface BaseSidebarItem {
    translations?: Record<string, string>;
    badge?: string | BadgeConfig;
}

export interface LinkSidebarItem extends BaseSidebarItem {
    type: 'link';
    link: string;
    label: string;
    attrs?: Record<string, string | number | boolean | undefined>;
}

export interface SlugSidebarItem extends BaseSidebarItem {
    type: 'slug';
    slug: string;
    label?: string;
    attrs?: Record<string, string | number | boolean | undefined>;
}

export interface GroupSidebarItem extends BaseSidebarItem {
    type: 'group';
    label: string;
    items: SidebarItem[];
    collapsed?: boolean;
}

export interface AutoGenerateGroupSidebarItem extends BaseSidebarItem {
    type: 'autogenerate';
    label: string;
    directory: string;
    collapsed?: boolean;
}

export type SidebarItemType = LinkSidebarItem | SlugSidebarItem | GroupSidebarItem | AutoGenerateGroupSidebarItem;

export class SidebarItem {
    private config: SidebarItemType;

    constructor(config: SidebarItemType) {
        this.config = config;
    }

    toStarlightFormat(): any {
        const { type, ...rest } = this.config;
        switch (type) {
            case 'link':
                let linkItem = rest as LinkSidebarItem;
                return {
                    link: linkItem.link,
                    label: linkItem.label,
                    ...(linkItem.attrs && { attrs: linkItem.attrs }),
                    ...(linkItem.translations && { translations: linkItem.translations }),
                    ...(linkItem.badge && { badge: linkItem.badge }),
                };
            case 'slug':
                let slugItem = rest as SlugSidebarItem;
                return {
                    slug: slugItem.slug,
                    ...(slugItem.label && { label: slugItem.label }),
                    ...(slugItem.attrs && { attrs: slugItem.attrs }),
                    ...(slugItem.translations && { translations: slugItem.translations }),
                    ...(slugItem.badge && { badge: slugItem.badge }),
                };
            case 'group':
                let groupItem = rest as GroupSidebarItem;
                return {
                    label: groupItem.label,
                    items: groupItem.items.map(item =>
                        item instanceof SidebarItem ? item.toStarlightFormat() : item
                    ),
                    ...(groupItem.collapsed && { collapsed: groupItem.collapsed }),
                    ...(groupItem.translations && { translations: groupItem.translations }),
                    ...(groupItem.badge && { badge: groupItem.badge }),
                };
            case 'autogenerate':
                let autoGenerateItem = rest as AutoGenerateGroupSidebarItem;
                return {
                    label: autoGenerateItem.label,
                    autogenerate: {
                        directory: autoGenerateItem.directory,
                        ...(autoGenerateItem.collapsed && { collapsed: autoGenerateItem.collapsed }),
                    },
                    ...(autoGenerateItem.translations && { translations: autoGenerateItem.translations }),
                    ...(autoGenerateItem.badge && { badge: autoGenerateItem.badge }),
                };
        }
    }
}