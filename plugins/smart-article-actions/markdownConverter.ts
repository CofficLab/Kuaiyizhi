/**
 * 将 Starlight Tabs 组件转换为 HTML 格式
 */
export function convertTabsToHTML(content: string): string {
    return content.replace(
        /<Tabs>([\s\S]*?)<\/Tabs>/g,
        (tabsMatch) => {
            const tabItems = tabsMatch.match(/<TabItem label="([^"]+)">([\s\S]*?)<\/TabItem>/g) || [];

            let html = '<div class="tabs-container">\n';

            // 添加 Tabs 样式
            html += `<style>
.tabs-container {
    border: 1px solid #ddd;
    border-radius: 8px;
    margin: 16px 0;
}
.tab-content {
    padding: 16px;
    border-top: 1px solid #ddd;
    white-space: pre-wrap;
}
</style>\n`;

            // 处理每个 TabItem
            tabItems.forEach((item) => {
                const labelMatch = item.match(/label="([^"]+)"/);
                const contentMatch = item.match(/<TabItem[^>]*>([\s\S]*?)<\/TabItem>/);

                if (labelMatch && contentMatch) {
                    const label = labelMatch[1];
                    // 保留原始格式，包括代码块
                    const tabContent = contentMatch[1]
                        .trim()
                        // 转义 < 和 > 以防止 HTML 解析
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;');

                    html += `<h4 style="margin: 0; padding: 8px 16px; background: #f5f5f5;">${label}</h4>\n`;
                    html += `<div class="tab-content">\n${tabContent}\n</div>\n`;
                }
            });

            html += '</div>\n';
            return html;
        }
    );
}