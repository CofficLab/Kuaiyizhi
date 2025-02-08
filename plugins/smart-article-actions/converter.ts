import TabsConverter from './tabs/TabsConverter.ts';
import CodeConverter from './code/CodeConverter';

/**
 * 移除 MDX 特定的导入语句
 */
function removeImports(content: string): string {
    // 移除 Starlight 组件的导入语句
    return content.replace(
        /import\s*{[^}]*}\s*from\s*['"]@astrojs\/starlight\/components['"][;\n]*/g,
        ''
    );
}

/**
 * 将内部的文章转换为 Markdown 格式，内部文档可能是增强版的markdown格式，比如mdx
 */
export function convertToBaseMarkdown(content: string): string {
    // 首先移除 MDX 导入语句
    let newContent = removeImports(content);

    // 处理 Markdown 代码块
    newContent = CodeConverter.convert(newContent);

    // 将 Starlight Tabs 组件转换为 HTML 格式
    newContent = TabsConverter.convert(newContent);

    return newContent;
}