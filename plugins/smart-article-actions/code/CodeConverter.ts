/**
 * 代码转换器类
 */
export default class CodeConverter {
    /**
     * 转换 Markdown 代码块的语言标识并修正格式
     * @param content Markdown 内容
     * @returns 转换后的内容
     */
    public static convert(content: string): string {
        return content
            // 将 vue 和 astro 代码块转换为 js 代码块
            .replace(/```vue/g, '```js')
            .replace(/```astro/g, '```js')
            // 确保代码块开始前有空行
            .replace(/([^\n])\n```\w+/g, '$1\n\n```')
            // 修正代码块结束标记前的空格
            .replace(/^[ \t]*```/gm, '```');
    }
} 