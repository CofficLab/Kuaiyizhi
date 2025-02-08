import tabStyles from './tabs.css?raw';
import tabScript from './tabs.js?raw';
import CodeConverter from '../code/CodeConverter';

/**
 * Tabs 转换器类
 */
export default class TabsConverter {
    private static readonly STYLE = `<style>${tabStyles}</style>`;
    private static readonly SCRIPT = `<script>${tabScript}</script>`;

    /**
     * 将 Starlight Tabs 组件转换为交互式 HTML
     */
    public static convert(content: string): string {
        let tabContainerCount = 0;

        // 首先处理 Markdown 代码块
        content = CodeConverter.convert(content);

        return content.replace(
            /<Tabs>([\s\S]*?)<\/Tabs>/g,
            (tabsMatch) => {
                const containerId = `tabs-${tabContainerCount++}`;
                const tabItems = tabsMatch.match(/<TabItem label="([^"]+)">([\s\S]*?)<\/TabItem>/g) || [];

                let html = `<div class="tabs-container" id="${containerId}">\n`;

                if (tabContainerCount === 1) {
                    html += this.STYLE + this.SCRIPT;
                }

                // 添加标签按钮
                html += '<div class="tabs-header">\n';
                tabItems.forEach((item, index) => {
                    const labelMatch = item.match(/label="([^"]+)"/);
                    if (labelMatch) {
                        const label = labelMatch[1];
                        const isActive = index === 0 ? ' active' : '';
                        html += `<button class="tab-button${isActive}" onclick="switchTab('${containerId}', ${index})">${label}</button>\n`;
                    }
                });
                html += '</div>\n';

                // 添加标签内容
                tabItems.forEach((item, index) => {
                    const contentMatch = item.match(/<TabItem[^>]*>([\s\S]*?)<\/TabItem>/);
                    if (contentMatch) {
                        const isActive = index === 0 ? ' active' : '';
                        const tabContent = '\n' + contentMatch[1]
                            .trim();

                        html += `<div class="tab-content${isActive}">\n${tabContent}\n</div>\n`;
                    }
                });

                html += '</div>\n';
                return html;
            }
        );
    }
} 