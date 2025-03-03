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
 * 修复 Markdown 格式问题，但保持原始结构
 * 主要用于修复一些常见的格式问题，但不进行组件转换
 */
export function fixMarkdownFormat(content: string): string {
    // 移除 MDX 导入语句，因为这些在任何情况下都是不需要的
    let newContent = removeImports(content);

    // 修复可能的空行问题（多个空行合并为两个）
    newContent = newContent.replace(/\n{3,}/g, '\n\n');

    // 修复列表缩进问题（确保子列表正确缩进）
    newContent = newContent.replace(/^( *)-( +)/gm, '$1- ');

    // 修复代码块格式
    newContent = CodeConverter.fixFormat(newContent);

    // 修复标题前后的空行
    newContent = newContent.replace(/\n(#{1,6} .*)\n/g, '\n\n$1\n\n');

    // 修复表格格式（确保表格前后有空行）
    newContent = newContent.replace(/\n(\|[^\n]+\|)\n/g, '\n\n$1\n\n');

    // 修复链接格式（移除链接中多余的空格）
    newContent = newContent.replace(/\[ ([^\]]+) \]\(([^)]+)\)/g, '[$1]($2)');

    return newContent;
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