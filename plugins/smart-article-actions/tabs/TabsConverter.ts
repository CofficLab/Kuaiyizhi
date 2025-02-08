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
                    html += this.STYLE;
                }

                // 使用 details/summary 替代按钮和 JavaScript
                tabItems.forEach((item, index) => {
                    const labelMatch = item.match(/label="([^"]+)"/);
                    const contentMatch = item.match(/<TabItem[^>]*>([\s\S]*?)<\/TabItem>/);

                    if (labelMatch && contentMatch) {
                        const label = labelMatch[1];
                        let tabContent = contentMatch[1].trim();

                        // 如果内容包含代码块，确保前后有空行
                        if (tabContent.includes('```')) {
                            tabContent = `\n${tabContent}\n`;
                        }

                        const isOpen = index === 0 ? ' open' : '';

                        html += `<details${isOpen}>\n`;
                        html += `<summary>${label}</summary>\n`;
                        html += `<div class="tab-content">\n${tabContent}\n</div>\n`;
                        html += `</details>\n`;
                    }
                });

                html += '</div>\n';
                return html;
            }
        );
    }
} 