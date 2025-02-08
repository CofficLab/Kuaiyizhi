import TabsConverter from './tabs/TabsConverter.ts';

/**
 * 将 Starlight Tabs 组件转换为 HTML 格式
 */
export function convertTabsToHTML(content: string): string {
    return TabsConverter.convert(content);
}